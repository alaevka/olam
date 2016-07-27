<?php

use frontend\components\Connect;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>


<?php $form = ActiveForm::begin([
    'id'                     => 'login-form',
    'enableAjaxValidation'   => true,
    'enableClientValidation' => false,
    'validateOnBlur'         => false,
    'validateOnType'         => false,
    'validateOnChange'       => false,
]) ?>

<?= $form->field($model, 'login', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']]) ?>

<?= $form->field($model, 'password', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])->passwordInput() ?>

<?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '4']) ?>
<!-- <a class="pull-right" href=""><?= Yii::t('app', 'user.lost_password') ?></a> -->

<?= Html::submitButton(Yii::t('app', 'user.login'), ['class' => 'btn btn-blue', 'tabindex' => '3']) ?>
<a class="pull-right registration-link" href=""><?= Yii::t('app', 'user.register_button') ?></a>

<hr>
<h4 class="social-login-title"><?= Yii::t('app', 'modal.social_login') ?></h4>
<?= Connect::widget([
    'baseAuthUrl' => ['/user/security/auth'],
]) ?>
<?php ActiveForm::end(); ?>