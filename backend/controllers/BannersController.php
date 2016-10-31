<?php

namespace backend\controllers;

use Yii;
use common\models\Banners;
use common\models\BannersNews;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use Faker;

class BannersController extends Controller
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
        $model = $this->findModel(1);
        $last_image_name1 = $model->main_page1_image;
        $last_image_name2 = $model->main_page2_image;
        $last_image_name3 = $model->main_page3_image;
        $last_image_name4 = $model->main_page4_image;

        $last_image_name5 = $model->news1_image;
        $last_image_name6 = $model->news2_image;
        $last_image_name7 = $model->news3_image;
        $last_image_name8 = $model->news4_image;

        $last_image_name9 = $model->realty1_image;
        $last_image_name10 = $model->realty2_image;
        $last_image_name11 = $model->realty3_image;
        $last_image_name12 = $model->realty4_image;

        $last_image_name13 = $model->auto1_image;
        $last_image_name14 = $model->auto2_image;
        $last_image_name15 = $model->auto3_image;
        $last_image_name16 = $model->auto4_image;

        $last_image_name17 = $model->work1_image;
        $last_image_name18 = $model->work2_image;
        $last_image_name19 = $model->work3_image;
        $last_image_name20 = $model->work4_image;

        $last_image_name21 = $model->ads1_image;
        $last_image_name22 = $model->ads2_image;
        $last_image_name23 = $model->ads3_image;
        $last_image_name24 = $model->ads4_image;

        $last_image_name25 = $model->afisha1_image;
        $last_image_name26 = $model->afisha2_image;
        $last_image_name27 = $model->afisha3_image;
        $last_image_name28 = $model->afisha4_image;

        $last_image_name29 = $model->tv1_image;
        $last_image_name30 = $model->tv2_image;
        $last_image_name31 = $model->tv3_image;
        $last_image_name32 = $model->tv4_image;


        if ($model->load(Yii::$app->request->post())) {
            
            $file = UploadedFile::getInstance($model, 'main_page1_image');
            if ($file && $file->tempName) {
                $model->main_page1_image = $file;
                if ($model->validate(['main_page1_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->main_page1_image->baseName . '.' . $model->main_page1_image->extension;
                    //@todo delete old file

                    $model->main_page1_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->main_page1_image = $fileName;
                }
            } else {
                $model->main_page1_image = $last_image_name1;
            }

            $file = UploadedFile::getInstance($model, 'main_page2_image');
            if ($file && $file->tempName) {
                $model->main_page2_image = $file;
                if ($model->validate(['main_page2_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->main_page2_image->baseName . '.' . $model->main_page2_image->extension;
                    //@todo delete old file

                    $model->main_page2_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->main_page2_image = $fileName;
                }
            } else {
                $model->main_page2_image = $last_image_name2;
            }

            $file = UploadedFile::getInstance($model, 'main_page3_image');
            if ($file && $file->tempName) {
                $model->main_page3_image = $file;
                if ($model->validate(['main_page3_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->main_page3_image->baseName . '.' . $model->main_page3_image->extension;
                    //@todo delete old file

                    $model->main_page3_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->main_page3_image = $fileName;
                }
            } else {
                $model->main_page3_image = $last_image_name3;
            }

            $file = UploadedFile::getInstance($model, 'main_page4_image');
            if ($file && $file->tempName) {
                $model->main_page4_image = $file;
                if ($model->validate(['main_page4_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->main_page4_image->baseName . '.' . $model->main_page4_image->extension;
                    //@todo delete old file

                    $model->main_page4_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->main_page4_image = $fileName;
                }
            } else {
                $model->main_page4_image = $last_image_name4;
            }




            $file = UploadedFile::getInstance($model, 'news1_image');
            if ($file && $file->tempName) {
                $model->news1_image = $file;
                if ($model->validate(['news1_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->news1_image->baseName . '.' . $model->news1_image->extension;
                    //@todo delete old file

                    $model->news1_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->news1_image = $fileName;
                }
            } else {
                $model->news1_image = $last_image_name5;
            }

            $file = UploadedFile::getInstance($model, 'news2_image');
            if ($file && $file->tempName) {
                $model->news2_image = $file;
                if ($model->validate(['news2_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->news2_image->baseName . '.' . $model->news2_image->extension;
                    //@todo delete old file

                    $model->news2_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->news2_image = $fileName;
                }
            } else {
                $model->news2_image = $last_image_name6;
            }

            $file = UploadedFile::getInstance($model, 'news3_image');
            if ($file && $file->tempName) {
                $model->news3_image = $file;
                if ($model->validate(['news3_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->news3_image->baseName . '.' . $model->news3_image->extension;
                    //@todo delete old file

                    $model->news3_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->news3_image = $fileName;
                }
            } else {
                $model->news3_image = $last_image_name7;
            }

            $file = UploadedFile::getInstance($model, 'news4_image');
            if ($file && $file->tempName) {
                $model->news4_image = $file;
                if ($model->validate(['news4_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->news4_image->baseName . '.' . $model->news4_image->extension;
                    //@todo delete old file

                    $model->news4_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->news4_image = $fileName;
                }
            } else {
                $model->news4_image = $last_image_name8;
            }



            $file = UploadedFile::getInstance($model, 'auto1_image');
            if ($file && $file->tempName) {
                $model->auto1_image = $file;
                if ($model->validate(['auto1_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->auto1_image->baseName . '.' . $model->auto1_image->extension;
                    //@todo delete old file

                    $model->auto1_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->auto1_image = $fileName;
                }
            } else {
                $model->auto1_image = $last_image_name9;
            }

            $file = UploadedFile::getInstance($model, 'auto2_image');
            if ($file && $file->tempName) {
                $model->auto2_image = $file;
                if ($model->validate(['auto2_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->auto2_image->baseName . '.' . $model->auto2_image->extension;
                    //@todo delete old file

                    $model->auto2_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->auto2_image = $fileName;
                }
            } else {
                $model->auto2_image = $last_image_name10;
            }

            $file = UploadedFile::getInstance($model, 'auto3_image');
            if ($file && $file->tempName) {
                $model->auto3_image = $file;
                if ($model->validate(['auto3_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->auto3_image->baseName . '.' . $model->auto3_image->extension;
                    //@todo delete old file

                    $model->auto3_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->auto3_image = $fileName;
                }
            } else {
                $model->auto3_image = $last_image_name11;
            }

            $file = UploadedFile::getInstance($model, 'auto4_image');
            if ($file && $file->tempName) {
                $model->auto4_image = $file;
                if ($model->validate(['auto4_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->auto4_image->baseName . '.' . $model->auto4_image->extension;
                    //@todo delete old file

                    $model->auto4_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->auto4_image = $fileName;
                }
            } else {
                $model->auto4_image = $last_image_name12;
            }



            $file = UploadedFile::getInstance($model, 'realty1_image');
            if ($file && $file->tempName) {
                $model->realty1_image = $file;
                if ($model->validate(['realty1_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->realty1_image->baseName . '.' . $model->realty1_image->extension;
                    //@todo delete old file

                    $model->realty1_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->realty1_image = $fileName;
                }
            } else {
                $model->realty1_image = $last_image_name13;
            }

            $file = UploadedFile::getInstance($model, 'realty2_image');
            if ($file && $file->tempName) {
                $model->realty2_image = $file;
                if ($model->validate(['realty2_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->realty2_image->baseName . '.' . $model->realty2_image->extension;
                    //@todo delete old file

                    $model->realty2_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->realty2_image = $fileName;
                }
            } else {
                $model->realty2_image = $last_image_name14;
            }

            $file = UploadedFile::getInstance($model, 'realty3_image');
            if ($file && $file->tempName) {
                $model->realty3_image = $file;
                if ($model->validate(['realty3_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->realty3_image->baseName . '.' . $model->realty3_image->extension;
                    //@todo delete old file

                    $model->realty3_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->realty3_image = $fileName;
                }
            } else {
                $model->realty3_image = $last_image_name15;
            }

            $file = UploadedFile::getInstance($model, 'realty4_image');
            if ($file && $file->tempName) {
                $model->realty4_image = $file;
                if ($model->validate(['realty4_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->realty4_image->baseName . '.' . $model->realty4_image->extension;
                    //@todo delete old file

                    $model->realty4_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->realty4_image = $fileName;
                }
            } else {
                $model->realty4_image = $last_image_name16;
            }


            $file = UploadedFile::getInstance($model, 'work1_image');
            if ($file && $file->tempName) {
                $model->work1_image = $file;
                if ($model->validate(['work1_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->work1_image->baseName . '.' . $model->work1_image->extension;
                    //@todo delete old file

                    $model->work1_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->work1_image = $fileName;
                }
            } else {
                $model->work1_image = $last_image_name17;
            }

            $file = UploadedFile::getInstance($model, 'work2_image');
            if ($file && $file->tempName) {
                $model->work2_image = $file;
                if ($model->validate(['work2_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->work2_image->baseName . '.' . $model->work2_image->extension;
                    //@todo delete old file

                    $model->work2_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->work2_image = $fileName;
                }
            } else {
                $model->work2_image = $last_image_name18;
            }

            $file = UploadedFile::getInstance($model, 'work3_image');
            if ($file && $file->tempName) {
                $model->work3_image = $file;
                if ($model->validate(['work3_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->work3_image->baseName . '.' . $model->work3_image->extension;
                    //@todo delete old file

                    $model->work3_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->work3_image = $fileName;
                }
            } else {
                $model->work3_image = $last_image_name19;
            }

            $file = UploadedFile::getInstance($model, 'work4_image');
            if ($file && $file->tempName) {
                $model->work4_image = $file;
                if ($model->validate(['work4_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->work4_image->baseName . '.' . $model->work4_image->extension;
                    //@todo delete old file

                    $model->work4_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->work4_image = $fileName;
                }
            } else {
                $model->work4_image = $last_image_name20;
            }



            $file = UploadedFile::getInstance($model, 'ads1_image');
            if ($file && $file->tempName) {
                $model->ads1_image = $file;
                if ($model->validate(['ads1_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->ads1_image->baseName . '.' . $model->ads1_image->extension;
                    //@todo delete old file

                    $model->ads1_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->ads1_image = $fileName;
                }
            } else {
                $model->ads1_image = $last_image_name21;
            }

            $file = UploadedFile::getInstance($model, 'ads2_image');
            if ($file && $file->tempName) {
                $model->ads2_image = $file;
                if ($model->validate(['ads2_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->ads2_image->baseName . '.' . $model->ads2_image->extension;
                    //@todo delete old file

                    $model->ads2_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->ads2_image = $fileName;
                }
            } else {
                $model->ads2_image = $last_image_name22;
            }

            $file = UploadedFile::getInstance($model, 'ads3_image');
            if ($file && $file->tempName) {
                $model->ads3_image = $file;
                if ($model->validate(['ads3_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->ads3_image->baseName . '.' . $model->ads3_image->extension;
                    //@todo delete old file

                    $model->ads3_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->ads3_image = $fileName;
                }
            } else {
                $model->ads3_image = $last_image_name23;
            }

            $file = UploadedFile::getInstance($model, 'ads4_image');
            if ($file && $file->tempName) {
                $model->ads4_image = $file;
                if ($model->validate(['ads4_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->ads4_image->baseName . '.' . $model->ads4_image->extension;
                    //@todo delete old file

                    $model->ads4_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->ads4_image = $fileName;
                }
            } else {
                $model->ads4_image = $last_image_name24;
            }



            $file = UploadedFile::getInstance($model, 'afisha1_image');
            if ($file && $file->tempName) {
                $model->afisha1_image = $file;
                if ($model->validate(['afisha1_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->afisha1_image->baseName . '.' . $model->afisha1_image->extension;
                    //@todo delete old file

                    $model->afisha1_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->afisha1_image = $fileName;
                }
            } else {
                $model->afisha1_image = $last_image_name25;
            }

            $file = UploadedFile::getInstance($model, 'afisha2_image');
            if ($file && $file->tempName) {
                $model->afisha2_image = $file;
                if ($model->validate(['afisha2_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->afisha2_image->baseName . '.' . $model->afisha2_image->extension;
                    //@todo delete old file

                    $model->afisha2_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->afisha2_image = $fileName;
                }
            } else {
                $model->afisha2_image = $last_image_name26;
            }

            $file = UploadedFile::getInstance($model, 'afisha3_image');
            if ($file && $file->tempName) {
                $model->afisha3_image = $file;
                if ($model->validate(['afisha3_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->afisha3_image->baseName . '.' . $model->afisha3_image->extension;
                    //@todo delete old file

                    $model->afisha3_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->afisha3_image = $fileName;
                }
            } else {
                $model->afisha3_image = $last_image_name27;
            }

            $file = UploadedFile::getInstance($model, 'afisha4_image');
            if ($file && $file->tempName) {
                $model->afisha4_image = $file;
                if ($model->validate(['afisha4_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->afisha4_image->baseName . '.' . $model->afisha4_image->extension;
                    //@todo delete old file

                    $model->afisha4_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->afisha4_image = $fileName;
                }
            } else {
                $model->afisha4_image = $last_image_name28;
            }



            $file = UploadedFile::getInstance($model, 'tv1_image');
            if ($file && $file->tempName) {
                $model->tv1_image = $file;
                if ($model->validate(['tv1_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->tv1_image->baseName . '.' . $model->tv1_image->extension;
                    //@todo delete old file

                    $model->tv1_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->tv1_image = $fileName;
                }
            } else {
                $model->tv1_image = $last_image_name29;
            }

            $file = UploadedFile::getInstance($model, 'tv2_image');
            if ($file && $file->tempName) {
                $model->tv2_image = $file;
                if ($model->validate(['tv2_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->tv2_image->baseName . '.' . $model->tv2_image->extension;
                    //@todo delete old file

                    $model->tv2_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->tv2_image = $fileName;
                }
            } else {
                $model->tv2_image = $last_image_name30;
            }

            $file = UploadedFile::getInstance($model, 'tv3_image');
            if ($file && $file->tempName) {
                $model->tv3_image = $file;
                if ($model->validate(['tv3_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->tv3_image->baseName . '.' . $model->tv3_image->extension;
                    //@todo delete old file

                    $model->tv3_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->tv3_image = $fileName;
                }
            } else {
                $model->tv3_image = $last_image_name31;
            }

            $file = UploadedFile::getInstance($model, 'tv4_image');
            if ($file && $file->tempName) {
                $model->tv4_image = $file;
                if ($model->validate(['tv4_image'])) {
                    $dir = Yii::getAlias('@frontend'). '/web/uploads/banners/';
                    $fileName = $model->tv4_image->baseName . '.' . $model->tv4_image->extension;
                    //@todo delete old file

                    $model->tv4_image->saveAs($dir . $fileName);
                    //@todo crop current image

                    $model->tv4_image = $fileName;
                }
            } else {
                $model->tv4_image = $last_image_name32;
            }



            if ($model->validate()) {
                if($model->save()) {
                    
                    \Yii::$app->getSession()->setFlash('admin_flash_message', 'Изменения приняты');
                    return $this->redirect(['index']);
                }
            } else {
                return $this->render('index', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

    
    protected function findModel($id)
    {
        if (($model = Banners::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
