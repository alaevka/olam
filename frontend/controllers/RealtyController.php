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
use yii\helpers\Json;

class RealtyController extends Controller
{
    public function actionIndex()
    {
        
        $last_10_objects = Ads::find()->orderBy('created_at')->limit(8)->all();
        $hot_objects = Ads::find()->where(['is_hot' => 1])->orderBy('RAND()')->limit(12)->all();

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

    public function actionView($id) {

        $model = $this->findModel($id);
        $dataProvider = new ActiveDataProvider([
            'query' => Ads::find()->orderBy('created_at DESC')->limit(7),
            'totalCount' => 7,
            'pagination' => [
                'pageSize' => 7,
            ],
        ]);

        return $this->render('view', [
            'model' => $model,
            'listDataProvider' => $dataProvider,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Ads::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionCreate()
    {
        
        $model = new \common\models\Ads;

        if(!Yii::$app->user->isGuest) {
            $model->contacts_email = Yii::$app->user->identity->email;
            $model->user_id = Yii::$app->user->identity->id;
        }

        if ($model->load(Yii::$app->request->post())) {

            $model->is_active = 0;

            if(!empty($model->new_location_raion)) {
                //create new raion
                $location_raion = new \common\models\LocationsRaion;
                $location_raion->raion = $model->new_location_raion;
                $location_raion->location_id = $model->location_city;
                $location_raion->save();
                $model->location_raion = $location_raion->id;
            }

            if(!empty($model->new_location_street)) {
                //create new street
                $location_street = new \common\models\LocationsStreet;
                $location_street->street = $model->new_location_street;
                $location_street->location_id = $model->location_city;
                $location_street->save();
                $model->location_street = $location_street->id;
            }

            if ($model->validate()) {

                if(!empty($model->price_conditions)) {
                    $model->price_conditions = serialize($model->price_conditions);
                }

                if($model->save()) {

                    if($_FILES['Ads']['tmp_name']['gallery'][0] != '') {

                        foreach($_FILES['Ads']['tmp_name']['gallery'] as $key=>$file) {
                            $ext = end((explode(".", $_FILES['Ads']['name']['gallery'][$key])));
                            $name = Yii::$app->security->generateRandomString().'.'.$ext;
                            move_uploaded_file($_FILES['Ads']['tmp_name']['gallery'][$key], 'uploads/objects/' . $name);
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
                ->load($_SERVER['DOCUMENT_ROOT'] . '/uploads/objects' . $image_name)
                ->adaptiveThumb($width, $height)
                //->watermark($_SERVER['DOCUMENT_ROOT'] . '/themes/prototype/images/my_account_template.png', 0, 0, CImageHandler::CORNER_LEFT_BOTTOM)
                ->save($_SERVER['DOCUMENT_ROOT'] . '/uploads/objects/cropped_' . $image_name, \common\components\CImageHandler::IMG_JPEG, 100);
    }

    public function actionGetraion() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $relty_city_id = $parents[0];
                $out = \common\models\LocationsRaion::getList($relty_city_id); 
                echo Json::encode(['output'=>$out, 'selected'=> isset($_GET['selected']) ? $selected = $_GET['selected'] : $selected = '']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionGetstreet() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $relty_city_id = $parents[0];
                $out = \common\models\LocationsStreet::getList($relty_city_id); 
                echo Json::encode(['output'=>$out, 'selected'=> isset($_GET['selected']) ? $selected = $_GET['selected'] : $selected = '']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    
    public function actionSearch() {

        $search = new SearchAds;
        $dataProvider = $search->search(Yii::$app->request->post());
        //print_r(Yii::$app->request->post()); die();

        return $this->render('search', [
            'search' => $search,
            'listDataProvider' => $dataProvider,
        ]);
    }

}