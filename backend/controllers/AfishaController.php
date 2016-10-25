<?php

namespace backend\controllers;

use Yii;
use common\models\Afisha;
use common\models\SearchAfisha;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use Faker;

class AfishaController extends Controller
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
        $searchModel = new SearchAfisha;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
        
    }

       
    public function actionCreate()
    {
        $model = new Afisha;
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'image_name');
            if ($file && $file->tempName) {
                $model->image_name = $file;
                if ($model->validate(['image_name'])) {
                    $dir = Yii::getAlias('@frontend/web/uploads/afisha/');
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
                    $dir = Yii::getAlias('@frontend/web/uploads/afisha/');
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
        if (($model = Afisha::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionFaker() {
        $faker = Faker\Factory::create();
        
        for ($i=0; $i < 100; $i++) { 
            $new = new Afisha;
            $new->title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $new->image_name = 'photo_2016-07-20_15-58-47.jpg';
            $new->content = $faker->text($maxNbChars = 500);
            $new->category_id = rand(1,7);
            $new->seoTitle = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $new->seoKeywords = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $new->seoDescription = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $new->save();
        }


    }
}
