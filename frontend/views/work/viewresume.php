<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
?>
<div class="row">
    <div class="col-md-12 central-content" id="central-content">
        <?= $this->render('/work/_works_header'); ?>
        <div>
            <h1><?= $model->personal_first_name ?> <?= $model->personal_last_name ?>, <?= $model->_getYearsold() ?></h1>
            <div class="row">
                <div class="col-md-3"><img class="img-responsive" src="/uploads/works/<?= $model->_getImage() ?>"></div>
                <div class="col-md-9">
                    <div class="resume-detail-sphere"><?= $model->sphere->name ?><br><?= $model->suggestion_position ?></div>
                    <div class="resume-detail-years"><?= $model->_getYearsold() ?> (<?= $model->personal_birth_day ?>-<?= $model->personal_birth_month ?>-<?= $model->personal_birth_year ?>)</div>
                    <div class="resume-detail-location"><?= $model->location->location; ?></div>
                    <div class="resume-detail-contacts-info">
                        <?php if(!Yii::$app->user->isGuest) { ?>
                        <div><?= $model->contacts_phone; ?></div>
                        <div><?= $model->contacts_email; ?></div>
                        <?php } else { ?>
                            <?= Yii::t('app', 'works.contacts_information_is_available_for_registered_users') ?>
                        <?php } ?>
                    </div>
                    <div class="resume-detail-price"><?= Yii::t('app', 'works.from') ?> <?= number_format($model->suggestion_pay, 0, ',', ' ' ) ?> <?= Yii::t('app', 'works.valute') ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 resume-detail-info">
                    <div>
                        <?= $model->suggestionschedule->name ?>, <?= $model->suggestionemployment->name ?>, <?= $model->_getBuisnessTrip() ?>
                    </div>
                    <hr class="create-separator">
                    <h3><?= Yii::t('app', 'works.affix_experience') ?></h3>
                    <div><b><?= $model->experience_years ?></b></div>
                    <div><?= $model->experience_information ?></div>
                    <hr class="create-separator">
                    <h3><?= Yii::t('app', 'works.affix_education') ?></h3>
                    <?php 
                        $resume_edu = \common\models\ResumeEducation::find()->where(['resume_id' => $model->id])->all(); 
                        if($resume_edu) {
                            foreach($resume_edu as $edu) {
                        ?>
                            <div><b><?= $edu->education_title ?></b> (<?= $edu->education_stage_from ?>-<?= $edu->education_stage_to ?>)</div>
                            <div><?= $edu->education_stage ?></div>
                            <div><?= $edu->education_stage_city ?></div>
                            <div><?= $edu->education_stage_form ?></div>
                        <?php
                            }
                        } else {
                    ?>
                        <?= Yii::t('app', 'works.education_information_is_not_available') ?>
                    <?php
                        }
                    ?>
                    <hr class="create-separator">
                    <h3><?= Yii::t('app', 'works.affix_additional_information') ?></h3>
                    <div><?= $model->personal_qualities; ?></div>
                    <div><b><?= Yii::t('app', 'works.drivers_license') ?>:</b> <?= $model->_getDriverLicense(); ?></div>
                    <div><b><?= Yii::t('app', 'works.languages') ?>:</b> <?= $model->_getLanguages(); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>