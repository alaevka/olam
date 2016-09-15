<?php
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\helpers\Url;
	use kartik\file\FileInput;
	use kartik\depdrop\DepDrop;
	use yii\helpers\ArrayHelper;
	use kartik\select2\Select2;
	use wbraganca\dynamicform\DynamicFormWidget;
	
	$this->title = Yii::t('app', 'works.create_resume');
?>

<div class="row">
    <div class="col-md-12 central-content" id="central-content">
    	<?= $this->render('/work/_works_header'); ?>
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
			<?= $form->field($model, 'suggestion_position')->textInput() ?>

			<?= $form->field($model, 'suggestion_sphere')->dropDownList(Arrayhelper::map(\common\models\WorkSpheres::find()->asArray()->all(), 'id', 'name'), ['id'=>'suggestion_sphere_id', 'prompt' => Yii::t('app', 'works.select_suggestion_sphere')]); ?>
			
			<?= $form->field($model, 'suggestion_pay', ['template' => "{label}\n<div class=\"col-sm-1 works-input-text\">".Yii::t('app', 'works.from')."</div><div class=\"col-sm-3\">{input}</div><div class=\"col-sm-2 works-input-text\">".Yii::t('app', 'works.valute')."</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->textInput() ?>

			<?= $form->field($model, 'suggestion_schedule')->dropDownList(Arrayhelper::map(\common\models\WorkSchedule::find()->asArray()->all(), 'id', 'name'), ['id'=>'suggestion_schedule_id', 'prompt' => Yii::t('app', 'works.select_suggestion_schedule')]); ?>

			<?= $form->field($model, 'suggestion_employment')->dropDownList(Arrayhelper::map(\common\models\WorkEmployment::find()->asArray()->all(), 'id', 'name'), ['id'=>'suggestion_employment_id', 'prompt' => Yii::t('app', 'works.select_suggestion_employment')]); ?>

		</div>

		<div id="affix_personal_information">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'works.affix_personal_information') ?></h3>

			<?php
				echo $form->field($model, 'user_photo', ['template' => "{label}\n<div class=\"col-sm-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->widget(FileInput::classname(), [
					'language' => 'ru',
				    'options' => ['multiple' => false, 'accept' => 'image/*'],
				    'pluginOptions' => ['previewFileType' => 'image', 'uploadUrl' => "http://localhost/file-upload-single/1", 'uploadAsync' => false, 'showUpload' => false]
				    
				]);
			?>
			
			<?= $form->field($model, 'personal_last_name')->textInput() ?>

			<?= $form->field($model, 'personal_first_name')->textInput() ?>

			<?= $form->field($model, 'personal_sur_name')->textInput() ?>

			<div class="form-group">
				<label class="col-sm-3 control-label"><?= Yii::t('app', 'works.birthday') ?></label>
				<div class="col-sm-8">
					<div class="row">
					<?= $form->field($model, 'personal_birth_day', ['template' => '{label}{input}', 'labelOptions' => ['class' => 'area_label'], 'options' => ['class' => 'left-form-group col-xs-4']])->textInput(['placeholder' => Yii::t('app', 'works.birth_day'), 'class' => 'form-control col-lg-3']) ?>
					<?= $form->field($model, 'personal_birth_month', ['template' => '{label}{input}', 'labelOptions' => ['class' => 'area_label'], 'options' => ['class' => 'left-form-group col-xs-4']])->textInput(['placeholder' => Yii::t('app', 'works.birth_month'), 'class' => 'form-control col-lg-3']) ?>
					<?= $form->field($model, 'personal_birth_year', ['template' => '{label}{input}', 'labelOptions' => ['class' => 'area_label'], 'options' => ['class' => 'left-form-group col-xs-4']])->textInput(['placeholder' => Yii::t('app', 'works.birth_year'), 'class' => 'form-control col-lg-3']) ?>
					</div>
				</div>
				<div class="col-sm-offset-3 col-sm-6">
					<?= $form->field($model, 'is_view_birthday')->checkboxList(
						['1' => Yii::t('app', 'works.is_view_birthday')],
						[
		                    'item' => function($index, $label, $name, $checked, $value) {

		                        $return = '<div class="checkbox checkbox-primary checkbox-inline">';
		                        if($checked) {
		                        	$return .= '<input checked id="is_view_birthday'.$index.'" type="checkbox" class="styled" name="' . $name . '" value="' . $value . '">';
		                        } else {
		                        	$return .= '<input id="is_view_birthday'.$index.'" type="checkbox" class="styled" name="' . $name . '" value="' . $value . '">';
		                        }
		                        $return .= '<label for="is_view_birthday'.$index.'">'. ucwords($label) .'</label>';
		                        $return .= '</div>';

		                        return $return;
		                    }
		                ]

					)->label(false) ?>
				</div>
			</div>

			<?= $form->field($model, 'personal_gender', ['template' => '{label}<div class="col-sm-9">{input}</div>'])->radioList(
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

			<?= $form->field($model, 'personal_marital_status', ['template' => '{label}<div class="col-sm-9">{input}</div>'])->radioList(
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

			<?= $form->field($model, 'personal_minors', ['template' => '{label}<div class="col-sm-9">{input}</div>'])->radioList(
				['1' => Yii::t('app', 'works.minors_is_available'), '2' => Yii::t('app', 'works.minors_is_not_available')],
				[
                    'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<div class="radio radio-primary radio-inline">';
                        if($checked) {
                        	$return .= '<input checked id="personal_minors'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                        } else {
                        	$return .= '<input id="personal_minors'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                        }
                        $return .= '<label for="personal_minors'.$index.'">'. ucwords($label) .'</label>';
                        $return .= '</div>';

                        return $return;
                    }
                ]

			) ?>

			<?= $form->field($model, 'personal_location_city')->dropDownList(\common\models\Locations::_getLocations(), ['id'=>'rlty_city_id', 'prompt' => Yii::t('app', 'rlty.select_city')]) ?>

			<?= $form->field($model, 'personal_location_raion', ['template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6 help-block-currency\">".Yii::t('app', 'rlty.if_not_in_the_list')." <a id='add_new_location_raion' href='#raion'>".Yii::t('app', 'rlty.add_new_raion')."</a></div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->widget(DepDrop::classname(), [
				    'options'=>['id'=>'rlty_raion_id'],
				    'pluginOptions'=>[
				        'depends'=>['rlty_city_id'],
				        'placeholder'=> Yii::t('app', 'rlty.select_raion'),
				        'url'=>Url::to(['/realty/getraion', 'selected' => $model->personal_location_raion]),
				        'initialize' => true
				    ]
				]);
				$script = '
					$(document).ready(function() {
						$("#add_new_location_raion").click(function() {
							$("#block_new_location_raion").slideToggle();
							return false;
						});
					});
				';

				$this->registerJs($script, yii\web\View::POS_READY);
			?>

			<div id="block_new_location_raion" <?php if(empty($model->new_location_raion)) { ?>style="display: none;"<?php } ?>>
				<?= $form->field($model, 'new_location_raion')->textInput() ?>
			</div>


		</div>



		<div id="affix_experience">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'works.affix_experience') ?></h3>

			<?= $form->field($model, 'experience_years')->textInput() ?>

			<?= $form->field($model, 'experience_information')->textArea(['rows' => 7]) ?>

			<?= $form->field($model, 'experience_tags', ['template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>\n<div class=\"col-sm-offset-3 col-sm-6 help-block-currency\">".Yii::t('app', 'works.you_can_add_new_tags_by_pressing_enter_key')."</div>"])->widget(Select2::classname(), [
			    'data' => $model->experience_tags,
			    'maintainOrder' => true,
			    'options' => ['placeholder' => Yii::t('app', 'works.select_or_add_your_main_tags'), 'multiple' => true],
			    'pluginOptions' => [
			        'tags' => true,
			        'maximumInputLength' => 100
			    ],
			]); ?>
	
		</div>

		<div id="affix_education">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'works.affix_education') ?></h3>
			
				<?php DynamicFormWidget::begin([
	                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
	                'widgetBody' => '.container-items', // required: css class selector
	                'widgetItem' => '.item', // required: css class
	                'limit' => 4, // the maximum times, an element can be cloned (default 999)
	                'min' => 1, // 0 or 1 (default 1)
	                'insertButton' => '.add-item', // css class
	                'deleteButton' => '.remove-item', // css class
	                'model' => $modelEducation[0],
	                'formId' => 'create-resume-form',
	                'formFields' => [
	                    'education_stage',
	                    'education_stage_from',
	                    'education_stage_to',
	                    'education_stage_city',
	                    'education_stage_form',
	                ],
	            ]); ?>
			
	            <div class="container-items"><!-- widgetBody -->
	            <?php foreach ($modelEducation as $i => $model_edu): ?>
	                <div class="item panel inline_item_panel"><!-- widgetItem -->
	                    <div class="panel-heading">
	                        <h3 class="panel-title pull-left"><?= Yii::t('app', 'works.education_place') ?></h3>
	                        <div class="pull-right">
	                            <a href="#" class="remove-item"><i class="fa fa-remove"></i></i></a>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                    <div class="panel-body">
	                        <?php
	                            // necessary for update action.
	                            if (! $model_edu->isNewRecord) {
	                                echo Html::activeHiddenInput($model_edu, "[{$i}]id");
	                            }
	                        ?>
	                        
	                        <?= $form->field($model_edu, "[{$i}]education_title")->textInput() ?>

	                        <?= $form->field($model_edu, "[{$i}]education_stage")->textInput() ?>
							
							<div class="form-group">
								<label class="col-sm-3 control-label"><?= Yii::t('app', 'works.period_of_study') ?></label>
								<div class="col-sm-8">
									<div class="row">
									<?= $form->field($model_edu, "[{$i}]education_stage_from", ['template' => '{label}{input}', 'labelOptions' => ['class' => 'area_label'], 'options' => ['class' => 'left-form-group col-xs-4']])->textInput(['placeholder' => Yii::t('app', 'works.education_stage_from'), 'class' => 'form-control col-lg-3']) ?>
									<?= $form->field($model_edu, "[{$i}]education_stage_to", ['template' => '{label}{input}', 'labelOptions' => ['class' => 'area_label'], 'options' => ['class' => 'left-form-group col-xs-4']])->textInput(['placeholder' => Yii::t('app', 'works.education_stage_to'), 'class' => 'form-control col-lg-3']) ?>
									</div>
								</div>
							</div>

							<?= $form->field($model_edu, "[{$i}]education_stage_city")->textInput() ?>

							<?= $form->field($model_edu, "[{$i}]education_stage_form")->textInput() ?>
							
	                    </div>
	                </div>
	            <?php endforeach; ?>
	            </div>
	        
				<div class="add-inline-item-block"><a href="#" class="add-item"><i class="fa fa-plus"></i> <?= Yii::t('app', 'works.add_another_place_of_learning') ?></a></div>

				<?php DynamicFormWidget::end(); ?>
		</div>

		<div id="affix_suggestions_city">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'works.affix_suggestions_city') ?></h3>

			<?= $form->field($model, 'suggestions_city')->textInput() ?>	

		</div>

		<div id="affix_additional_information">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'works.affix_additional_information') ?></h3>
			
			<?= $form->field($model, 'business_trip', ['template' => '{label}<div class="col-sm-9">{input}</div>'])->radioList(
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

			<?= $form->field($model, 'languages', ['template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>\n<div class=\"col-sm-offset-3 col-sm-6 help-block-currency\">".Yii::t('app', 'works.you_can_add_more_languages_by_pressing_enter_key')."</div>"])->widget(Select2::classname(), [
			    'data' => $data,
			    'maintainOrder' => true,
			    'options' => ['placeholder' => Yii::t('app', 'works.select_or_add_your_language'), 'multiple' => true],
			    'pluginOptions' => [
			        'tags' => true,
			        'maximumInputLength' => 100
			    ],
			]); ?>

			<?= $form->field($model, 'drivers_license')->checkboxList(
				['1' => Yii::t('app', 'A'), '2' => Yii::t('app', 'B'), '3' => Yii::t('app', 'C'), '4' => Yii::t('app', 'D'), '5' => Yii::t('app', 'E')],
				[
                    'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<div class="checkbox checkbox-primary checkbox-inline">';
                        $return .= '<input id="special_notes'.$index.'" type="checkbox" class="styled" name="' . $name . '" value="' . $value . '">';
                        $return .= '<label for="special_notes'.$index.'">'. ucwords($label) .'</label>';
                        $return .= '</div>';

                        return $return;
                    }
                ]

			) ?>

			<?= $form->field($model, 'smoking', ['template' => '{label}<div class="col-sm-9">{input}</div>'])->radioList(
				['1' => Yii::t('app', 'works.smoking_yes'), '2' => Yii::t('app', 'works.smoking_no')],
				[
                    'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<div class="radio radio-primary radio-inline">';
                        if($checked) {
                        	$return .= '<input checked id="smoking'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                        } else {
                        	$return .= '<input id="smoking'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                        }
                        $return .= '<label for="smoking'.$index.'">'. ucwords($label) .'</label>';
                        $return .= '</div>';

                        return $return;
                    }
                ]

			) ?>

			<?= $form->field($model, 'personal_qualities')->textArea(['rows' => 7]) ?>

		</div>

		<div id="affix_contacts_information">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'works.affix_contacts_information') ?></h3>

			<?= $form->field($model, 'contacts_phone')->textInput() ?>

			<?= $form->field($model, 'contacts_email')->textInput() ?>

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
				<li class=""><a href="#affix_suggestions"><?= Yii::t('app', 'works.affix_suggestions') ?></a><li>
				<li class=""><a href="#affix_personal_information"><?= Yii::t('app', 'works.affix_personal_information') ?></a><li>
				<li class=""><a href="#affix_experience"><?= Yii::t('app', 'works.affix_experience') ?></a><li>
				<li class=""><a href="#affix_education"><?= Yii::t('app', 'works.affix_education') ?></a><li>
				<li class=""><a href="#affix_suggestions_city"><?= Yii::t('app', 'works.affix_suggestions_city') ?></a><li>
				<li class=""><a href="#affix_additional_information"><?= Yii::t('app', 'works.affix_additional_information') ?></a><li>
				<li class=""><a href="#affix_contacts_information"><?= Yii::t('app', 'works.affix_contacts_information') ?></a><li>
			</li>
		</nav>
	</div>
	
</div>
