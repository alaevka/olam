<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use common\models\NewsCategory;

/**
 * Site controller
 */
class NewsController extends Controller
{
    public function actionIndex()
    {
        $news_category = $this->findModelNewsCategory(Yii::$app->request->get('slug'));

        return $this->render('index', [
            'news_category' => $news_category
        ]);
    }

    protected function findModelNewsCategory($slug)
    {
        if (($model = NewsCategory::find()->where(['slug' => $slug])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'error.the_requested_page_does_not_exist'));
        }
    }

    
}
