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
                <div role="tabpanel" class="tab-pane active with-padding" id="vacancies">
                    <?php $form = ActiveForm::begin([
                        'id' => 'filter-form-vacancy',
                        'action' => Url::to(['/work/search/vacancy']),
                        'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-sm-12\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>",
                            'labelOptions' => ['class' => 'col-sm-3 control-label'],
                        ],
                    ]); ?>
                    <div class="row">
                        <div class="col-xs-5">
                            <?= $form->field($search_vacancy, 'text_query', ['template' => '{input}'])->textInput(['placeholder' => Yii::t('app', 'works.placeholder_for_text_what_we_search')])->label(false) ?>
                        </div>
                        <div class="col-xs-5">
                            <?= $form->field($search_vacancy, 'suggestion_sphere')->dropDownList(Arrayhelper::map(\common\models\WorkSpheres::find()->asArray()->all(), 'id', 'name'), ['id'=>'suggestion_sphere_id', 'prompt' => Yii::t('app', 'works.select_suggestion_sphere')])->label(false); ?>
                        </div>
                        <div class="col-xs-2">
                            <?= Html::submitButton(Yii::t('app', 'works.search'), ['class' => 'btn btn-green']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <div role="tabpanel" class="tab-pane with-padding" id="resume">
                    <?php $form = ActiveForm::begin([
                        'id' => 'filter-form-resume',
                        'action' => Url::to(['/work/search/resume']),
                        'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-sm-12\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>",
                            'labelOptions' => ['class' => 'col-sm-3 control-label'],
                        ],
                    ]); ?>
                    <div class="row">
                        <div class="col-xs-5">
                            <?= $form->field($search_resume, 'text_query', ['template' => '{input}'])->textInput(['placeholder' => Yii::t('app', 'works.placeholder_for_text_what_we_search')])->label(false) ?>
                        </div>
                        <div class="col-xs-5">
                            <?= $form->field($search_resume, 'suggestion_sphere')->dropDownList(Arrayhelper::map(\common\models\WorkSpheres::find()->asArray()->all(), 'id', 'name'), ['id'=>'suggestion_sphere_id', 'prompt' => Yii::t('app', 'works.select_suggestion_sphere')])->label(false); ?>
                        </div>
                        <div class="col-xs-2">
                            <?= Html::submitButton(Yii::t('app', 'works.search'), ['class' => 'btn btn-green']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="row suggestion_spheres_list">
                <div class="col-xs-6">
                    <ul>
                    <?php 
                        $suggestion_spheres_list = \common\models\WorkSpheres::find()->all();
                        $suggestion_spheres_list_count = count($suggestion_spheres_list);
                        $suggestion_spheres_list_inc_center = $suggestion_spheres_list_count/2;
                        $suggestion_spheres_list_inc = 1;
                        foreach($suggestion_spheres_list as $sphere) {
                    ?>
                        <li><a href="<?= Url::to(['/work/search/vacancy', 'suggestion_sphere' => $sphere->id ]) ?>"><?= $sphere->name ?> <span><?= $sphere->_getCountVacancy() ?></span></a></li>
                    <?php 
                        if($suggestion_spheres_list_inc == round($suggestion_spheres_list_inc_center)) {
                    ?>
                        </ul>
                    </div>
                    <div class="col-xs-6">
                        <ul>
                    <?php        
                        }
                        $suggestion_spheres_list_inc++;
                        }
                    ?>
                    </ul>
                </div>
                
            </div>
            <div class="last_vacancy">
                <h3><?= Yii::t('app', 'works.last_vacancy') ?></h3>
                <?php \yii\widgets\Pjax::begin() ?>
                <?= 
                    ListView::widget([
                        'dataProvider' => $listDataProviderVacancy,
                        'itemView' => '_vacancy_item_for_index',
                        'layout' => $header."{items}<hr><div class=\"col-md-12 pagination-container\">{pager}</div>",
                        'emptyText' => Yii::t('app', 'news.not_yet_been_added_to_this_category_news'),
                        'emptyTextOptions' => ['class' => 'not_yet_been'],
                        'pager' => [
                            'options' => [
                                'class' => 'pagination',
                            ],
                        ]
                    ]); 
                ?>
                <?php \yii\widgets\Pjax::end() ?>
            </div>
            <div class="last_resume">
                <h3><?= Yii::t('app', 'works.last_resume') ?></h3>
                <?php \yii\widgets\Pjax::begin() ?>
                <?= 
                    ListView::widget([
                        'dataProvider' => $listDataProviderResume,
                        'itemView' => '_resume_item',
                        'layout' => $header."{items}<hr><div class=\"col-md-12 pagination-container\">{pager}</div>",
                        'emptyText' => Yii::t('app', 'news.not_yet_been_added_to_this_category_news'),
                        'emptyTextOptions' => ['class' => 'not_yet_been'],
                        'pager' => [
                            'options' => [
                                'class' => 'pagination',
                            ],
                        ]
                    ]); 
                ?>
                <?php \yii\widgets\Pjax::end() ?>
            </div>
        </div>
    </div>
</div>
