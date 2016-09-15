<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\web\View;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<div class="row">
    <div class="col-md-12 central-content" id="central-content">
        <?= $this->render('/work/_works_header'); ?>
        <div>
            <h1><?= Yii::t('app', 'work.work_in') ?> <?= $current_location; ?></h1>
            <ul class="nav nav-tabs filter-tabs-work">
              <li role="presentation" class="active"><a href="#vacancies" role="tab" data-toggle="tab"><?= Yii::t('app', 'works.vacancies') ?></a></li>
              <li role="presentation"><a href="#resume" role="tab" data-toggle="tab"><?= Yii::t('app', 'works.resume') ?></a></li>
            </ul>
            <div class="tab-content filter-content-work">
                <div role="tabpanel" class="tab-pane active" id="vacancies">
                    <div class="row">
                        <div class="col-xs-12">test<br>testtest<br>test</div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="resume">
                    <div class="row">
                        <div class="col-xs-12">test<br>testtest<br>test</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
