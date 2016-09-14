<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use Faker;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

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

    public function actionCreateresume()
    {

        $model = new \common\models\Resume;
        $modelEducation = [new \common\models\ResumeEducation];

        if(!Yii::$app->user->isGuest) {
            $model->contacts_email = Yii::$app->user->identity->email;
            $model->user_id = Yii::$app->user->identity->id;
        }

        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model, 'user_photo');
            if(!empty($image->name)) {
                $model->user_photo = $image->name;
                $ext = end((explode(".", $image->name)));
                $model->user_photo = Yii::$app->security->generateRandomString().'.'.$ext;
            }

            $modelEducation = \common\models\Model::createMultiple(\common\models\ResumeEducation::classname());
            \common\models\Model::loadMultiple($modelEducation, Yii::$app->request->post());

            //$validate = Model::validateMultiple($modelEducation) && $model->validate();



            if($model->is_view_birthday[0] == 1) {
                $model->is_view_birthday = 1;
            }


            if(!empty($model->experience_tags)) {
                $model->experience_tags = serialize($model->experience_tags);
            }
            if(!empty($model->languages)) {
                $model->languages = serialize($model->languages);
            }
            if(!empty($model->drivers_license)) {
                $model->drivers_license = serialize($model->drivers_license);
            }

            if(!empty($model->new_location_raion)) {
                //create new raion
                $location_raion = new \common\models\LocationsRaion;
                $location_raion->raion = $model->new_location_raion;
                $location_raion->location_id = $model->personal_location_city;
                $location_raion->save();
                $model->personal_location_raion = $location_raion->id;
            }




            if($model->validate() && \common\models\Model::validateMultiple($modelEducation)) {

                if($model->save()) {
                    
                    if(!empty($modelEducation[0]['education_title'])) {
                        foreach ($modelEducation as $model_edu) {
                            $model_edu->resume_id = $model->id;
                            $model_edu->save(false);
                        }
                    }

                    if(!empty($image->name)) {
                        $image->saveAs(Yii::getAlias('@frontend'). '/web/uploads/works/' . $model->user_photo);
                    }

                    \Yii::$app->getSession()->setFlash('flash_message', Yii::t('app', 'works.your_resume_was_added'));
                    return $this->redirect(['resume']);

                }
            }
        }

        return $this->render('createresume', [
            'model' => $model,
            'modelEducation' => (empty($modelEducation)) ? [new \common\models\ResumeEducation] : $modelEducation
        ]);
    }

    public function actionUpdateresume($id)
    {
        $model = $this->findModelResume($id);
        $modelEducation = \common\models\ResumeEducation::find()->where(['resume_id' => $id])->all();

        $model->experience_tags != '' ? $model->experience_tags = unserialize($model->experience_tags) : $model->experience_tags = [];
        $model->languages != '' ? $model->languages = unserialize($model->languages) : $model->languages = [];
        $model->drivers_license != '' ? $model->drivers_license = unserialize($model->drivers_license) : $model->drivers_license = [];

        $old_user_photo = $model->user_photo;
        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model, 'user_photo');
            if(!empty($image->name)) {
                $model->user_photo = $image->name;
                $ext = end((explode(".", $image->name)));
                $model->user_photo = Yii::$app->security->generateRandomString().'.'.$ext;
            } else {
                $model->user_photo = $old_user_photo;
            }

            $oldIDs = ArrayHelper::map($modelEducation, 'id', 'id');
            $modelEducation = \common\models\Model::createMultiple(\common\models\ResumeEducation::classname());
            \common\models\Model::loadMultiple($modelEducation, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelEducation, 'id', 'id')));

            //$validate = Model::validateMultiple($modelEducation) && $model->validate();



            if($model->is_view_birthday[0] == 1) {
                $model->is_view_birthday = 1;
            }


            if(!empty($model->experience_tags)) {
                $model->experience_tags = serialize($model->experience_tags);
            }
            if(!empty($model->languages)) {
                $model->languages = serialize($model->languages);
            }
            if(!empty($model->drivers_license)) {
                $model->drivers_license = serialize($model->drivers_license);
            }

            if(!empty($model->new_location_raion)) {
                //create new raion
                $location_raion = new \common\models\LocationsRaion;
                $location_raion->raion = $model->new_location_raion;
                $location_raion->location_id = $model->personal_location_city;
                $location_raion->save();
                $model->personal_location_raion = $location_raion->id;
            }




            if($model->validate() && \common\models\Model::validateMultiple($modelEducation)) {

                if($model->save()) {

                    if (! empty($deletedIDs)) {
                        \common\models\ResumeEducation::deleteAll(['id' => $deletedIDs]);
                    }
                    
                    if(!empty($modelEducation[0]['education_title'])) {
                        foreach ($modelEducation as $model_edu) {
                            $model_edu->resume_id = $model->id;
                            $model_edu->save(false);
                        }
                    }

                    if($image) {
                        $image->saveAs(Yii::getAlias('@frontend'). '/web/uploads/works/' . $model->user_photo);
                    }

                    \Yii::$app->getSession()->setFlash('flash_message', Yii::t('app', 'works.your_resume_was_added'));
                    return $this->redirect(['resume']);

                }
            }
        }

        return $this->render('updateresume', [
            'model' => $model,
            'modelEducation' => (empty($modelEducation)) ? [new \common\models\ResumeEducation] : $modelEducation
        ]);

    }

    public function actionDeleteresume($id)
    {
        $model = $this->findModelResume($id);    
        $model->delete();
        \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция удалена');
        return $this->redirect(['resume']);
    }


    protected function findModelResume($id)
    {
        if (($model = \common\models\Resume::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDeleteimageresume()
    {
        if ($post = Yii::$app->request->post()) {
            $resume = \common\models\Resume::findOne($post['key']);
            $resume->user_photo = '';
            $resume->save();
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return Json::encode([]);
        }
    }

    public function actionFakerresume() {
        $faker = Faker\Factory::create();
        $object = 1;
        for ($i=0; $i < 100; $i++) { 
            $r = new \common\models\Resume;
            $r->suggestion_position = '';
            $r->suggestion_sphere = '';
            $r->suggestion_pay = '';
            $r->suggestion_schedule = '';
            $r->suggestion_employment = '';
            $r->user_photo = 'tETeHlscEtKQ-OPfmiL0wVsk5aKEx5pu.jpg';
            $r->personal_last_name = '';
            $r->personal_first_name = '';
            $r->personal_sur_name = '';
            $r->personal_birth_day = '';
            $r->personal_birth_month = '';
            $r->personal_birth_year = '';
            $r->is_view_birthday = '';
            $r->personal_gender = '';
            $r->personal_marital_status = '';
            $r->personal_minors = '';
            $r->personal_location_city = '';
            $r->personal_location_raion = '';
            $r->experience_years = '';
            $r->experience_information = '';
            $r->experience_tags = '';
            $r->contacts_email = '';
            $r->contacts_phone = '';
            $r->user_id = '';
            $r->suggestions_city = '';
            $r->business_trip = '';
            $r->languages = '';
            $r->drivers_license = '';
            $r->smoking = '';
            $r->personal_qualities = '';
        }
    }


}