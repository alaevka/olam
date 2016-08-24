<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use common\models\Adsgallery;

class RealtyController extends Controller
{
    public function actionIndex()
    {
        

        return $this->render('index', [
           
        ]);
    }


    public function actionCreate()
    {
        
        $model = new \common\models\Ads;

        if(!Yii::$app->user->isGuest) {
            $model->contacts_email = Yii::$app->user->identity->email;
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {

                if(!empty($model->price_conditions)) {
                    $model->price_conditions = serialize($model->price_conditions);
                }

                // echo '<pre>';
                // print_r($_FILES); die();
                // echo '<pre>';
                // print_r($model); die();

                if($model->save()) {

                    if($_FILES['Ads']['tmp_name']['gallery'][0] != '') {

                        foreach($_FILES['Ads']['tmp_name']['gallery'] as $key=>$file) {
                            $ext = end((explode(".", $_FILES['Ads']['name']['gallery'][$key])));
                            $name = Yii::$app->security->generateRandomString().'.'.$ext;
                            move_uploaded_file($_FILES['Ads']['tmp_name']['gallery'][$key], 'uploads/ads/' . $name);
                            //$this->_createThumbImage($name, 170, 130);
                            $gallery = new Adsgallery();
                            $gallery->ads_id = $model->id;
                            $gallery->image_name = $name;
                            $gallery->save();

                        }
                    }
                    
                    \Yii::$app->getSession()->setFlash('flash_message', Yii::t('app', 'rlty.your_ads_was_added'));
                    return $this->redirect(['index']);

                }
            }
        }

        

        return $this->render('create', [
            'model' => $model,
            'locations' => \common\models\Locations::_getLocations(),
            'flat_type' => ['1' => Yii::t('app', 'rlty.flat_type_1'), '2' => Yii::t('app', 'rlty.flat_type_2')],
            'flat_plan' => ['1' => Yii::t('app', 'rlty.flat_plan_type_1'), '2' => Yii::t('app', 'rlty.flat_plan_type_2')],
            'flat_repairs' => ['1' => Yii::t('app', 'rlty.flat_repairs_type_1'), '2' => Yii::t('app', 'rlty.flat_repairs_type_2')],
            'type_of_ownership' => ['1' => Yii::t('app', 'rlty.type_of_ownership_type_1'), '2' => Yii::t('app', 'rlty.type_of_ownership_type_2')],
            'house_type' => ['1' => Yii::t('app', 'rlty.house_type_type_1'), '2' => Yii::t('app', 'rlty.house_type_type_2')],
            'house_material' => ['1' => Yii::t('app', 'rlty.house_material_type_1'), '2' => Yii::t('app', 'rlty.house_material_type_2')],
        ]);
    }

    public function _createThumbImage($image_name, $width, $height) {
        Yii::$app->image
                ->load($_SERVER['DOCUMENT_ROOT'] . '/uploads/ads' . $image_name)
                ->adaptiveThumb($width, $height)
                //->watermark($_SERVER['DOCUMENT_ROOT'] . '/themes/prototype/images/my_account_template.png', 0, 0, CImageHandler::CORNER_LEFT_BOTTOM)
                ->save($_SERVER['DOCUMENT_ROOT'] . '/uploads/ads/cropped_' . $image_name, \common\components\CImageHandler::IMG_JPEG, 100);
    }
    
}