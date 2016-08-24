<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\components\LanguageWidget;
use yii\helpers\Url;
use yii\bootstrap\Modal;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container main-container-area">
	<?= $content ?>
</div>

<?php
	Modal::begin ( [
	    'header' => '<h4 class="modal-title" id="registrationModalLabel">'.Yii::t('app', 'modal.registration').'</h4>',
	    'id' => 'registration-modal',
	    'size' => 'modal-width',
	    'closeButton' => ['label' => '✖'],
	    'toggleButton' => [
	        'tag' => 'a',
	        'style' => ['display' => 'none']
	    ]
	] );
	Modal::end ();
?>
<?php
	Modal::begin ( [
	    'header' => '<h4 class="modal-title" id="loginModalLabel">'.Yii::t('app', 'modal.login').'</h4>',
	    'id' => 'login-modal',
	    'size' => 'modal-width',
	    'closeButton' => ['label' => '✖'],
	    'toggleButton' => [
	        'tag' => 'a',
	        'style' => ['display' => 'none']
	    ]
	] );
	Modal::end ();
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
