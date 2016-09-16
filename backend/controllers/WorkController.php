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

    public function actionVacancy()
    {
        $searchModel = new \common\models\SearchVacancy;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('vacancy', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionCompanies()
    {
        $searchModel = new \common\models\SearchCompanies;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('companies', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionCreatecompany() {
        $model = new \common\models\Companies;

        if(!Yii::$app->user->isGuest) {
            $model->user_id = Yii::$app->user->identity->id;
        }

        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model, 'company_logo');
            if(!empty($image->name)) {
                $model->company_logo = $image->name;
                $ext = end((explode(".", $image->name)));
                $model->company_logo = Yii::$app->security->generateRandomString().'.'.$ext;
            }

            if(!empty($model->company_spheres)) {
                $model->company_spheres = serialize($model->company_spheres);
            }

            if($model->validate()) {

                if($model->save()) {
                    
                    if(!empty($model->company_logo)) {
                        $image->saveAs(Yii::getAlias('@frontend'). '/web/uploads/companies/' . $model->company_logo);
                    }

                    \Yii::$app->getSession()->setFlash('admin_flash_message', Yii::t('app', 'works.your_company_was_added'));
                    return $this->redirect(['companies']);
                }
            
            }



        }


        return $this->render('createcompany', [
            'model' => $model,
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

                    \Yii::$app->getSession()->setFlash('admin_flash_message', Yii::t('app', 'works.your_resume_was_added'));
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

                    \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция добавлена');
                    return $this->redirect(['resume']);

                }
            }
        }

        return $this->render('updateresume', [
            'model' => $model,
            'modelEducation' => (empty($modelEducation)) ? [new \common\models\ResumeEducation] : $modelEducation
        ]);

    }

    public function actionUpdatecompany($id)
    {
        $model = $this->findModelCompany($id);
        $model->company_spheres != '' ? $model->company_spheres = unserialize($model->company_spheres) : $model->company_spheres = [];
        $company_logo_old = $model->company_logo;
        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model, 'company_logo');
            if(!empty($image->name)) {
                $model->company_logo = $image->name;
                $ext = end((explode(".", $image->name)));
                $model->company_logo = Yii::$app->security->generateRandomString().'.'.$ext;
            } else {
                $model->company_logo = $company_logo_old;
            }

            if(!empty($model->company_spheres)) {
                $model->company_spheres = serialize($model->company_spheres);
            }


            if($model->validate()) {

                if($model->save()) {

                    if($image) {
                        $image->saveAs(Yii::getAlias('@frontend'). '/web/uploads/companies/' . $model->company_logo);
                    }

                    \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция изменена');
                    return $this->redirect(['companies']);

                }
            }
        }

        return $this->render('updatecompany', [
            'model' => $model,
        ]);

    }

    public function actionUpdatevacancy($id)
    {
        $model = $this->findModelVacancy($id);
        $model->suggestion_employment != '' ? $model->suggestion_employment = unserialize($model->suggestion_employment) : $model->suggestion_employment = [];
        $model->experience_tags != '' ? $model->experience_tags = unserialize($model->experience_tags) : $model->experience_tags = [];
       
        if ($model->load(Yii::$app->request->post())) {

            if(!empty($model->suggestion_employment)) {
                $model->suggestion_employment = serialize($model->suggestion_employment);
            }
            if(!empty($model->experience_tags)) {
                $model->experience_tags = serialize($model->experience_tags);
            }


            if($model->validate()) {

                if($model->save()) {

                    \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция изменена');
                    return $this->redirect(['vacancy']);

                }
            }
        }

        return $this->render('updatevacancy', [
            'model' => $model,
        ]);

    }

    public function actionCreatevacancy()
    {
        $model = new \common\models\Vacancy;

        if ($model->load(Yii::$app->request->post())) {

            if(!empty($model->suggestion_employment)) {
                $model->suggestion_employment = serialize($model->suggestion_employment);
            }
            if(!empty($model->experience_tags)) {
                $model->experience_tags = serialize($model->experience_tags);
            }

            if($model->validate()) {

                if($model->save()) {
                    
                    \Yii::$app->getSession()->setFlash('admin_flash_message', Yii::t('app', 'works.your_vacancy_was_added'));
                    return $this->redirect(['vacancy']);

                }
            }
        }

        return $this->render('createvacancy', [
            'model' => $model,
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

    public function actionDeletevacancy($id)
    {
        $model = $this->findModelVacancy($id);    
        $model->delete();
        \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция удалена');
        return $this->redirect(['vacancy']);
    }


    protected function findModelVacancy($id)
    {
        if (($model = \common\models\Vacancy::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDeletecompany($id)
    {
        $model = $this->findModelCompany($id);    
        $model->delete();
        \Yii::$app->getSession()->setFlash('admin_flash_message', 'Позиция удалена');
        return $this->redirect(['companies']);
    }


    protected function findModelCompany($id)
    {
        if (($model = \common\models\Companies::findOne($id)) !== null) {
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

    public function actionDeleteimagecompany()
    {
        if ($post = Yii::$app->request->post()) {
            $resume = \common\models\Companies::findOne($post['key']);
            $resume->company_logo = '';
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
            $r->suggestion_position = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $r->suggestion_sphere = rand(1,8);
            $r->suggestion_pay = $faker->numberBetween($min = 10000, $max = 100000) ;
            $r->suggestion_schedule = rand(2,3);
            $r->suggestion_employment = rand(2,4);
            $r->user_photo = 'tETeHlscEtKQ-OPfmiL0wVsk5aKEx5pu.jpg';
            $r->personal_last_name = $faker->lastName;
            $r->personal_first_name = $faker->firstName;
            $r->personal_sur_name = $faker->firstName;
            $r->personal_birth_day = $faker->dayOfMonth();
            $r->personal_birth_month = $faker->month();
            $r->personal_birth_year = $faker->year();
            $r->is_view_birthday = rand(0,1);
            $r->personal_gender = rand(1,2);
            $r->personal_marital_status = rand(1,2);
            $r->personal_minors = rand(1,2);
            $r->personal_location_city = rand(1,5);
            $r->personal_location_raion = 1;
            $r->experience_years = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $r->experience_information = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            $r->experience_tags = serialize([$faker->word,$faker->word,$faker->word,$faker->word]);
            $r->contacts_email = $faker->email;
            $r->contacts_phone = $faker->e164PhoneNumber;
            $r->user_id = 2;
            $r->suggestions_city = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $r->business_trip = rand(1,2);
            $r->languages = serialize([$faker->word,$faker->word,$faker->word,$faker->word]);
            $r->drivers_license = serialize([1,3,5]);
            $r->smoking = rand(1,2);
            $r->personal_qualities = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            if($r->save()) {
                $b = new \common\models\ResumeEducation;
                $b->education_title = $faker->sentence($nbWords = 6, $variableNbWords = true);
                $b->education_stage = $faker->sentence($nbWords = 6, $variableNbWords = true);
                $b->education_stage_from = $faker->year;
                $b->education_stage_to = $faker->year;
                $b->education_stage_city = $faker->city;
                $b->education_stage_form = $faker->word;
                $b->resume_id = $r->id;
                $b->save();
            } else {
                print_r($r->errors);
            }
        }
    }


    public function actionFakercompany() {
        $faker = Faker\Factory::create();
        $object = 1;
        for ($i=0; $i < 20; $i++) { 
            $r = new \common\models\Companies;
            $r->company_type = rand(1,2);
            $r->user_fio = $faker->name;
            $r->user_position = $faker->jobTitle;
            $r->phones = $faker->e164PhoneNumber.', '.$faker->e164PhoneNumber;
            $r->company_name = $faker->company;
            $r->company_legal_name = $faker->catchPhrase;
            $r->company_description = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            $r->company_spheres = serialize([1,3,5]);
            $r->company_size = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $r->company_site = $faker->domainName;
            $r->company_email = $faker->email;
            $r->company_logo = 'Rva1SSu7xDTlwwju523MEmgZKd_J97lJ.jpg';
            $r->contact_city = $faker->city;
            $r->contact_address_street = $faker->streetName;
            $r->contact_address_house = $faker->buildingNumber;
            $r->contact_address_additional = $faker->secondaryAddress;
            $r->contact_phones = $faker->e164PhoneNumber.', '.$faker->e164PhoneNumber;;
            $r->user_id = 2;
            if($r->save()) {

            } else {
                print_r($r->errors);
            }
        }
    }

    public function actionFakervacancy() {
        $faker = Faker\Factory::create();
        $object = 1;
        for ($i=0; $i < 100; $i++) { 
            $r = new \common\models\Vacancy;
            $r->company_id = rand(7,25);
            $r->title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $r->vacancy_description = $faker->paragraph($nbSentences = 3, $variableNbSentences = true).$faker->paragraph($nbSentences = 3, $variableNbSentences = true).$faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            $r->duties = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            $r->requirements = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            $r->conditions = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            $r->wage_level = $faker->numberBetween($min = 10000, $max = 100000);
            $r->experience_years = rand(0,5).' years';
            $r->experience_tags = serialize([$faker->word,$faker->word,$faker->word,$faker->word]);
            $r->suggestion_employment = serialize([rand(2,4), rand(2,4)]);
            $r->user_id = 2;
            if($r->save()) {

            } else {
                print_r($r->errors);
            }
        }

    }


}