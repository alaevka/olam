<?php
namespace frontend\controllers;


use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class WorkController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['createresume', 'createvacancy', 'createcompany'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['createresume', 'createvacancy', 'createcompany'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    public function actionIndex()
    {

        return $this->render('index', [
            
        ]);
    }

    public function actionLocation($id)
    {
        $session = Yii::$app->session;
        
        $location = \common\models\Locations::findOne($id);
        $session->set('work_location_id', $id);
        $session->set('work_location_name', $location->location);

        return $this->redirect(Yii::$app->request->referrer);
                
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

                    if(!empty($model->user_photo)) {
                        $image->saveAs('uploads/works/' . $model->user_photo);
                    }

                    \Yii::$app->getSession()->setFlash('flash_message', Yii::t('app', 'works.your_resume_was_added'));
                    return $this->redirect(['index']);

                }
            }
        }

        return $this->render('createresume', [
            'model' => $model,
            'modelEducation' => (empty($modelEducation)) ? [new \common\models\ResumeEducation] : $modelEducation
        ]);
    }



    public function actionSearchresume() {

        $search = new \common\models\SearchResume;
        $dataProvider = $search->search(Yii::$app->request->post());

        return $this->render('searchresume', [
            'search' => $search,
            'listDataProvider' => $dataProvider,
        ]);
    }

    public function actionViewresume($id) {
        $model = $this->findModelResume($id);

        return $this->render('viewresume', [
            'model' => $model,
        ]);
    }

    protected function findModelResume($id)
    {
        if (($model = \common\models\Resume::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreatevacancy()
    {
        $user_companies = \common\models\Companies::find()->where(['user_id' => Yii::$app->user->id])->all();
        if($user_companies) {
            $model = new \common\models\Vacancy;

            if ($model->load(Yii::$app->request->post())) {

                if(!empty($model->suggestion_employment)) {
                    $model->suggestion_employment = serialize($model->suggestion_employment);
                }

                if($model->validate()) {

                    if($model->save()) {
                        
                        \Yii::$app->getSession()->setFlash('flash_message', Yii::t('app', 'works.your_vacancy_was_added'));
                        return $this->redirect(['index']);

                    }
                }
            }

            return $this->render('createvacancy', [
                'model' => $model,
            ]);
        } else {
            \Yii::$app->getSession()->setFlash('flash_message', Yii::t('app', 'works.your_must_add_company_before_post_vacancy'));
            return $this->redirect(['createcompany']);
        }

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
                        $image->saveAs('uploads/companies/' . $model->company_logo);
                    }

                    \Yii::$app->getSession()->setFlash('flash_message', Yii::t('app', 'works.your_company_was_added'));
                    return $this->redirect(['companies']);
                }
            
            }



        }


        return $this->render('createcompany', [
            'model' => $model,
        ]);
    }

    public function actionCompanies()
    {
        $search = new \common\models\SearchCompanies;
        $dataProvider = $search->search(Yii::$app->request->post());

        return $this->render('companies', [
            'user_companies' => $user_companies,
            'listDataProvider' => $dataProvider,
        ]);

    }

    public function actionDeletecompany($id)
    {
        $model = $this->findModelCompany($id);    
        $model->delete();
        \Yii::$app->getSession()->setFlash('flash_message', Yii::t('app', 'works.your_company_removed'));
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

   
}