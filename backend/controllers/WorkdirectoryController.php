<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;




class WorkdirectoryController extends Controller
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

    
    public function actionWorkspheres()
    {
        $searchModel = new \common\models\SearchSphere;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('sphere', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionWorkschedule()
    {
        $searchModel = new \common\models\SearchSchedule;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('schedule', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionWorkemployment()
    {
        $searchModel = new \common\models\SearchEmployment;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('employment', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    

       
    public function actionCreate($model_name)
    {
        $name = '\common\models\\'.$model_name;
        $model = new $name;
        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                if($model->save()) {
                    
                    \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция добавлена');
                    return $this->redirect([strtolower($model_name)]);
                }
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'model_name' => $model_name,
                    'model_name_title' => $this->_switchModelName($model_name),
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'model_name' => $model_name,
                'model_name_title' => $this->_switchModelName($model_name),
            ]);
        }
    }

    
    public function actionUpdate($id, $model_name)
    {
        $model = $this->findModel($id, $model_name);
        
        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                if($model->save()) {
                    
                    \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция изменена');
                    return $this->redirect([strtolower($model_name)]);
                }
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'model_name' => $model_name,
                    'model_name_title' => $this->_switchModelName($model_name),
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'model_name' => $model_name,
                'model_name_title' => $this->_switchModelName($model_name),
            ]);
        }
    }

    protected function _switchModelName($model_name) {
        switch ($model_name) {
            case 'WorkSpheres':
                return 'Сферы деятельности';
                break;
            case 'WorkSchedule':
                return 'Графики работы';
                break;
            case 'WorkEmployment':
                return 'Типы занятости';
                break;
            
        }
    }

    
    public function actionDelete($id, $model_name)
    {
        $model = $this->findModel($id, $model_name);    
        $model->delete();
        \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция удалена');
        return $this->redirect([strtolower($model_name)]);
    }

    
    protected function findModel($id, $model_name)
    {
        $name = '\common\models\\'.$model_name;
       

        if (($model = $name::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
