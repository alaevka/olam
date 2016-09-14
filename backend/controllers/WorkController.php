<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use Faker;
use yii\helpers\Json;

class WorkController extends Controller
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

    public function actionResume()
    {
        $searchModel = new \common\models\SearchResume;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('resume', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

}