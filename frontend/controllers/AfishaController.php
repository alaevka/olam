<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;

class AfishaController extends Controller
{
    public function actionIndex($category=0)
    {
   		if($category == 0) {
	        $dataProvider = new ActiveDataProvider([
	            'query' => \common\models\Afisha::find()->orderBy('created_at DESC'),
	            'pagination' => [
	                'pageSize' => 15,
	            ],
	        ]);
	    } else {
	    	
	    	$dataProvider = new ActiveDataProvider([
	            'query' => \common\models\Afisha::find()->where(['category_id' => $category])->orderBy('created_at DESC'),
	            'pagination' => [
	                'pageSize' => 15,
	            ],
	        ]);
	    }
        
        return $this->render('index', [
            'listDataProvider' => $dataProvider,
            'category' => $category
        ]);
    }

    public function actionView() {

        $new_item = $this->findModelAfisha(Yii::$app->request->get('slug'));

        $dataProvider = new ActiveDataProvider([
            'query' => \common\models\Afisha::find()->where(['category_id' => $new_item->category_id])->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => 6,
            ],
        ]);

        return $this->render('view', [
            'model' => $new_item,
            'listDataProvider' => $dataProvider
        ]);
    }

    protected function findModelAfisha($slug)
    {
        if (($model = \common\models\Afisha::find()->where(['slug' => $slug])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'error.the_requested_page_does_not_exist'));
        }
    }
}