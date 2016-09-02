<?php

namespace backend\controllers;

use Yii;
use common\models\Auto;
use common\models\Autogallery;
use common\models\SearchAuto;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use Faker;
use yii\helpers\Json;

class AutoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new SearchAuto;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
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

    public function actionCreate()
    {
        $model = new Auto;

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

            if ($model->validate()) {

                if(!Yii::$app->user->isGuest) {
                    $model->user_id = Yii::$app->user->identity->id;
                }

                if(!empty($model->special_notes)) {
                    $model->special_notes = serialize($model->special_notes);
                }

                if(!empty($model->exchange)) {
                    $model->exchange = serialize($model->exchange);
                }

                if($model->save()) {

                    if($_FILES['Auto']['tmp_name']['gallery'][0] != '') {

                        foreach($_FILES['Auto']['tmp_name']['gallery'] as $key=>$file) {
                            $ext = end((explode(".", $_FILES['Auto']['name']['gallery'][$key])));
                            $name = Yii::$app->security->generateRandomString().'.'.$ext;
                            move_uploaded_file($_FILES['Auto']['tmp_name']['gallery'][$key], Yii::getAlias('@frontend'). '/web/uploads/auto/' . $name);
                           
                            Image::thumbnail(Yii::getAlias('@frontend'). '/web/uploads/auto/' . $name, 120, 120)
                                ->save(Yii::getAlias('@frontend'). '/web/uploads/auto/cropped_'. $name, ['quality' => 100]);

                            $gallery = new Autogallery();
                            $gallery->auto_id = $model->id;
                            $gallery->image_name = $name;
                            $gallery->save();

                        }
                    }
                    
                    \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция добавлена');
                    return $this->redirect(['index']);
                }
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'locations' => \common\models\Locations::_getLocations(),
                    'construction_years' => $construction_years,
                    'colors_list' => $colors_list,
                    'colors_data_attribute_list' => $colors_data_attribute_list,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'locations' => \common\models\Locations::_getLocations(),
                'construction_years' => $construction_years,
                'colors_list' => $colors_list,
                'colors_data_attribute_list' => $colors_data_attribute_list,
            ]);
        }
    }



    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->special_notes = unserialize($model->special_notes);
        $model->exchange = unserialize($model->exchange);

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

            // echo '<pre>';
            // print_r($model); die();

            if ($model->validate()) {

                if(!empty($model->special_notes)) {
                    $model->special_notes = serialize($model->special_notes);
                }

                if(!empty($model->exchange)) {
                    $model->exchange = serialize($model->exchange);
                }

                //print_r($model->exchange); die();

                if($model->save()) {

                    if($_FILES['Auto']['tmp_name']['gallery'][0] != '') {

                        foreach($_FILES['Auto']['tmp_name']['gallery'] as $key=>$file) {
                            $ext = end((explode(".", $_FILES['Auto']['name']['gallery'][$key])));
                            $name = Yii::$app->security->generateRandomString().'.'.$ext;
                            move_uploaded_file($_FILES['Auto']['tmp_name']['gallery'][$key], Yii::getAlias('@frontend'). '/web/uploads/auto/' . $name);
                           
                            Image::thumbnail(Yii::getAlias('@frontend'). '/web/uploads/auto/' . $name, 120, 120)
                                ->save(Yii::getAlias('@frontend'). '/web/uploads/auto/cropped_'. $name, ['quality' => 100]);

                            $gallery = new Autogallery();
                            $gallery->auto_id = $model->id;
                            $gallery->image_name = $name;
                            $gallery->save();

                        }
                    }
                    
                    \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция изменена');
                    return $this->redirect(['index']);
                }
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'locations' => \common\models\Locations::_getLocations(),
                    'construction_years' => $construction_years,
                    'colors_list' => $colors_list,
                    'colors_data_attribute_list' => $colors_data_attribute_list,
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'locations' => \common\models\Locations::_getLocations(),
                'construction_years' => $construction_years,
                'colors_list' => $colors_list,
                'colors_data_attribute_list' => $colors_data_attribute_list,
            ]);
        }
    }


    public function actionIshot() {
        if (Yii::$app->request->isAjax) {
            $param = Yii::$app->request->post('param');
            $row_id = Yii::$app->request->post('row_id');

            $ads = \common\models\Auto::findOne($row_id);
            $ads->is_hot = $param;
            

            if($ads->save()) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['error' => 0];
            } else {
                //print_r($permissions->errors); die();
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['error' => 1];
            }
            
        }
    }

    public function actionGetmark() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $tech_category_id = $parents[0];
                $out = \common\models\AutoMarka::getList($tech_category_id); 
                echo Json::encode(['output'=>$out, 'selected'=> isset($_GET['selected']) ? $selected = $_GET['selected'] : $selected = '']);
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
               echo Json::encode(['output'=>$data, 'selected'=>isset($_GET['selected']) ? $selected = $_GET['selected'] : $selected = '']);
               return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);    
        $model->delete();
        \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция удалена');
        return $this->redirect(['index']);
    }

    public function actionDeleteimage()
    {
        if ($post = Yii::$app->request->post()) {
            $autogallery_image = Autogallery::findOne($post['key']);
            $autogallery_image->delete();
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return Json::encode([]);
        }
    }

    
    protected function findModel($id)
    {
        if (($model = Auto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    

}