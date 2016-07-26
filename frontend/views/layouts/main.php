<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\components\LanguageWidget;
use yii\helpers\Url;

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
	<?= LanguageWidget::widget() ?>
	<a href="<?= Url::to(['/user/registration/register']); ?>"><?= Yii::t('app', 'register') ?></a>
	<a href="<?= Url::to(['/user/security/login']); ?>"><?= Yii::t('app', 'login') ?></a>
	<a data-method="post" href="<?= Url::to(['/user/security/logout']); ?>"><?= Yii::t('app', 'logout') ?></a>
        <?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
