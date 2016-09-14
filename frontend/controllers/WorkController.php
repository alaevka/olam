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
                'only' => ['createresume'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['createresume'],
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
}