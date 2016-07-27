<?php
namespace frontend\models;

use Yii;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;

class RegistrationForm extends BaseRegistrationForm
{
    public function attributeLabels()
    {
        return [
            'email'    => Yii::t('app', 'user.email_or_phone'),
            'username' => Yii::t('app', 'user.username'),
            'password' => Yii::t('app', 'user.password'),
        ];
    }
}