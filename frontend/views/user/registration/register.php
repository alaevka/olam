<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\components\Connect;

?>

<?php $form = ActiveForm::begin([
    'id'                     => 'registration-form',
    'enableAjaxValidation'   => true,
    'enableClientValidation' => false,
]); ?>

<?= $form->field($model, 'username') ?>

<?= $form->field($model, 'email', [
        'template' => "{label}{input}{error}<p class=\"help-block-format format\">".Yii::t('app', 'user.format_email_or_phone_help_block')."</p>", 
    ])->textInput() ?>

<?php if ($module->enableGeneratingPassword == false): ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
<?php endif ?>
<br>
<?= Html::submitButton(Yii::t('app', 'user.register_button'), ['class' => 'btn btn-blue']) ?>
<a class="pull-right login-link" href=""><?= Yii::t('app', 'user.login') ?></a>

<p class="terms-of-use">
    <?= Yii::t('app', 'user.terms_of_use_text') ?> <a href=""><?= Yii::t('app', 'user.terms_of_use_link_text') ?></a>
</p>

<hr>
<h4 class="social-login-title"><?= Yii::t('app', 'modal.social_login') ?></h4>
<?= Connect::widget([
    'baseAuthUrl' => ['/user/security/auth'],
]) ?>
<?php ActiveForm::end(); ?>
            
