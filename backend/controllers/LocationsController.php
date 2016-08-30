<?php

namespace backend\controllers;

use Yii;
use common\models\Locations;
use common\models\SearchLocations;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class LocationsController extends Controller
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
        $searchModel = new SearchLocations;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

       
    public function actionCreate()
    {
        $model = new Locations;
        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                if($model->save()) {
                    
                    \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция добавлена');
                    return $this->redirect(['index']);
                }
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                if($model->save()) {
                    
                    \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция изменена');
                    return $this->redirect(['index']);
                }
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    
    public function actionDelete($id)
    {
        $model = $this->findModel($id);    
        $model->delete();
        \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция удалена');
        return $this->redirect(['index']);
    }

    
    protected function findModel($id)
    {
        if (($model = Locations::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
