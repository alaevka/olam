<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use common\models\Adsgallery;
use common\models\Ads;
use common\models\SearchAds;

class RealtyController extends Controller
{
    public function actionIndex()
    {
        
        $last_10_objects = Ads::find()->orderBy('created_at')->limit(8)->all();
        $hot_objects = Ads::find()->orderBy('RAND()')->limit(12)->all();

        $search = new SearchAds;

        $dataProvider = new ActiveDataProvider([
            'query' => Ads::find()->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'last_10_objects' => $last_10_objects,
            'hot_objects' => $hot_objects,
            'search' => $search,
            'listDataProvider' => $dataProvider,
        ]);
    }


    public function actionCreate()
    {
        
        $model = new \common\models\Ads;

        if(!Yii::$app->user->isGuest) {
            $model->contacts_email = Yii::$app->user->identity->email;
            $model->user_id = Yii::$app->user->identity->id;
        }

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
            'flat_type' => Ads::_getFlatType(),
            'flat_plan' => Ads::_getFlatPlan(),
            'flat_repairs' => Ads::_getFlatRepairs(),
            'type_of_ownership' => Ads::_getTypeOfOwnership(),
            'house_type' => Ads::_getHouseType(),
            'house_material' => Ads::_getHouseMaterial(),
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