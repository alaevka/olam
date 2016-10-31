<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\Persons;
use yii\web\NotFoundHttpException;

class PersonsController extends Controller
{
    public function actionIndex()
    {
        $news_category = $this->findModelNewsCategory(Yii::$app->request->get('slug'));
        $dataProvider = new ActiveDataProvider([
            'query' => News::find()->where(['category_id' => $news_category->id])->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);

        return $this->render('index', [
            'news_category' => $news_category,
            'listDataProvider' => $dataProvider
        ]);
    }


    public function actionView() {

        $new_item = $this->findModelPersons(Yii::$app->request->get('slug'));

        return $this->render('view', [
            'model' => $new_item,
        ]);
    }

    protected function findModelPersons($slug)
    {
        if (($model = Persons::find()->where(['slug' => $slug])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'error.the_requested_page_does_not_exist'));
        }
    }

    
}