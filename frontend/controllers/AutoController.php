<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;
use common\models\Autogallery;

class AutoController extends Controller
{
    public function actionIndex()
    {
        

        return $this->render('index', [
            'news_category' => $news_category,
            'listDataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        
        $model = new \common\models\Auto;

        if(!Yii::$app->user->isGuest) {
            $model->contacts_email = Yii::$app->user->identity->email;
            $model->user_id = Yii::$app->user->identity->id;
        }

        $construction_years = [];
        for ($i=1960; $i <= date("Y"); $i++) { 
            $construction_years[$i] = $i;
        }

        $colors_list = [];
        $colors_data_attribute_list = [];
        for ($i=0; $i <= 15; $i++) { 
            $clr = $this->_get_color($i);
            $colors_list[$clr] = $clr;
            $colors_data_attribute_list[$i] = ['data-color' => $clr];
        }

        if ($model->load(Yii::$app->request->post())) {

            if(!empty($model->special_notes)) {
                $model->special_notes = serialize($model->special_notes);
            }

            if(!empty($model->exchange)) {
                $model->exchange = serialize($model->exchange);
            }



            if ($model->validate()) {

                if($model->save()) {

                    if($_FILES['Auto']['tmp_name']['gallery'][0] != '') {

                        foreach($_FILES['Auto']['tmp_name']['gallery'] as $key=>$file) {
                            $ext = end((explode(".", $_FILES['Auto']['name']['gallery'][$key])));
                            $name = Yii::$app->security->generateRandomString().'.'.$ext;
                            move_uploaded_file($_FILES['Auto']['tmp_name']['gallery'][$key], 'uploads/objects/' . $name);
                            //$this->_createThumbImage($name, 170, 130);
                            $gallery = new Autogallery();
                            $gallery->auto_id = $model->id;
                            $gallery->image_name = $name;
                            $gallery->save();

                        }
                    }
                    
                    \Yii::$app->getSession()->setFlash('flash_message', Yii::t('app', 'rlty.your_auto_was_added'));
                    return $this->redirect(['index']);

                }
            }
        }


        return $this->render('create', [
            'model' => $model,
            'construction_years' => $construction_years,
            'colors_list' => $colors_list,
            'colors_data_attribute_list' => $colors_data_attribute_list,
            'locations' => \common\models\Locations::_getLocations(),
        ]);
    }

    protected function _get_color($i) {
        $color_array = [
            0 => '#ffffff',
            1 => '#C1C1C1',
            2 => '#FFEFD5',
            3 => '#FDE910',
            4 => '#FABE00',
            5 => '#FF9966',
            6 => '#FFC0CB',
            7 => '#FF2600',
            8 => '#CC1D33',
            9 => '#926547',
            10 => '#0088FF',
            11 => '#0433FF',
            12 => '#9966CC',
            13 => '#35BA2B',
            14 => '#9C9999',
            15 => '#000000',
        ];
        return $color_array[$i];
    }

    public function actionGetmark() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $tech_category_id = $parents[0];
                $out = \common\models\AutoMarka::getList($tech_category_id); 
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionGetmodel() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $tech_category_id = empty($ids[0]) ? null : $ids[0];
            $tech_marka_id = empty($ids[1]) ? null : $ids[1];
            if ($tech_category_id != null) {
               $data = \common\models\AutoModel::getList($tech_category_id, $tech_marka_id);
               echo Json::encode(['output'=>$data, 'selected'=>'']);
               return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

}