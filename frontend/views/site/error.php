<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use frontend\components\NewsLeftMenuWidget;
$this->title = $name;
?>

<div class="row">
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <?= NewsLeftMenuWidget::widget() ?>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <h1><?= Html::encode($this->title) ?></h1>
        <div>
            <?= nl2br(Html::encode($message)) ?>
        </div>
    </div>
</div>

