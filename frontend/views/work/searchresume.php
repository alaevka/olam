<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\helpers\ArrayHelper;
    use yii\widgets\ListView;
?>

<div class="row">
    <div class="col-md-12 central-content" id="central-content">
        <?= $this->render('/work/_works_header'); ?>
        <div>
            <h1><?= Yii::t('app', 'works.detailed_resume_search') ?></h1>
            <?php $form = ActiveForm::begin([
                'id' => 'filter-form-resume',
                'action' => Url::to(['/work/search/resume']),
                'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>",
                    'labelOptions' => ['class' => 'col-sm-3 control-label'],
                ],
            ]); ?>
            <div class="tab-content filter-content-work left-corner-filter">
                <div role="tabpanel" class="tab-pane active" id="resume">
                    
                    <div class="row">
                        <div class="col-xs-10">
                            <?= $form->field($search, 'text_query', ['template' => '{input}'])->textInput(['placeholder' => Yii::t('app', 'works.placeholder_for_text_what_we_search')])->label(false) ?>
                        </div>
                        <div class="col-xs-2">
                            <?= Html::submitButton(Yii::t('app', 'works.search'), ['class' => 'btn btn-green']) ?>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row detailed-search">
                <div class="col-md-12">
                <?= $form->field($search, 'suggestion_pay', ['template' => "{label}\n<div class=\"col-sm-1 works-input-text\">".Yii::t('app', 'works.from')."</div><div class=\"col-sm-3\">{input}</div><div class=\"col-sm-2 works-input-text\">".Yii::t('app', 'works.valute')."</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->textInput() ?>
                <?= $form->field($search, 'suggestion_sphere')->dropDownList(Arrayhelper::map(\common\models\WorkSpheres::find()->asArray()->all(), 'id', 'name'), ['id'=>'suggestion_sphere_id', 'prompt' => Yii::t('app', 'works.select_suggestion_sphere')]); ?>
                <?= $form->field($search, 'suggestion_schedule')->dropDownList(Arrayhelper::map(\common\models\WorkSchedule::find()->asArray()->all(), 'id', 'name'), ['id'=>'suggestion_schedule_id', 'prompt' => Yii::t('app', 'works.select_suggestion_schedule')]); ?>

                <?= $form->field($search, 'suggestion_employment')->dropDownList(Arrayhelper::map(\common\models\WorkEmployment::find()->asArray()->all(), 'id', 'name'), ['id'=>'suggestion_employment_id', 'prompt' => Yii::t('app', 'works.select_suggestion_employment')]); ?>

                <?= $form->field($search, 'personal_gender', ['template' => '{label}<div class="col-sm-9">{input}</div>'])->radioList(
                    ['1' => Yii::t('app', 'works.male'), '2' => Yii::t('app', 'works.female')],
                    [
                        'item' => function($index, $label, $name, $checked, $value) {

                            $return = '<div class="radio radio-primary radio-inline">';
                            if($checked) {
                                $return .= '<input checked id="personal_gender'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                            } else {
                                $return .= '<input id="personal_gender'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                            }
                            $return .= '<label for="personal_gender'.$index.'">'. ucwords($label) .'</label>';
                            $return .= '</div>';

                            return $return;
                        }
                    ]

                ) ?>

                <?= $form->field($search, 'personal_marital_status', ['template' => '{label}<div class="col-sm-9">{input}</div>'])->radioList(
                    ['1' => Yii::t('app', 'works.not_married'), '2' => Yii::t('app', 'works.married')],
                    [
                        'item' => function($index, $label, $name, $checked, $value) {

                            $return = '<div class="radio radio-primary radio-inline">';
                            if($checked) {
                                $return .= '<input checked id="personal_marital_status'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                            } else {
                                $return .= '<input id="personal_marital_status'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                            }
                            $return .= '<label for="personal_marital_status'.$index.'">'. ucwords($label) .'</label>';
                            $return .= '</div>';

                            return $return;
                        }
                    ]

                ) ?>
                <?= $form->field($search, 'business_trip', ['template' => '{label}<div class="col-sm-9">{input}</div>'])->radioList(
                    ['1' => Yii::t('app', 'works.business_trip_yes'), '2' => Yii::t('app', 'works.business_trip_no')],
                    [
                        'item' => function($index, $label, $name, $checked, $value) {

                            $return = '<div class="radio radio-primary radio-inline">';
                            if($checked) {
                                $return .= '<input checked id="business_trip'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                            } else {
                                $return .= '<input id="business_trip'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                            }
                            $return .= '<label for="business_trip'.$index.'">'. ucwords($label) .'</label>';
                            $return .= '</div>';

                            return $return;
                        }
                    ]

                ) ?>
                </div>
                <div class="col-md-12 work-search-button-block">
                    <?= Html::submitButton(Yii::t('app', 'works.search_resume'), ['class' => 'btn btn-green']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
            <div class="list-resume">
                <h1><?= Yii::t('app', 'works.resume_search_results') ?></h1>
                <?php \yii\widgets\Pjax::begin() ?>
                <?= 
                    ListView::widget([
                        'dataProvider' => $listDataProvider,
                        'itemView' => '_resume_item',
                        'layout' => "{items}<hr><div class=\"col-md-12 pagination-container\">{pager}</div>",
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