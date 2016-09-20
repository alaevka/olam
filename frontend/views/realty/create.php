<?php
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\helpers\Url;
	use kartik\file\FileInput;
	use kartik\depdrop\DepDrop;
	//$this->context->layout = 'empty';
	$this->title = Yii::t('app', 'rlty.create_add');
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
		]); ?>

		<?php echo $form->errorSummary($model); ?>


		<?php /*echo $form->field($model, 'rlty_type', ['template' => '{input}', 'options' => ['class' => 'btn-group btn-group-width-100', 'data-toggle' => 'buttons']])->radioList(
			['1' => Yii::t('app', 'rlty.type_for_living'), '2' => Yii::t('app', 'rlty.type_for_rent'), '3' => Yii::t('app', 'rlty.type_commercial'), '4' => Yii::t('app', 'rlty.type_houses_cottages'), '5' => Yii::t('app', 'rlty.type_garages'), '6' => Yii::t('app', 'rlty.type_land')],
			[
				'tag' => false,
                'item' => function($index, $label, $name, $checked, $value) {

                    $return = '<label class="btn btn16 btn-blue-light">';
                    $return .= '<input id="rlty_type'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                    $return .= ucwords($label);
                    $return .= '</label>';

                    return $return;
                }
            ]
		)->label(false) ?>

		<?= $form->field($model, 'rlty_action', ['template' => '{input}', 'options' => ['class' => 'btn-group btn-group-width-100', 'data-toggle' => 'buttons']])->radioList(
			['1' => Yii::t('app', 'rlty.action_sell'), '2' => Yii::t('app', 'rlty.action_buy'), '3' => Yii::t('app', 'rlty.action_pass'), '4' => Yii::t('app', 'rlty.action_shoot')],
			[
				'tag' => false,
                'item' => function($index, $label, $name, $checked, $value) {

                    $return = '<label class="btn btn25 btn-blue-light">';
                    $return .= '<input id="rlty_action'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                    $return .= ucwords($label);
                    $return .= '</label>';

                    return $return;
                }
            ]
		)->label(false)*/ ?>

		

		<?= $form->field($model, 'rlty_type', ['template' => '<div class="col-sm-12">{input}</div>'])->radioList(
				['1' => Yii::t('app', 'rlty.type_for_living'), '2' => Yii::t('app', 'rlty.type_for_rent'), '3' => Yii::t('app', 'rlty.type_commercial'), '4' => Yii::t('app', 'rlty.type_houses_cottages'), '5' => Yii::t('app', 'rlty.type_garages'), '6' => Yii::t('app', 'rlty.type_land')],
				[
                    'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<div class="radio radio-primary col-sm-4">';
                        $return .= '<input class="rlty_type_radio" id="rlty_type'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                        $return .= '<label for="rlty_type'.$index.'">'. ucwords($label) .'</label>';
                        $return .= '</div>';

                        return $return;
                    }
                ]

		)->label(false) ?>

		<?php
			$script = '$(document).ready(function() {
    			$(\'.rlty_type_radio\').change(function() {
    				if($(this).val() == \'5\' || $(this).val() == \'6\') {
    					$("#affix_info_about_apartment").hide();
    					$("#affix_info_about_house").hide();
    					$("#affix_info_about_apartment_li").hide();
    					$("#affix_info_about_house_li").hide();
	
						$("#affix_location").find("h3").find("span").html("'.Yii::t('app', 'rlty.step_1_of_5').'");
						$("#affix_price_and_conditions").find("h3").find("span").html("'.Yii::t('app', 'rlty.step_2_of_5').'");
						$("#affix_photo_and_video").find("h3").find("span").html("'.Yii::t('app', 'rlty.step_3_of_5').'");
						$("#affix_additional_info").find("h3").find("span").html("'.Yii::t('app', 'rlty.step_4_of_5').'");
						$("#affix_contacts").find("h3").find("span").html("'.Yii::t('app', 'rlty.step_5_of_5').'");

    				} else {
    					$("#affix_info_about_apartment").show();
    					$("#affix_info_about_house").show();
    					$("#affix_info_about_apartment_li").show();
    					$("#affix_info_about_house_li").show();

    					$("#affix_location").find("h3").find("span").html("'.Yii::t('app', 'rlty.step_1_of_7').'");
						$("#affix_price_and_conditions").find("h3").find("span").html("'.Yii::t('app', 'rlty.step_3_of_7').'");
						$("#affix_photo_and_video").find("h3").find("span").html("'.Yii::t('app', 'rlty.step_5_of_7').'");
						$("#affix_additional_info").find("h3").find("span").html("'.Yii::t('app', 'rlty.step_6_of_7').'");
						$("#affix_contacts").find("h3").find("span").html("'.Yii::t('app', 'rlty.step_7_of_7').'");
    				}
    			});
    		});';	
			$this->registerJs($script, yii\web\View::POS_READY);
		?>

		<?= $form->field($model, 'rlty_action', ['template' => '<div class="col-sm-12">{input}</div>'])->radioList(
				['1' => Yii::t('app', 'rlty.action_sell'), '2' => Yii::t('app', 'rlty.action_buy'), '3' => Yii::t('app', 'rlty.action_pass'), '4' => Yii::t('app', 'rlty.action_shoot')],
				[
                    'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<div class="radio radio-primary col-sm-3">';
                        $return .= '<input id="rlty_action'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
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
                        $return .= '<input id="build_type'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                        $return .= '<label for="build_type'.$index.'">'. ucwords($label) .'</label>';
                        $return .= '</div>';

                        return $return;
                    }
                ]

		)->label(false) ?>


	

		<div id="affix_location">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'rlty.affix_location') ?> <span><?= Yii::t('app', 'rlty.step_1_of_7') ?></span></h3>

			<?= $form->field($model, 'location_city')->dropDownList($locations, ['id'=>'rlty_city_id', 'prompt' => Yii::t('app', 'rlty.select_city')]) ?>

			<?= $form->field($model, 'location_raion', ['template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6 help-block-currency\">".Yii::t('app', 'rlty.if_not_in_the_list')." <a id='add_new_location_raion' href='#raion'>".Yii::t('app', 'rlty.add_new_raion')."</a></div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->widget(DepDrop::classname(), [
				    'options'=>['id'=>'rlty_raion_id'],
				    'pluginOptions'=>[
				        'depends'=>['rlty_city_id'],
				        'placeholder'=> Yii::t('app', 'rlty.select_raion'),
				        'url'=>Url::to(['/realty/getraion', 'selected' => $model->location_raion]),
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

			<?= $form->field($model, 'location_street', ['template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6 help-block-currency\">".Yii::t('app', 'rlty.if_not_in_the_list')." <a id='add_new_location_street' href='#street'>".Yii::t('app', 'rlty.add_new_street')."</a></div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->widget(DepDrop::classname(), [
				    'options'=>['id'=>'rlty_street_id'],
				    'pluginOptions'=>[
				        'depends'=>['rlty_city_id'],
				        'placeholder'=> Yii::t('app', 'rlty.select_street'),
				        'url'=>Url::to(['/realty/getstreet', 'selected' => $model->location_street]),
				        'initialize' => true
				    ]
				]);
				$script = '
					$(document).ready(function() {
						$("#add_new_location_street").click(function() {
							$("#block_new_location_street").slideToggle();
							return false;
						});
					});
				';

				$this->registerJs($script, yii\web\View::POS_READY);
			?>

			<div id="block_new_location_street" <?php if(empty($model->new_location_street)) { ?>style="display: none;"<?php } ?>>
				<?= $form->field($model, 'new_location_street')->textInput() ?>
			</div>

			<?= $form->field($model, 'location_house')->textInput() ?>
			
			
		</div>

		<div id="affix_info_about_apartment">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'rlty.affix_info_about_apartment') ?> <span><?= Yii::t('app', 'rlty.step_2_of_7') ?></span></h3>

			<?= $form->field($model, 'rooms_count')->radioList(
				['1' => '1', '2' => '2', '3' => '3', '4' => '3+'],
				[
                    'item' => function($index, $label, $name, $checked, $value) {

                        $return = '<div class="radio radio-primary radio-inline">';
                        $return .= '<input id="rooms_count'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
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
                        $return .= '<input id="price_conditions'.$index.'" type="checkbox" class="styled" name="' . $name . '" value="' . $value . '">';
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
				echo $form->field($model, 'gallery[]', ['template' => "{label}\n<div class=\"col-sm-9 col-sm-offset-3\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->widget(FileInput::classname(), [
					'language' => 'ru',
				    'options' => ['multiple' => true, 'accept' => 'image/*'],
				    'pluginOptions' => ['previewFileType' => 'image', 'uploadUrl' => "http://localhost/file-upload-single/1", 'uploadAsync' => false, 'showUpload' => false]
				    
				])->label(false);
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

		<div>
			<?= Yii::t('app', 'rlty.you_must_agree_with_terms') ?> <a href=""><?= Yii::t('app', 'user.terms_of_use_link_text') ?></a>
		</div>
		
		<div class="submit-button">
			<?= Html::submitButton(Yii::t('app', 'realty.add_button'), ['class' => 'btn btn-blue']) ?>
		</div>

		<?php ActiveForm::end(); ?>
	</div>
	<div class="col-md-3">
		<nav class="bs-docs-sidebar hidden-print hidden-sm hidden-xs affix" > 
			<ul class="nav bs-docs-sidenav"> 
				<li class=""><a href="#affix_location"><?= Yii::t('app', 'rlty.affix_location') ?></a><li>
				<li id="affix_info_about_apartment_li" class=""><a href="#affix_info_about_apartment"><?= Yii::t('app', 'rlty.affix_info_about_apartment') ?></a><li>
				<li id="affix_info_about_house_li" class=""><a href="#affix_price_and_conditions"><?= Yii::t('app', 'rlty.affix_price_and_conditions') ?></a><li>
				<li class=""><a href="#affix_info_about_house"><?= Yii::t('app', 'rlty.affix_info_about_house') ?></a><li>
				<li class=""><a href="#affix_photo_and_video"><?= Yii::t('app', 'rlty.affix_photo_and_video') ?></a><li>
				<li class=""><a href="#affix_additional_info"><?= Yii::t('app', 'rlty.affix_additional_info') ?></a><li>
				<li class=""><a href="#affix_contacts"><?= Yii::t('app', 'rlty.affix_contacts') ?></a><li>
			</li>
		</nav>
	</div>
	
</div>
<?= $this->render('/direct/bottom_block'); ?>