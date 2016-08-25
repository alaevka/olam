<?php

namespace backend\controllers;

use Yii;
use common\models\Ads;
use common\models\Adsgallery;
use common\models\SearchAds;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use Faker;

class RealtyController extends Controller
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
        $searchModel = new SearchAds;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionCreate()
    {
        $model = new Ads;
        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {

                if(!Yii::$app->user->isGuest) {
                    $model->user_id = Yii::$app->user->identity->id;
                }

                if(!empty($model->price_conditions)) {
                    $model->price_conditions = serialize($model->price_conditions);
                }

                if($model->save()) {

                    if($_FILES['Ads']['tmp_name']['gallery'][0] != '') {

                        foreach($_FILES['Ads']['tmp_name']['gallery'] as $key=>$file) {
                            $ext = end((explode(".", $_FILES['Ads']['name']['gallery'][$key])));
                            $name = Yii::$app->security->generateRandomString().'.'.$ext;
                            move_uploaded_file($_FILES['Ads']['tmp_name']['gallery'][$key], Yii::getAlias('@frontend'). '/web/uploads/ads/' . $name);
                           
                            Image::thumbnail(Yii::getAlias('@frontend'). '/web/uploads/ads/' . $name, 120, 120)
                                ->save(Yii::getAlias('@frontend'). '/web/uploads/ads/cropped_'. $name, ['quality' => 100]);

                            $gallery = new Adsgallery();
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
                    'flat_type' => Ads::_getFlatType(),
                    'flat_plan' => Ads::_getFlatPlan(),
                    'flat_repairs' => Ads::_getFlatRepairs(),
                    'type_of_ownership' => Ads::_getTypeOfOwnership(),
                    'house_type' => Ads::_getHouseType(),
                    'house_material' => Ads::_getHouseMaterial(),
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'locations' => \common\models\Locations::_getLocations(),
                'flat_type' => Ads::_getFlatType(),
                'flat_plan' => Ads::_getFlatPlan(),
                'flat_repairs' => Ads::_getFlatRepairs(),
                'type_of_ownership' => Ads::_getTypeOfOwnership(),
                'house_type' => Ads::_getHouseType(),
                'house_material' => Ads::_getHouseMaterial(),
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->price_conditions = unserialize($model->price_conditions);
        
        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {

                if(!empty($model->price_conditions)) {
                    $model->price_conditions = serialize($model->price_conditions);
                }

                if($model->save()) {

                    if($_FILES['Ads']['tmp_name']['gallery'][0] != '') {

                        foreach($_FILES['Ads']['tmp_name']['gallery'] as $key=>$file) {
                            $ext = end((explode(".", $_FILES['Ads']['name']['gallery'][$key])));
                            $name = Yii::$app->security->generateRandomString().'.'.$ext;
                            move_uploaded_file($_FILES['Ads']['tmp_name']['gallery'][$key], Yii::getAlias('@frontend'). '/web/uploads/ads/' . $name);
                           
                            Image::thumbnail(Yii::getAlias('@frontend'). '/web/uploads/ads/' . $name, 120, 120)
                                ->save(Yii::getAlias('@frontend'). '/web/uploads/ads/cropped_'. $name, ['quality' => 100]);

                            $gallery = new Adsgallery();
                            $gallery->ads_id = $model->id;
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
                    'flat_type' => Ads::_getFlatType(),
                    'flat_plan' => Ads::_getFlatPlan(),
                    'flat_repairs' => Ads::_getFlatRepairs(),
                    'type_of_ownership' => Ads::_getTypeOfOwnership(),
                    'house_type' => Ads::_getHouseType(),
                    'house_material' => Ads::_getHouseMaterial(),
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'locations' => \common\models\Locations::_getLocations(),
                'flat_type' => Ads::_getFlatType(),
                'flat_plan' => Ads::_getFlatPlan(),
                'flat_repairs' => Ads::_getFlatRepairs(),
                'type_of_ownership' => Ads::_getTypeOfOwnership(),
                'house_type' => Ads::_getHouseType(),
                'house_material' => Ads::_getHouseMaterial(),
            ]);
        }
    }


    public function actionDelete($id)
    {
        $model = $this->findModel($id);    
        $model->delete();
        \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция удалена');
        return $this->redirect(['index']);
    }

    
    protected function findModel($id)
    {
        if (($model = Ads::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
       

    public function actionFaker() {
        $faker = Faker\Factory::create();
        
        for ($i=0; $i < 100; $i++) { 
            $ad = new Ads;
            $ad->rlty_type = rand(0,5);
            $ad->rlty_action = rand(0,3);
            $ad->location_city = rand(1,30);
            $ad->location_street = $faker->streetName;
            $ad->location_house = rand(1, 100);
            $ad->location_raion = $faker->sentence($nbWords = 2, $variableNbWords = true);
            $ad->rooms_count = rand(1,4);
            $ad->area_total = rand(50, 200);
            $ad->area_for_living = rand(50, $ad->area_total);
            $ad->area_kitchen = rand(10, $ad->area_total);
            $ad->level = rand(1,25);
            $ad->total_levels = rand($ad->level, 25);
            $ad->flat_type = rand(1,2);
            $ad->flat_plan = rand(1,2);
            $ad->flat_repairs = rand(1,2);
            $ad->loggias_count = rand(10,20);
            $ad->balconies_count = rand(10,20);
            $ad->price = rand(1000000, 20000000);
            $ad->price_conditions = 'a:4:{i:0;s:1:"1";i:1;s:1:"3";i:2;s:1:"5";i:3;s:1:"6";}';
            $ad->type_of_ownership = rand(1,2);
            $ad->year_of_construction = rand(1950, 2016);
            $ad->house_type = rand(1,2);
            $ad->house_material = rand(1,2);
            $ad->additional_info = $faker->text($maxNbChars = 500);
            $ad->contacts_username = $faker->name;
            $ad->contacts_phone = $faker->e164PhoneNumber;
            $ad->contacts_email = $faker->email;
            $ad->user_id = 2;

            if($ad->save()) {

                $gallery = new Adsgallery;
                $gallery->image_name = '237qvKuB9Y_PRSjkUen6_yWXbQmcm8hE.jpg';
                $gallery->ads_id = $ad->id;
                $gallery->save();

                $gallery = new Adsgallery;
                $gallery->image_name = 'YdzsBml7rcIc_69ySaVlhEr3lGnIkgWK.jpg';
                $gallery->ads_id = $ad->id;
                $gallery->save();

                $gallery = new Adsgallery;
                $gallery->image_name = 'SbIWk1ArnSfdURU9yGAwG48-Tq3qqXsw.jpg';
                $gallery->ads_id = $ad->id;
                $gallery->save();


            } else {
                echo '<pre>';
                print_r($ad->errors);
            }
        }
    }
    
}
