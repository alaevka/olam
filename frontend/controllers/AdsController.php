<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;

class AdsController extends Controller
{
    public function actionIndex()
    {
        
        $search = new \common\models\SearchAdsother;
        $list_categories = \common\models\AdsCategories::find()->where(['lvl' => 0])->orderBy('name')->all();

        return $this->render('index', [
            'search' => $search,
            'list_categories' => $list_categories
        ]);
    }

    public function actionCreate() {

    	$model = new \common\models\Adsother;

    	return $this->render('create', [
            'model' => $model
        ]);
    }
}