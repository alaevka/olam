<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;




class DirectoryController extends Controller
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

    
    public function actionFlattypes()
    {
        $searchModel = new \common\models\SearchFlattypes;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('flattypes', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionFlatplans()
    {
        $searchModel = new \common\models\SearchFlatplans;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('flatplans', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionFlatrepairs()
    {
        $searchModel = new \common\models\SearchFlatrepairs;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('flatrepairs', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionOwnership()
    {
        $searchModel = new \common\models\SearchOwnership;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('ownership', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionHousetypes()
    {
        $searchModel = new \common\models\SearchHousetypes;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('housetypes', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionHousematerials()
    {
        $searchModel = new \common\models\SearchHousematerials;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('housematerials', [
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
            case 'Flattypes':
                return 'Справочник "Типы квартир"';
                break;
            case 'Flatplans':
                return 'Справочник "Планировки квартир"';
                break;
            case 'Flatrepairs':
                return 'Справочник "Виды ремонта"';
                break;
            case 'Ownership':
                return 'Справочник "Форма собственности"';
                break;
            case 'Housetypes':
                return 'Справочник "Типы домов"';
                break;
            case 'Housematerials':
                return 'Справочник "Материалы домов"';
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
