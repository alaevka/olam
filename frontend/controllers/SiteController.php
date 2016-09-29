<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\AccessControl;

use yii\data\ActiveDataProvider;
/**
 * Site controller
 */
class SiteController extends Controller
{
    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['objectsrealty', 'objectsauto', 'objectsvacancy', 'objectsresume', 'objectsads'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['objectsrealty', 'objectsauto', 'objectsvacancy', 'objectsresume', 'objectsads'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionObjectsrealty()
    {   
        $dataProvider = new ActiveDataProvider([
            'query' => \common\models\Ads::find()->where(['user_id' => Yii::$app->user->id])->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);

        return $this->render('/user/settings/realty_list.php', [
            'listDataProvider' => $dataProvider
        ]);
    }

    public function actionObjectsauto()
    {   
        $dataProvider = new ActiveDataProvider([
            'query' => \common\models\Auto::find()->where(['user_id' => Yii::$app->user->id])->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);

        return $this->render('/user/settings/auto_list.php', [
            'listDataProvider' => $dataProvider
        ]);
    }

    public function actionObjectsvacancy()
    {   
        $dataProvider = new ActiveDataProvider([
            'query' => \common\models\Vacancy::find()->where(['user_id' => Yii::$app->user->id])->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);

        return $this->render('/user/settings/vacancy_list.php', [
            'listDataProvider' => $dataProvider
        ]);
    }

    public function actionObjectsresume()
    {   
        $dataProvider = new ActiveDataProvider([
            'query' => \common\models\Resume::find()->where(['user_id' => Yii::$app->user->id])->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);

        return $this->render('/user/settings/resume_list.php', [
            'listDataProvider' => $dataProvider
        ]);
    }

    public function actionObjectsads()
    {   
        $dataProvider = new ActiveDataProvider([
            'query' => \common\models\Adsother::find()->where(['user_id' => Yii::$app->user->id])->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);

        return $this->render('/user/settings/ads_list.php', [
            'listDataProvider' => $dataProvider
        ]);
    }
}