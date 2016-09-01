<?php
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\helpers\Url;
	use kartik\file\FileInput;
	use kartik\depdrop\DepDrop;
	use yii\helpers\ArrayHelper;
	
	$this->title = Yii::t('app', 'auto.create_add');
?>

<div class="row">
    <div class="col-md-12 central-content" id="central-content">
        <h1><?= Yii::t('app', 'auto.create_add') ?></h1>
    </div>
	
	<div class="col-md-9">

		<?php $form = ActiveForm::begin([
		    'id' => 'create-auto-form',
		    'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
		    'fieldConfig' => [
        		'template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>",
        		'labelOptions' => ['class' => 'col-sm-3 control-label'],
        	],
		]); ?>

		<?php echo $form->errorSummary($model); ?>

		<?= $form->field($model, 'auto_object_type', ['template' => '<div class="col-sm-12">{input}</div>'])->radioList(
				['1' => Yii::t('app', 'auto.type_cars'), '2' => Yii::t('app', 'auto.type_wheels'), '3' => Yii::t('app', 'auto.type_other')],
				[
                    'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<div class="radio radio-primary col-sm-4">';
                        if($checked) {
                        	$return .= '<input checked class="auto_object_type_radio" id="auto_object_type'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                        } else {
                        	$return .= '<input class="auto_object_type_radio" id="auto_object_type'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                        }
                        $return .= '<label for="auto_object_type'.$index.'">'. ucwords($label) .'</label>';
                        $return .= '</div>';

                        return $return;
                    }
                ]

		)->label(false) ?>

		<div id="affix_tech_options">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'auto.affix_tech_options') ?> <span><?= Yii::t('app', 'auto.step_1_of_3') ?></span></h3>

			<?= $form->field($model, 'tech_vin')->textInput() ?>
			
			<?= $form->field($model, 'tech_category')->dropDownList(Arrayhelper::map(\common\models\AutoCategory::find()->asArray()->all(), 'id', 'name'), ['id'=>'tech_category_id', 'prompt' => Yii::t('app', 'auto.select_auto_category')]); ?>
		
			<?= $form->field($model, 'tech_marka')->widget(DepDrop::classname(), [
				    'options'=>['id'=>'tech_marka_id'],
				    'pluginOptions'=>[
				        'depends'=>['tech_category_id'],
				        'placeholder'=> Yii::t('app', 'auto.select_mark'),
				        'url'=>Url::to(['/auto/getmark'])
				    ]
				]);
			?>

			<?= $form->field($model, 'tech_model')->widget(DepDrop::classname(), [
				    'options'=>['id'=>'tech_model_id'],
				    'pluginOptions'=>[
				        'depends'=>['tech_category_id', 'tech_marka_id'],
				        'placeholder'=> Yii::t('app', 'auto.select_model'),
				        'url'=>Url::to(['/auto/getmodel'])
				    ]
				]);
			?>

			<?= $form->field($model, 'tech_construction_year')->dropDownList($construction_years, ['prompt' => Yii::t('app', 'auto.select_year_of_construction')]); ?>

			<?= $form->field($model, 'tech_mileage')->textInput() ?>

			<?= $form->field($model, 'tech_helm')->radioList(
				['1' => Yii::t('app', 'auto.helm_left'), '2' => Yii::t('app', 'auto.helm_right')],
				[
                    'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<div class="radio radio-primary radio-inline">';
                        $return .= '<input id="tech_helm'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                        $return .= '<label for="tech_helm'.$index.'">'. ucwords($label) .'</label>';
                        $return .= '</div>';

                        return $return;
                    }
                ]

			) ?>

			<div class="form-group">
				<label class="col-sm-3 control-label" for="ads-location_raion"><?= Yii::t('app', 'auto.engine_options') ?></label>
				<div class="col-sm-8">
					<div class="row">
					<?= $form->field($model, 'tech_value', ['template' => '{label}{input}', 'labelOptions' => ['class' => 'area_label'], 'options' => ['class' => 'left-form-group col-xs-4']])->textInput(['placeholder' => Yii::t('app', 'auto.tech_value'), 'class' => 'form-control col-lg-3']) ?>
					<?= $form->field($model, 'tech_horsepower', ['template' => '{label}{input}', 'labelOptions' => ['class' => 'area_label'], 'options' => ['class' => 'left-form-group col-xs-4']])->textInput(['placeholder' => Yii::t('app', 'auto.tech_horsepower'), 'class' => 'form-control col-lg-3']) ?>
					</div>
				</div>
				<div class="col-sm-offset-3 col-sm-6"><div class="help-block"></div></div>
			</div>

			<?= $form->field($model, 'tech_transmission', ['template' => '{label}<div class="col-sm-9">{input}</div>'])->radioList(
				['1' => Yii::t('app', 'auto.transmission_auto'), '2' => Yii::t('app', 'auto.transmission_mechanic')],
				[
                    'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<div class="radio radio-primary radio-inline">';
                        $return .= '<input id="tech_transmission'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                        $return .= '<label for="tech_transmission'.$index.'">'. ucwords($label) .'</label>';
                        $return .= '</div>';

                        return $return;
                    }
                ]

			) ?>

			<?= $form->field($model, 'tech_fuel', ['template' => '{label}<div class="col-sm-9">{input}</div>'])->radioList(
				['1' => Yii::t('app', 'auto.fuel_petrol'), '2' => Yii::t('app', 'auto.fuel_diesel'), '3' => Yii::t('app', 'auto.fuel_gaz')],
				[
                    'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<div class="radio radio-primary radio-inline">';
                        $return .= '<input id="tech_fuel'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                        $return .= '<label for="tech_fuel'.$index.'">'. ucwords($label) .'</label>';
                        $return .= '</div>';

                        return $return;
                    }
                ]

			) ?>

			<?= $form->field($model, 'tech_gear', ['template' => '{label}<div class="col-sm-9">{input}</div>'])->radioList(
				['1' => Yii::t('app', 'auto.front_wheel_gear'), '2' => Yii::t('app', 'auto.back_wheel_gear'), '3' => Yii::t('app', 'auto.full_wheel_gear')],
				[
                    'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<div class="radio radio-primary radio-inline">';
                        $return .= '<input id="tech_gear'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                        $return .= '<label for="tech_gear'.$index.'">'. ucwords($label) .'</label>';
                        $return .= '</div>';

                        return $return;
                    }
                ]

			) ?>


			<?= $form->field($model, 'tech_color', ['template' => '{label}<div class="col-sm-9">{input}</div>'])->dropDownList($colors_list, ['options' => $colors_data_attribute_list, 'id' => 'colorselector']); ?>
			<?php
				$script = '$("#colorselector").simplecolorpicker({theme: \'fontawesome\'})';
			?>
			<?php $this->registerJs($script, yii\web\View::POS_READY); ?>
			
			<?= $form->field($model, 'special_notes')->checkboxList(
				['1' => Yii::t('app', 'auto.undocumented'), '2' => Yii::t('app', 'auto.is_broken')],
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
			
			<?= $form->field($model, 'additional_info', ['template' => "{label}\n<div class=\"col-sm-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}<span class='hint-for-additional-text'>".Yii::t('app', 'rlty.it_is_not_allowed_to_specify_the_phone_and_other')."</span></div>"])->widget(\dosamigos\tinymce\TinyMce::className(), [
		        'options' => ['rows' => 6],
		        'language' => 'ru',

		        'clientOptions' => [
		            'toolbar' => "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link",
		            'menubar' => false,
		            'statusbar' => false,
		        ]
		    ]);?>

			
		</div>

		<div id="affix_photo_and_video">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'auto.affix_photo_and_video') ?> <span><?= Yii::t('app', 'auto.step_2_of_3') ?></span></h3>
			<div class="upload-photo-text">
				<?= Yii::t('app', 'auto.you_can_upload_not_more') ?>
			</div>
			<?php
				echo $form->field($model, 'gallery[]', ['template' => "{label}\n<div class=\"col-sm-9 col-sm-offset-3\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->widget(FileInput::classname(), [
					'language' => 'ru',
				    'options' => ['multiple' => true, 'accept' => 'image/*'],
				    'pluginOptions' => ['previewFileType' => 'image', 'uploadUrl' => "http://localhost/file-upload-single/1", 'uploadAsync' => false, 'showUpload' => false]
				    
				])->label(false);
			?>
		</div>

		<div id="affix_contacts">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'auto.affix_price_and_contacts') ?> <span><?= Yii::t('app', 'auto.step_3_of_3') ?></span></h3>
				
			<?= $form->field($model, 'price', ['template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6 help-block-currency\">".Yii::t('app', 'rlty.please_set_price_in_your_currency')."</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->textInput() ?>
			
			<?= $form->field($model, 'exchange')->checkboxList(
				['1' => Yii::t('app', 'auto.exchange_is_available')],
				[
                    'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<div class="checkbox checkbox-primary checkbox-inline">';
                        $return .= '<input id="exchange'.$index.'" type="checkbox" class="styled" name="' . $name . '" value="' . $value . '">';
                        $return .= '<label for="exchange'.$index.'">'. ucwords($label) .'</label>';
                        $return .= '</div>';

                        return $return;
                    }
                ]

			) ?>

			<?= $form->field($model, 'status', ['template' => '{label}<div class="col-sm-9">{input}</div>'])->radioList(
				['1' => Yii::t('app', 'auto.is_available'), '2' => Yii::t('app', 'auto.on_the_way'), '3' => Yii::t('app', 'auto.custom')],
				[
                    'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<div class="radio radio-primary radio-inline">';
                        $return .= '<input id="status'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                        $return .= '<label for="status'.$index.'">'. ucwords($label) .'</label>';
                        $return .= '</div>';

                        return $return;
                    }
                ]

			) ?>

			<?= $form->field($model, 'location_city')->dropDownList($locations) ?>

			<?= $form->field($model, 'contacts_username')->textInput() ?>

			<?= $form->field($model, 'contacts_phone')->textInput() ?>

			<?= $form->field($model, 'contacts_email')->textInput() ?>



		</div>



		<div class="submit-button">
			<?= Html::submitButton(Yii::t('app', 'auto.add_button'), ['class' => 'btn btn-blue']) ?>
		</div>

		<?php ActiveForm::end(); ?>
	</div>
	<div class="col-md-3">
		<nav class="bs-docs-sidebar hidden-print hidden-sm hidden-xs affix" > 
			<ul class="nav bs-docs-sidenav"> 
				<li class=""><a href="#affix_tech_options"><?= Yii::t('app', 'auto.affix_tech_options') ?></a><li>
				<li class=""><a href="#affix_photo_and_video"><?= Yii::t('app', 'auto.affix_photo_and_video') ?></a><li>
				<li class=""><a href="#affix_contacts"><?= Yii::t('app', 'auto.affix_price_and_contacts') ?></a><li>
			</li>
		</nav>
	</div>
	
</div>
<?= $this->render('/direct/bottom_block'); ?>
