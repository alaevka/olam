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

    public function actionCreateraion($location_id)
    {
        $model = new \common\models\LocationsRaion;
        $model->location_id = $location_id;
        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                if($model->save()) {
                    
                    \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция добавлена');
                    return $this->redirect(['update', 'id' => $model->location_id]);
                }
            } else {
                return $this->render('createraion', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('createraion', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreatestreet($location_id)
    {
        $model = new \common\models\LocationsStreet;
        $model->location_id = $location_id;
        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                if($model->save()) {
                    
                    \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция добавлена');
                    return $this->redirect(['update', 'id' => $model->location_id]);
                }
            } else {
                return $this->render('createstreet', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('createstreet', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateraion($id)
    {
        $model = $this->findModelRaion($id);

        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                if($model->save()) {
                    
                    \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция изменена');
                    return $this->redirect(['update', 'id' => $model->location_id]);
                }
            } else {
                return $this->render('updateraion', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('updateraion', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdatestreet($id)
    {
        $model = $this->findModelStreet($id);

        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                if($model->save()) {
                    
                    \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция изменена');
                    return $this->redirect(['update', 'id' => $model->location_id]);
                }
            } else {
                return $this->render('updatestreet', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('updatestreet', [
                'model' => $model,
            ]);
        }
    }

    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $searchModelRaion = new \common\models\SearchLocationsRaion;
        $dataProviderRaion = $searchModelRaion->search(Yii::$app->request->getQueryParams());

        $searchModelStreet = new \common\models\SearchLocationsStreet;
        $dataProviderStreet = $searchModelStreet->search(Yii::$app->request->getQueryParams());
        
        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                if($model->save()) {
                    
                    \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция изменена');
                    return $this->redirect(['index']);
                }
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'dataProviderRaion' => $dataProviderRaion,
                    'searchModelRaion' => $searchModelRaion,
                    'dataProviderStreet' => $dataProviderStreet,
                    'searchModelStreet' => $searchModelStreet,
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'dataProviderRaion' => $dataProviderRaion,
                'searchModelRaion' => $searchModelRaion,
                'dataProviderStreet' => $dataProviderStreet,
                'searchModelStreet' => $searchModelStreet,
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

    public function actionDeleteraion($id)
    {
        $model = $this->findModelRaion($id);    
        $model->delete();
        \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция удалена');
        return $this->redirect(['update', 'id' => $model->location_id]);
    }

    public function actionDeletestreet($id)
    {
        $model = $this->findModelStreet($id);    
        $model->delete();
        \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция удалена');
        return $this->redirect(['update', 'id' => $model->location_id]);
    }

    
    protected function findModel($id)
    {
        if (($model = Locations::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelRaion($id)
    {
        if (($model = \common\models\LocationsRaion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelStreet($id)
    {
        if (($model = \common\models\LocationsStreet::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
