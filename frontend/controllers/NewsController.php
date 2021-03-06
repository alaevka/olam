<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use common\models\NewsCategory;
use yii\data\ActiveDataProvider;
use common\models\News;
use yii\web\NotFoundHttpException;

class NewsController extends Controller
{
    public function actionIndex()
    {

        $news_category = $this->findModelNewsCategory(Yii::$app->request->get('slug'));
        // $dataProvider = new ActiveDataProvider([
        //     'query' => News::find()->where(['category_id' => $news_category->id])->orderBy('created_at DESC'),
        //     'pagination' => [
        //         'pageSize' => 15,
        //     ],
        //     'sort' => [
        //         'attributes' => ['type'],
        //     ],
        // ]);
        $model_filter = new \common\models\SearchNews;
        $dataProvider = $model_filter->searchext(Yii::$app->request->getQueryParams(), $news_category->id);
        

        return $this->render('index', [
            'news_category' => $news_category,
            'listDataProvider' => $dataProvider,
            'model_filter' => $model_filter
        ]);
    }

    protected function findModelNewsCategory($slug)
    {
        if (($model = NewsCategory::find()->where(['slug' => $slug])->one()) !== null) {
            return $model;
        } else {
            $model = NewsCategory::find()->orderBy('order')->one();
            return $model;
            //throw new NotFoundHttpException(Yii::t('app', 'error.the_requested_page_does_not_exist'));
        }
    }

    public function actionView() {

        $new_item = $this->findModelNews(Yii::$app->request->get('slug'));

        $dataProvider = new ActiveDataProvider([
            'query' => News::find()->where(['category_id' => $new_item->category_id])->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => 6,
            ],
        ]);

        return $this->render('view', [
            'model' => $new_item,
            'listDataProvider' => $dataProvider
        ]);
    }

    public function actionArchive() {

        $dataProvider = new ActiveDataProvider([
            'query' => News::find()->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);

        return $this->render('archive', [
            'listDataProvider' => $dataProvider
        ]);
    }

    protected function findModelNews($slug)
    {
        if (($model = News::find()->where(['slug' => $slug])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'error.the_requested_page_does_not_exist'));
        }
    }

    
}
