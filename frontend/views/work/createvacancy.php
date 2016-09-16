<?php
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\helpers\Url;
	use kartik\file\FileInput;
	use kartik\depdrop\DepDrop;
	use yii\helpers\ArrayHelper;
	use kartik\select2\Select2;
	use wbraganca\dynamicform\DynamicFormWidget;
	
	$this->title = Yii::t('app', 'works.create_vacancy');
?>

<div class="row">
    <div class="col-md-12 central-content" id="central-content">
    	<?= $this->render('/work/_works_header'); ?>
        <h1><?= Yii::t('app', 'works.create_vacancy') ?></h1>
    </div>
	
	<div class="col-md-9">

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
			    'data' => $model->experience_tags,
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

		<div>
			<?= Yii::t('app', 'works.you_must_agree_with_terms') ?> <a href=""><?= Yii::t('app', 'user.terms_of_use_link_text') ?></a>
		</div>

		<div class="submit-button">
			<?= Html::submitButton(Yii::t('app', 'works.add_button'), ['class' => 'btn btn-blue']) ?>
		</div>

		<?php ActiveForm::end(); ?>
	</div>
	<div class="col-md-3">
		<nav class="bs-docs-sidebar hidden-print hidden-sm hidden-xs affix" > 
			<ul class="nav bs-docs-sidenav"> 
				<li class=""><a href="#affix_company_information"><?= Yii::t('app', 'works.affix_company_information') ?></a><li>
				<li class=""><a href="#affix_info_about_vacancy"><?= Yii::t('app', 'works.affix_info_about_vacancy') ?></a><li>

			</li>
		</nav>
	</div>
	
</div>