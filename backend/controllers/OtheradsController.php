<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use Faker;
use common\models\SearchAdsother;
use common\models\Adsother;
use yii\helpers\Json;

class OtheradsController extends Controller
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

    
    public function actionCategories()
    {
        return $this->render('categories', [
        ]);
    }

    public function actionIndex()
    {
        $searchModel = new SearchAdsother;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
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
        if (($model = Adsother::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreate()
    {
        $model = new Adsother;
        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {

                if(!Yii::$app->user->isGuest) {
                    $model->user_id = Yii::$app->user->identity->id;
                }

                if($model->save()) {

                    if($_FILES['Adsother']['tmp_name']['gallery'][0] != '') {

                        foreach($_FILES['Adsother']['tmp_name']['gallery'] as $key=>$file) {
                            $ext = end((explode(".", $_FILES['Adsother']['name']['gallery'][$key])));
                            $name = Yii::$app->security->generateRandomString().'.'.$ext;
                            move_uploaded_file($_FILES['Adsother']['tmp_name']['gallery'][$key], Yii::getAlias('@frontend'). '/web/uploads/other/' . $name);
                           
                            $gallery = new \common\models\Adsothergallery();
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
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {

                if($model->save()) {

                    if($_FILES['Adsother']['tmp_name']['gallery'][0] != '') {

                        foreach($_FILES['Adsother']['tmp_name']['gallery'] as $key=>$file) {
                            $ext = end((explode(".", $_FILES['Adsother']['name']['gallery'][$key])));
                            $name = Yii::$app->security->generateRandomString().'.'.$ext;
                            move_uploaded_file($_FILES['Adsother']['tmp_name']['gallery'][$key], Yii::getAlias('@frontend'). '/web/uploads/other/' . $name);
                           
                            $gallery = new \common\models\Adsothergallery();
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
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeleteimage()
    {
        if ($post = Yii::$app->request->post()) {
            $adsgallery_image = \common\models\Adsothergallery::findOne($post['key']);
            $adsgallery_image->delete();
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return Json::encode([]);
        }
    }

    public function actionFaker() {
        $faker = Faker\Factory::create();
        
        for ($i=0; $i < 100; $i++) { 
            $ad = new Adsother;
            
            $ad->type = rand(1,2);
            $ad->title = $faker->sentence($nbWords = 7, $variableNbWords = true);
            $ad->description = $faker->text($maxNbChars = 1500);
            $ad->category_id = rand(1,16);
            $ad->price = rand(1000, 200000);
            $ad->contacts_username = $faker->name;
            $ad->contacts_phone = $faker->e164PhoneNumber;
            $ad->contacts_email = $faker->email;
            $ad->period = rand(1,3);
            $ad->location_city = rand(1,5);

            
            $ad->user_id = 2;

            if($ad->save()) {

                $gallery = new \common\models\Adsothergallery;
                $gallery->image_name = 'bg4vW_UjNAifgv7H_b8bVatgMB2Kzwve.jpg';
                $gallery->ads_id = $ad->id;
                $gallery->save();

                $gallery = new \common\models\Adsothergallery;
                $gallery->image_name = 'asyidskudgsayidivbg667asd.jpg';
                $gallery->ads_id = $ad->id;
                $gallery->save();

                $gallery = new \common\models\Adsothergallery;
                $gallery->image_name = 'aishd987sabsoydsaduasd.jpg';
                $gallery->ads_id = $ad->id;
                $gallery->save();

                $gallery = new \common\models\Adsothergallery;
                $gallery->image_name = 'aiosjdas798dasodg3fgausdvashgdk.jpg';
                $gallery->ads_id = $ad->id;
                $gallery->save();

            } else {
                echo '<pre>';
                print_r($ad->errors);
            }
        }
    }

}