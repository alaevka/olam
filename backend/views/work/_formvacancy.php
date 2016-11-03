<?php
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\helpers\ArrayHelper;
	use kartik\select2\Select2;
?>

<?php $form = ActiveForm::begin([
    'id' => 'create-vacancy-form',
    'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
    'fieldConfig' => [
		'template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>",
		'labelOptions' => ['class' => 'col-sm-3 control-label'],
	],
]); ?>

<?php echo $form->errorSummary($model); ?>

<div id="affix_company_information">
	<hr class="create-separator">
	<h3><?= Yii::t('app', 'works.affix_company_information') ?></h3>
	<?= $form->field($model, 'company_id')->dropDownList(Arrayhelper::map(\common\models\Companies::find()->where(['user_id' => Yii::$app->user->id])->orderBy('company_name')->asArray()->all(), 'id', 'company_name'), ['id'=>'company_id', 'prompt' => Yii::t('app', 'works.select_company')]); ?>
</div>

<div id="affix_info_about_vacancy">
	<hr class="create-separator">
	<h3><?= Yii::t('app', 'works.affix_info_about_vacancy') ?></h3>
	
	<?= $form->field($model, 'title')->textInput() ?>

	<?= $form->field($model, 'vacancy_description')->textArea(['rows' => 7]) ?>

	<?= $form->field($model, 'wage_level')->textInput() ?>

	<?= $form->field($model, 'experience_years')->textInput() ?>

	<?= $form->field($model, 'experience_tags', ['template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>\n<div class=\"col-sm-offset-3 col-sm-6 help-block-currency\">".Yii::t('app', 'works.you_can_add_new_tags_by_pressing_enter_key')."</div>"])->widget(Select2::classname(), [
	    'value' => $model->experience_tags,
	    'maintainOrder' => true,
	    'options' => ['placeholder' => Yii::t('app', 'works.select_or_add_your_main_tags'), 'multiple' => true],
	    'pluginOptions' => [
	        'tags' => true,
	        'maximumInputLength' => 100
	    ],
	]); ?>

	<?= $form->field($model, 'duties')->textArea(['rows' => 7]) ?>

	<?= $form->field($model, 'requirements')->textArea(['rows' => 7]) ?>

	<?= $form->field($model, 'conditions')->textArea(['rows' => 7]) ?>

	<?= $form->field($model, 'suggestion_employment')->checkboxList(
			Arrayhelper::map(\common\models\WorkEmployment::find()->asArray()->all(), 'id', 'name'),
			[
                'item' => function($index, $label, $name, $checked, $value) {

                    $return = '<div class="checkbox checkbox-primary">';
                    if($checked) {
                    	$return .= '<input checked id="suggestion_employment'.$index.'" type="checkbox" class="styled" name="' . $name . '" value="' . $value . '">';
                    } else {
                    	$return .= '<input id="suggestion_employment'.$index.'" type="checkbox" class="styled" name="' . $name . '" value="' . $value . '">';
                    }
                    $return .= '<label for="suggestion_employment'.$index.'">'. ucwords($label) .'</label>';
                    $return .= '</div>';

                    return $return;
                }
            ]

		) ?>

</div>

<div class="col-sm-offset-3 col-sm-5" style="padding-top: 20px;">
    <?= $form->field($model, 'is_active', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->checkbox() ?>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => 'btn btn-success']) ?><br>
    </div>
</div>	

<?php ActiveForm::end(); ?>