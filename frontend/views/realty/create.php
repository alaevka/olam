<?php
	use yii\widgets\ActiveForm;
	$this->context->layout = 'empty';
?>

<div class="row">
    <div class="col-md-12 central-content" id="central-content">
        <h1><?= Yii::t('app', 'rlty.create_add') ?></h1>
    </div>
	
	<div class="col-md-9">

		<?php $form = ActiveForm::begin([
		    'id' => 'create-ads-form',
		    'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
		    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>",
        'labelOptions' => ['class' => 'col-sm-3 control-label'],
        ],
		    'enableAjaxValidation'   => true,
		    'enableClientValidation' => false,
		]); ?>

		<div class="btn-group btn-group-width-100" data-toggle="buttons">
		   	<label class="btn btn16 btn-blue-light">
		      	<input type="radio" name="rlty_type" id="rlty_type1"><?= Yii::t('app', 'rlty.type_for_living') ?>
		   	</label>
		   	<label class="btn btn16 btn-blue-light">
	            <input type="radio" name="rlty_type" id="rlty_type2"><?= Yii::t('app', 'rlty.type_for_rent') ?>
		    </label>
		    <label class="btn btn16 btn-blue-light">
		        <input type="radio" name="rlty_type" id="rlty_type3"><?= Yii::t('app', 'rlty.type_commercial') ?>
		   	</label>
		   	<label class="btn btn16 btn-blue-light">
		        <input type="radio" name="rlty_type" id="rlty_type4"><?= Yii::t('app', 'rlty.type_houses_cottages') ?>
		   	</label>
		   	<label class="btn btn16 btn-blue-light">
		        <input type="radio" name="rlty_type" id="rlty_type5"><?= Yii::t('app', 'rlty.type_garages') ?>
		   	</label>
		   	<label class="btn btn16 btn-blue-light">
		        <input type="radio" name="rlty_type" id="rlty_type6"><?= Yii::t('app', 'rlty.type_land') ?>
		   	</label>
		</div>

		<div class="btn-group btn-group-width-100" data-toggle="buttons">
		   	<label class="btn btn25 btn-blue-light">
		      	<input type="radio" name="rlty_action" id="rlty_action1"><?= Yii::t('app', 'rlty.action_sell') ?>
		   	</label>
		   	<label class="btn btn25 btn-blue-light">
	            <input type="radio" name="rlty_action" id="rlty_action2"><?= Yii::t('app', 'rlty.action_buy') ?>
		    </label>
		    <label class="btn btn25 btn-blue-light">
		        <input type="radio" name="rlty_action" id="rlty_action3"><?= Yii::t('app', 'rlty.action_pass') ?>
		   	</label>
		   	<label class="btn btn25 btn-blue-light">
		        <input type="radio" name="rlty_action" id="rlty_action4"><?= Yii::t('app', 'rlty.action_shoot') ?>
		   	</label>
		</div>

		<hr class="create-separator">
		<a name="affix_location"></a>
		<h3><?= Yii::t('app', 'rlty.affix_location') ?> <span><?= Yii::t('app', 'rlty.step_1_of_7') ?></span></h3>

		<?= $form->field($model, 'location_city')->dropDownList($locations) ?>

		<?= $form->field($model, 'location_street')->textInput() ?>

		<?= $form->field($model, 'location_house')->textInput() ?>

		<?= $form->field($model, 'location_raion')->textInput() ?>

		<hr class="create-separator">
		<a name="affix_info_about_apartment"></a>
		<h3><?= Yii::t('app', 'rlty.affix_info_about_apartment') ?> <span><?= Yii::t('app', 'rlty.step_2_of_7') ?></span></h3>

		<hr class="create-separator">
		<a name="affix_price_and_conditions"></a>
		<h3><?= Yii::t('app', 'rlty.affix_price_and_conditions') ?> <span><?= Yii::t('app', 'rlty.step_3_of_7') ?></span></h3>

		<hr class="create-separator">
		<a name="affix_info_about_house"></a>
		<h3><?= Yii::t('app', 'rlty.affix_info_about_house') ?> <span><?= Yii::t('app', 'rlty.step_4_of_7') ?></span></h3>

		<hr class="create-separator">
		<a name="affix_photo_and_video"></a>
		<h3><?= Yii::t('app', 'rlty.affix_photo_and_video') ?> <span><?= Yii::t('app', 'rlty.step_5_of_7') ?></span></h3>

		<hr class="create-separator">
		<a name="affix_additional_info"></a>
		<h3><?= Yii::t('app', 'rlty.affix_additional_info') ?> <span><?= Yii::t('app', 'rlty.step_6_of_7') ?></span></h3>

		<hr class="create-separator">
		<a name="affix_contacts"></a>
		<h3><?= Yii::t('app', 'rlty.affix_contacts') ?> <span><?= Yii::t('app', 'rlty.step_7_of_7') ?></span></h3>		
		
		
		

		<?php ActiveForm::end(); ?>
	</div>
	<div class="col-md-3">
		<nav class="bs-docs-sidebar hidden-print hidden-sm hidden-xs affix"> 
			<ul class="nav bs-docs-sidenav"> 
				<li class=""><a href="#affix_location"><?= Yii::t('app', 'rlty.affix_location') ?></a><li>
				<li class=""><a href="#affix_info_about_apartment"><?= Yii::t('app', 'rlty.affix_info_about_apartment') ?></a><li>
				<li class=""><a href="#affix_price_and_conditions"><?= Yii::t('app', 'rlty.affix_price_and_conditions') ?></a><li>
				<li class=""><a href="#affix_info_about_house"><?= Yii::t('app', 'rlty.affix_info_about_house') ?></a><li>
				<li class=""><a href="#affix_photo_and_video"><?= Yii::t('app', 'rlty.affix_photo_and_video') ?></a><li>
				<li class=""><a href="#affix_additional_info"><?= Yii::t('app', 'rlty.affix_additional_info') ?></a><li>
				<li class=""><a href="#affix_contacts"><?= Yii::t('app', 'rlty.affix_contacts') ?></a><li>
			</li>
		</nav>
	</div>
	
</div>