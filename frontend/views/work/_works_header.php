<?php
    use yii\helpers\Url;
?>
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
        <h3><?= Yii::t('app', 'works.vacancies') ?> <span><?= \common\models\Vacancy::_getCount(); ?></span></h3>
        <a href="<?= Url::to(['/work/view/companies']) ?>"><?= Yii::t('app', 'works.your_companies') ?></a><br>
        <a href="<?= Url::to(['/work/create/vacancy']) ?>"><?= Yii::t('app', 'works.add_vacancy') ?></a><br>
        <a href="<?= Url::to(['/work/search/vacancy']) ?>"><?= Yii::t('app', 'works.search_vacancy') ?></a>

    </div>
    <div class="col-md-3 works-header-block">
        <h3><?= Yii::t('app', 'works.resume') ?> <span><?= \common\models\Resume::_getCount(); ?></span></h3>
        <a href="<?= Url::to(['/work/create/resume']) ?>"><?= Yii::t('app', 'works.add_resume') ?></a><br>
        <a href="<?= Url::to(['/work/search/resume']) ?>"><?= Yii::t('app', 'works.search_resume') ?></a>
    </div>
    <div class="col-md-3 works-header-block-for-button">
        <!-- <a class="btn btn-blue pull-right" href="<?= Url::to(['/work/create/resume']) ?>"><?= Yii::t('app', 'works.add_resume') ?></a> -->
    </div>
</div>