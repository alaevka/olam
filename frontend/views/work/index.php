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
        <div class="works-header">
            <div class="col-md-3 works-header-block region-block">
                <span><?= Yii::t('app', 'works.region') ?></span><br>
                <div class="dropdown">
                <a class="dropdown-toggle" id="region-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <?php
                        $session = Yii::$app->session;
                        $current_location = isset($session['work_location_name']) ? $session['work_location_name'] : Yii::t('app', 'works.region');
                        echo $current_location;
                    ?>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="region-dropdown">
                    <?= \common\models\Locations::_getLocationsList(); ?>
                </ul>
            </div>
            </div>
            <div class="col-md-3 works-header-block">
                <h3><?= Yii::t('app', 'works.vacancies') ?> <span>count</span></h3>
                <a href=""><?= Yii::t('app', 'works.add_vacancy') ?></a><br>
                <a href=""><?= Yii::t('app', 'works.search_vacancy') ?></a>
            </div>
            <div class="col-md-3 works-header-block">
                <h3><?= Yii::t('app', 'works.resume') ?> <span>count</span></h3>
                <a href=""><?= Yii::t('app', 'works.add_resume') ?></a><br>
                <a href=""><?= Yii::t('app', 'works.search_resume') ?></a>
            </div>
            <div class="col-md-3 works-header-block-for-button">
                <a class="btn btn-blue pull-right" href="<?= Url::to(['/work/create/resume']) ?>"><?= Yii::t('app', 'works.add_resume') ?></a>
            </div>
        </div>
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
