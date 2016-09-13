<?php
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\helpers\Url;
	use kartik\file\FileInput;
	use kartik\depdrop\DepDrop;
	use yii\helpers\ArrayHelper;
	
	$this->title = Yii::t('app', 'works.create_resume');
?>

<div class="row">
    <div class="col-md-12 central-content" id="central-content">
        <h1><?= Yii::t('app', 'works.create_resume') ?></h1>
    </div>
	
	<div class="col-md-9">

		<?php $form = ActiveForm::begin([
		    'id' => 'create-resume-form',
		    'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
		    'fieldConfig' => [
        		'template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>",
        		'labelOptions' => ['class' => 'col-sm-3 control-label'],
        	],
		]); ?>

		<?php echo $form->errorSummary($model); ?>

		<div id="affix_suggestions">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'works.affix_suggestions') ?></h3>

		</div>

		<div id="affix_personal_information">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'works.affix_personal_information') ?></h3>

		</div>

		<div id="affix_contacts_information">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'works.affix_contacts_information') ?></h3>

		</div>

		<div id="affix_experience">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'works.affix_experience') ?></h3>

		</div>

		<div id="affix_education">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'works.affix_education') ?></h3>

		</div>

		<div id="affix_suggestions_city">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'works.affix_suggestions_city') ?></h3>

		</div>

		<div id="affix_additional_information">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'works.affix_additional_information') ?></h3>

		</div>

		

		<div class="submit-button">
			<?= Html::submitButton(Yii::t('app', 'works.add_button'), ['class' => 'btn btn-blue']) ?>
		</div>

		<?php ActiveForm::end(); ?>
	</div>
	<div class="col-md-3">
		<nav class="bs-docs-sidebar hidden-print hidden-sm hidden-xs affix" > 
			<ul class="nav bs-docs-sidenav"> 
				<li class=""><a href="#affix_suggestions"><?= Yii::t('app', 'works.affix_suggestions') ?></a><li>
				<li class=""><a href="#affix_personal_information"><?= Yii::t('app', 'works.affix_personal_information') ?></a><li>
				<li class=""><a href="#affix_contacts_information"><?= Yii::t('app', 'works.affix_contacts_information') ?></a><li>
				<li class=""><a href="#affix_experience"><?= Yii::t('app', 'works.affix_experience') ?></a><li>
				<li class=""><a href="#affix_education"><?= Yii::t('app', 'works.affix_education') ?></a><li>
				<li class=""><a href="#affix_suggestions_city"><?= Yii::t('app', 'works.affix_suggestions_city') ?></a><li>
				<li class=""><a href="#affix_additional_information"><?= Yii::t('app', 'works.affix_additional_information') ?></a><li>
			</li>
		</nav>
	</div>
	
</div>
