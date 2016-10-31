<?php

namespace backend\controllers;

use Yii;
use common\models\Persons;
use common\models\SearchPersons;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use Faker;

class PersonsController extends Controller
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
        $searchModel = new SearchPersons;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

       
    public function actionCreate()
    {
        $model = new Persons;
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'image_name');
            if ($file && $file->tempName) {
                $model->image_name = $file;
                if ($model->validate(['image_name'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/persons/';
                    $fileName = $model->image_name->baseName . '.' . $model->image_name->extension;
                    $model->image_name->saveAs($dir . $fileName);
                    //@todo crop current image
                    
                    $model->image_name = $fileName;
                }
            }
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
        $last_image_name = $model->image_name;
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'image_name');
            if ($file && $file->tempName) {
                $model->image_name = $file;
                if ($model->validate(['image_name'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/persons/';
                    $fileName = $model->image_name->baseName . '.' . $model->image_name->extension;
                    //@todo delete old file

                    $model->image_name->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->image_name = $fileName;
                }
            } else {
                $model->image_name = $last_image_name;
            }

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
        if (($model = Persons::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
