<?php
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\helpers\Url;
	use kartik\file\FileInput;
	use kartik\depdrop\DepDrop;
	use yii\helpers\ArrayHelper;
	use kartik\select2\Select2;
	use wbraganca\dynamicform\DynamicFormWidget;
	
	$this->title = Yii::t('app', 'works.create_company');
?>

<div class="row">
    <div class="col-md-12 central-content" id="central-content">
    	<?= $this->render('/work/_works_header'); ?>
        <h1><?= Yii::t('app', 'works.create_company') ?></h1>
    </div>
	
	<div class="col-md-9">

		<?php $form = ActiveForm::begin([
		    'id' => 'create-company-form',
		    'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
		    'fieldConfig' => [
        		'template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>",
        		'labelOptions' => ['class' => 'col-sm-3 control-label'],
        	],
		]); ?>

		<?php echo $form->errorSummary($model); ?>

		<?= $form->field($model, 'company_type', ['template' => '<div class="col-sm-12">{input}</div>'])->radioList(
				['1' => Yii::t('app', 'works.direct_employer'), '2' => Yii::t('app', 'works.recruitment_agency')],
				[
                    'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<div class="radio radio-primary col-sm-4">';
                        if($checked) {
                        	$return .= '<input checked class="company_type" id="company_type'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                        } else {
                        	$return .= '<input class="company_type" id="company_type'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                        }
                        $return .= '<label for="company_type'.$index.'">'. ucwords($label) .'</label>';
                        $return .= '</div>';

                        return $return;
                    }
                ]

		)->label(false) ?>

		<div id="affix_personal_information">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'works.affix_personal_information') ?></h3>
			
			<?= $form->field($model, 'user_fio')->textInput() ?>

			<?= $form->field($model, 'user_position')->textInput() ?>

			<?= $form->field($model, 'phones')->textInput() ?>

		</div>

		<div id="affix_info_about_company">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'works.affix_info_about_company') ?></h3>
			
			<?= $form->field($model, 'company_name')->textInput() ?>

			<?= $form->field($model, 'company_legal_name')->textInput() ?>

			<?= $form->field($model, 'company_description')->textArea(['rows' => 7]) ?>

			<?= $form->field($model, 'company_spheres')->checkboxList(
					Arrayhelper::map(\common\models\WorkSpheres::find()->asArray()->all(), 'id', 'name'),
					[
	                    'item' => function($index, $label, $name, $checked, $value) {

	                        $return = '<div class="checkbox checkbox-primary">';
	                        if($checked) {
	                        	$return .= '<input checked id="company_spheres'.$index.'" type="checkbox" class="styled" name="' . $name . '" value="' . $value . '">';
	                        } else {
	                        	$return .= '<input id="company_spheres'.$index.'" type="checkbox" class="styled" name="' . $name . '" value="' . $value . '">';
	                        }
	                        $return .= '<label for="company_spheres'.$index.'">'. ucwords($label) .'</label>';
	                        $return .= '</div>';

	                        return $return;
	                    }
	                ]

				) ?>

			<?= $form->field($model, 'company_size')->textInput() ?>

			<?= $form->field($model, 'company_site')->textInput() ?>

			<?= $form->field($model, 'company_email')->textInput() ?>

			<?php
				echo $form->field($model, 'company_logo', ['template' => "{label}\n<div class=\"col-sm-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\"><span class=\"hint-for-additional-text\">".Yii::t('app', 'works.never_use_logotypes_such_as')."</span>{error}\n{hint}</div>"])->widget(FileInput::classname(), [
					'language' => 'ru',
				    'options' => ['multiple' => false, 'accept' => 'image/*'],
				    'pluginOptions' => ['previewFileType' => 'image', 'uploadUrl' => "http://localhost/file-upload-single/1", 'uploadAsync' => false, 'showUpload' => false]
				    
				]);
			?>

		</div>

		<div id="affix_contacts_information">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'works.affix_contacts_information') ?></h3>

			<?= $form->field($model, 'contact_city')->textInput() ?>

			<?= $form->field($model, 'contact_address_street')->textInput() ?>

			<div class="form-group">
				<label class="col-sm-3 control-label" for=""></label>
				<div class="col-sm-8">
					<div class="row">
					<?= $form->field($model, 'contact_address_house', ['template' => '{label}{input}', 'labelOptions' => ['class' => 'area_label'], 'options' => ['class' => 'left-form-group col-xs-4']])->textInput(['class' => 'form-control col-lg-3']) ?>
					<?= $form->field($model, 'contact_address_additional', ['template' => '{label}{input}', 'labelOptions' => ['class' => 'area_label'], 'options' => ['class' => 'left-form-group col-xs-4']])->textInput(['class' => 'form-control col-lg-3']) ?>
					</div>
				</div>
				<div class="col-sm-offset-3 col-sm-6"><div class="help-block"></div></div>
			</div>

			<?= $form->field($model, 'contact_phones')->textInput() ?>

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
				<li class=""><a href="#affix_personal_information"><?= Yii::t('app', 'works.affix_personal_information') ?></a><li>
				<li class=""><a href="#affix_info_about_company"><?= Yii::t('app', 'works.affix_info_about_company') ?></a><li>
				<li class=""><a href="#affix_contacts_information"><?= Yii::t('app', 'works.affix_contacts_information') ?></a><li>
			</li>
		</nav>
	</div>
	
</div>