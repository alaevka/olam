<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class RealtyController extends Controller
{
    public function actionIndex()
    {
        

        return $this->render('index', [
           
        ]);
    }


    public function actionCreate()
    {
        

        return $this->render('create', [
           
        ]);
    }
}