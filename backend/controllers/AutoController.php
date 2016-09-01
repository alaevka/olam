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
                            $gallery->ads_id = $model->id;
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

    

}