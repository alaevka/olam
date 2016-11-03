<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use Faker;

class OnmoderateController extends Controller
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

    
    public function actionIndex()
    {
        $searchModel_ads = new \common\models\SearchAds;
        $dataProvider_ads = $searchModel_ads->search_notactive(Yii::$app->request->getQueryParams());


        $searchModel_auto = new \common\models\SearchAuto;
        $dataProvider_auto = $searchModel_auto->search_notactive(Yii::$app->request->getQueryParams());

        $searchModel_resume = new \common\models\SearchResume;
        $dataProvider_resume = $searchModel_resume->search_notactive(Yii::$app->request->getQueryParams());

        $searchModel_vacancy = new \common\models\SearchVacancy;
        $dataProvider_vacancy = $searchModel_vacancy->search_notactive(Yii::$app->request->getQueryParams());

        $searchModel_adsother = new \common\models\SearchAdsother;
        $dataProvider_adsother = $searchModel_adsother->search_notactive(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider_ads' => $dataProvider_ads,
            'searchModel_ads' => $searchModel_ads,

            'dataProvider_auto' => $dataProvider_auto,
            'searchModel_auto' => $searchModel_auto,

            'dataProvider_resume' => $dataProvider_resume,
            'searchModel_resume' => $searchModel_resume,

            'dataProvider_vacancy' => $dataProvider_vacancy,
            'searchModel_vacancy' => $searchModel_vacancy,

            'dataProvider_adsother' => $dataProvider_adsother,
            'searchModel_adsother' => $searchModel_adsother,
        ]);
    }

}