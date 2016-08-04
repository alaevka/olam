<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use frontend\components\NewsLeftMenuWidget;
use romi45\seoContent\components\SeoContentHelper;
SeoContentHelper::registerAll($news_category);
?>

<div class="row">
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <?= NewsLeftMenuWidget::widget() ?>
            </div>
        </div>
    </div>
    <div class="col-md-9 central-content">
        <h1><?= $news_category->title; ?></h1>
    </div>
</div>

