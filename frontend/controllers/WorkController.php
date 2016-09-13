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

        return $this->render('createresume', [
            'model' => $model
        ]);
    }
}