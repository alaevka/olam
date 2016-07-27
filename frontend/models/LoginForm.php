<?php
namespace frontend\models;

use Yii;
use dektrium\user\models\LoginForm as BaseLoginForm;

class LoginForm extends BaseLoginForm
{
    public function attributeLabels()
    {
        return [
            'login'      => Yii::t('app', 'user.email_or_phone'),
            'password'   => Yii::t('user', 'user.password'),
            'rememberMe' => Yii::t('user', 'user.remember_me_next_time'),
        ];
    }
}