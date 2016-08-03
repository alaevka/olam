<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'My Yii Application';
?>
admin main page

<a data-method="post" href="<?= Url::to(['/user/security/logout']); ?>"><?= Yii::t('app', 'logout') ?></a>