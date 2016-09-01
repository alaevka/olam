<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use kartik\file\FileInput;
	use yii\widgets\ActiveForm;
?>

	<?php $form = ActiveForm::begin([
        'id' => 'realty-form',
        'errorSummaryCssClass' => 'error-summary alert alert-danger',
        'options' => ['class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data'],
        'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-sm-5\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-5\">{error}\n{hint}</div>",
        'labelOptions' => ['class' => 'col-sm-3 control-label'],
        ],
    ]); ?>

    <?php echo $form->errorSummary($model); ?>

    <?= $form->field($model, 'rlty_type', ['template' => '<div class="col-sm-12">{input}</div>'])->radioList(
			['1' => Yii::t('app', 'rlty.type_for_living'), '2' => Yii::t('app', 'rlty.type_for_rent'), '3' => Yii::t('app', 'rlty.type_commercial'), '4' => Yii::t('app', 'rlty.type_houses_cottages'), '5' => Yii::t('app', 'rlty.type_garages'), '6' => Yii::t('app', 'rlty.type_land')],
			[
                'item' => function($index, $label, $name, $checked, $value) {

                    $return = '<div class="radio radio-primary col-sm-4">';
                    if($checked) {
                    	$return .= '<input checked id="rlty_type'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                    } else {
                    	$return .= '<input id="rlty_type'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                    }
                    $return .= '<label for="rlty_type'.$index.'">'. ucwords($label) .'</label>';
                    $return .= '</div>';

                    return $return;
                }
            ]

	)->label(false) ?>

	<?= $form->field($model, 'rlty_action', ['template' => '<div class="col-sm-12">{input}</div>'])->radioList(
			['1' => Yii::t('app', 'rlty.action_sell'), '2' => Yii::t('app', 'rlty.action_buy'), '3' => Yii::t('app', 'rlty.action_pass'), '4' => Yii::t('app', 'rlty.action_shoot')],
			[
                'item' => function($index, $label, $name, $checked, $value) {

                    $return = '<div class="radio radio-primary col-sm-3">';
                    if($checked) {
                    	$return .= '<input checked id="rlty_action'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                    } else {
                    	$return .= '<input id="rlty_action'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                    }
                    $return .= '<label for="rlty_action'.$index.'">'. ucwords($label) .'</label>';
                    $return .= '</div>';

                    return $return;
                }
            ]

	)->label(false) ?>

	<?= $form->field($model, 'build_type', ['template' => '<div class="col-sm-12">{input}</div>'])->radioList(
				['1' => Yii::t('app', 'rlty.new_building'), '2' => Yii::t('app', 'rlty.resale')],
				[
                    'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<div class="radio radio-primary col-sm-3">';
                        
                        if($checked) {
	                    	$return .= '<input checked id="build_type'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
	                    } else {
	                    	$return .= '<input id="build_type'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
	                    }
                        $return .= '<label for="build_type'.$index.'">'. ucwords($label) .'</label>';
                        $return .= '</div>';

                        return $return;
                    }
                ]

		)->label(false) ?>


	<div id="affix_location">
		<hr class="create-separator">
		<h3><?= Yii::t('app', 'rlty.affix_location') ?> <span><?= Yii::t('app', 'rlty.step_1_of_7') ?></span></h3>

		<?= $form->field($model, 'location_city')->dropDownList($locations) ?>

		<?= $form->field($model, 'location_street')->textInput() ?>

		<?= $form->field($model, 'location_house')->textInput() ?>

		<?= $form->field($model, 'location_raion')->textInput() ?>
	</div>

	<div id="affix_info_about_apartment">
		<hr class="create-separator">
		<h3><?= Yii::t('app', 'rlty.affix_info_about_apartment') ?> <span><?= Yii::t('app', 'rlty.step_2_of_7') ?></span></h3>

		<?= $form->field($model, 'rooms_count')->radioList(
			['1' => '1', '2' => '2', '3' => '3', '4' => '3+'],
			[
                'item' => function($index, $label, $name, $checked, $value) {

                    $return = '<div class="radio radio-primary radio-inline">';
                    if($checked) {
                    	$return .= '<input checked id="rooms_count'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                    } else {
                    	$return .= '<input id="rooms_count'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                    }
                    $return .= '<label for="rooms_count'.$index.'">'. ucwords($label) .'</label>';
                    $return .= '</div>';

                    return $return;
                }
            ]

		) ?>

		<div class="form-group">
			<label class="col-sm-3 control-label" for="ads-location_raion"><?= Yii::t('app', 'rlty.area') ?></label>
			<div class="col-sm-8">
				<div class="row">
				<?= $form->field($model, 'area_total', ['template' => '{label}{input}', 'labelOptions' => ['class' => 'area_label'], 'options' => ['class' => 'left-form-group col-xs-4']])->textInput(['placeholder' => Yii::t('app', 'rlty.area_total'), 'class' => 'form-control col-lg-3']) ?>
				<?= $form->field($model, 'area_for_living', ['template' => '{label}{input}', 'labelOptions' => ['class' => 'area_label'], 'options' => ['class' => 'left-form-group col-xs-4']])->textInput(['placeholder' => Yii::t('app', 'rlty.area_for_living'), 'class' => 'form-control col-lg-3']) ?>
				<?= $form->field($model, 'area_kitchen', ['template' => '{label}{input}', 'labelOptions' => ['class' => 'area_label'], 'options' => ['class' => 'left-form-group col-xs-4']])->textInput(['placeholder' => Yii::t('app', 'rlty.area_kitchen'), 'class' => 'form-control col-lg-3']) ?>
				</div>
			</div>
			<div class="col-sm-offset-3 col-sm-6"><div class="help-block"></div></div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label" for="ads-location_raion"><?= Yii::t('app', 'rlty.level') ?></label>
			<div class="col-sm-8">
				<div class="row">
				<?= $form->field($model, 'level', ['template' => '{input}', 'labelOptions' => ['class' => 'area_label'], 'options' => ['class' => 'left-form-group col-xs-4']])->textInput(['placeholder' => Yii::t('app', 'rlty.level'), 'class' => 'form-control col-lg-3']) ?>
				<div class="col-xs-2 of_levels"><?= Yii::t('app', 'rlty.of') ?></div>
				<?= $form->field($model, 'total_levels', ['template' => '{input}', 'labelOptions' => ['class' => 'area_label'], 'options' => ['class' => 'left-form-group col-xs-4']])->textInput(['placeholder' => Yii::t('app', 'rlty.total_levels'), 'class' => 'form-control col-lg-3']) ?>
				</div>
			</div>
			<div class="col-sm-offset-3 col-sm-6"><div class="help-block"></div></div>
		</div>

		<?= $form->field($model, 'flat_type')->dropDownList($flat_type) ?>

		<?= $form->field($model, 'flat_plan')->dropDownList($flat_plan) ?>

		<?= $form->field($model, 'flat_repairs')->dropDownList($flat_repairs) ?>

		<div class="form-group">
			
			<div class="col-sm-offset-3 col-sm-8">
				<div class="row">
				<?= $form->field($model, 'loggias_count', ['template' => '{label}{input}', 'labelOptions' => ['class' => 'area_label'], 'options' => ['class' => 'left-form-group col-xs-4']])->textInput(['placeholder' => Yii::t('app', 'rlty.loggias_count'), 'class' => 'form-control col-lg-3']) ?>
				
				<?= $form->field($model, 'balconies_count', ['template' => '{label}{input}', 'labelOptions' => ['class' => 'area_label'], 'options' => ['class' => 'left-form-group col-xs-4']])->textInput(['placeholder' => Yii::t('app', 'rlty.balconies_count'), 'class' => 'form-control col-lg-3']) ?>
				</div>
			</div>
			<div class="col-sm-offset-3 col-sm-6"><div class="help-block"></div></div>
		</div>

	</div>

	<div id="affix_price_and_conditions">
		<hr class="create-separator">
		<h3><?= Yii::t('app', 'rlty.affix_price_and_conditions') ?> <span><?= Yii::t('app', 'rlty.step_3_of_7') ?></span></h3>
		
		<?= $form->field($model, 'price', ['template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6 help-block-currency\">".Yii::t('app', 'rlty.please_set_price_in_your_currency')."</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->textInput() ?>

		<?= $form->field($model, 'price_conditions')->checkboxList(
			['1' => Yii::t('app', 'rlty.auction'), '2' => Yii::t('app', 'rlty.pure_sale'), '3' => Yii::t('app', 'rlty.hypothec'), '4' => Yii::t('app', 'rlty.exchange_is_possible'), '5' => Yii::t('app', 'rlty.made_a_deposit'), '6' => Yii::t('app', 'rlty.is_pledged')],
			[
                'item' => function($index, $label, $name, $checked, $value) {

                    $return = '<div class="checkbox checkbox-primary">';
                    if($checked) {
                    	$return .= '<input checked id="price_conditions'.$index.'" type="checkbox" class="styled" name="' . $name . '" value="' . $value . '">';
                    } else {
                    	$return .= '<input id="price_conditions'.$index.'" type="checkbox" class="styled" name="' . $name . '" value="' . $value . '">';
                    }
                    $return .= '<label for="price_conditions'.$index.'">'. ucwords($label) .'</label>';
                    $return .= '</div>';

                    return $return;
                }
            ]

		) ?>

		<?= $form->field($model, 'type_of_ownership')->dropDownList($type_of_ownership) ?>

	</div>

	<div id="affix_info_about_house">
		<hr class="create-separator">
		<h3><?= Yii::t('app', 'rlty.affix_info_about_house') ?> <span><?= Yii::t('app', 'rlty.step_4_of_7') ?></span></h3>
		
		<?= $form->field($model, 'year_of_construction')->textInput() ?>

		<?= $form->field($model, 'house_type')->dropDownList($house_type) ?>

		<?= $form->field($model, 'house_material')->dropDownList($house_material) ?>


	</div>

	<div id="affix_photo_and_video">
		<hr class="create-separator">
		<h3><?= Yii::t('app', 'rlty.affix_photo_and_video') ?> <span><?= Yii::t('app', 'rlty.step_5_of_7') ?></span></h3>
		<div class="upload-photo-text">
			<?= Yii::t('app', 'rlty.you_can_upload_not_more') ?>
		</div>
		<?php
			if($model->isNewRecord) {
				echo $form->field($model, 'gallery[]', ['template' => "{label}\n<div class=\"col-sm-9 col-sm-offset-3\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->widget(FileInput::classname(), [
					'language' => 'ru',
				    'options' => ['multiple' => true, 'accept' => 'image/*'],
				    'pluginOptions' => ['previewFileType' => 'image', 'uploadUrl' => "http://localhost/file-upload-single/1", 'uploadAsync' => false, 'showUpload' => false]
				    
				])->label(false);
			} else {
				$gallery = \common\models\Adsgallery::find()->where(['ads_id' => $model->id])->all();
				$initial_preview_array = [];
				$initialPreviewConfig = [];
				if($gallery) {
					foreach ($gallery as $key => $value) {
						$initial_preview_array[] = "http://olam.front/uploads/objects/cropped_".$value->image_name;
						$initialPreviewConfig[] = ['caption' => $value->image_name];
					}
				}
				echo $form->field($model, 'gallery[]', ['template' => "{label}\n<div class=\"col-sm-9 col-sm-offset-3\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->widget(FileInput::classname(), [
					'language' => 'ru',
				    'options' => ['multiple' => true, 'accept' => 'image/*'],
				    'pluginOptions' => [
				    	'previewFileType' => 'image', 
				    	'uploadUrl' => "http://localhost/file-upload-single/1", 
				    	'uploadAsync' => false, 
				    	'showUpload' => false,
				    	'initialPreview'=>$initial_preview_array,
				        'initialPreviewAsData'=>true,
				        'initialPreviewConfig' => $initialPreviewConfig,
        				'overwriteInitial'=>false,
				    ]
				])->label(false);
			} 
		?>
	</div>
	
	<div id="affix_additional_info">
		<hr class="create-separator">
		<h3><?= Yii::t('app', 'rlty.affix_additional_info') ?> <span><?= Yii::t('app', 'rlty.step_6_of_7') ?></span></h3>
		
		<?= $form->field($model, 'title')->textInput() ?>

		<?= $form->field($model, 'additional_info', ['template' => "{label}\n<div class=\"col-sm-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->widget(\dosamigos\tinymce\TinyMce::className(), [
	        'options' => ['rows' => 6],
	        'language' => 'ru',

	        'clientOptions' => [
	            'toolbar' => "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link",
	            'menubar' => false,
	            'statusbar' => false,
	        ]
	    ]);?>

	</div>


	<div id="affix_contacts">
		<hr class="create-separator">
		<h3><?= Yii::t('app', 'rlty.affix_contacts') ?> <span><?= Yii::t('app', 'rlty.step_7_of_7') ?></span></h3>		
			
		<?= $form->field($model, 'contacts_username')->textInput() ?>

		<?= $form->field($model, 'contacts_phone')->textInput() ?>

		<?= $form->field($model, 'contacts_email')->textInput() ?>
		
	</div>


    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => 'btn btn-success']) ?><br>
        </div>
    </div>	

    <?php ActiveForm::end(); ?>

</div>