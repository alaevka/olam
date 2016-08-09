<?php
namespace frontend\controllers\user;

use dektrium\user\controllers\RegistrationController as BaseRegistrationController;
use Yii;
use yii\web\NotFoundHttpException;
use frontend\models\RegistrationForm;

class RegistrationController extends BaseRegistrationController
{
   	public function actionRegister()
    {
        if (!$this->module->enableRegistration) {
            throw new NotFoundHttpException();
        }

        /** @var RegistrationForm $model */
        $model = Yii::createObject(RegistrationForm::className());
        $event = $this->getFormEvent($model);

        $this->trigger(self::EVENT_BEFORE_REGISTER, $event);

        $this->performAjaxValidation($model);

        if ($model->load(Yii::$app->request->post()) && $model->register()) {

            $this->trigger(self::EVENT_AFTER_REGISTER, $event);

            return $this->render('/message', [
                'title'  => Yii::t('user', 'Your account has been created'),
                'module' => $this->module,
            ]);
        }

        return $this->renderAjax('register', [
            'model'  => $model,
            'module' => $this->module,
        ]);
    }
}