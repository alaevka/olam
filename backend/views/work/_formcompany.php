<?php
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\helpers\Url;
	use kartik\file\FileInput;
	use yii\helpers\ArrayHelper;
	
?>

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
		if($model->isNewRecord) {
			echo $form->field($model, 'company_logo', ['template' => "{label}\n<div class=\"col-sm-9 col-sm-offset-3\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->widget(FileInput::classname(), [
				'language' => 'ru',
			    'options' => ['multiple' => false, 'accept' => 'image/*'],
			    'pluginOptions' => ['previewFileType' => 'image', 'uploadUrl' => "http://localhost/file-upload-single/1", 'uploadAsync' => false, 'showUpload' => false]
			    
			])->label(false);
		} else {
			
			$initial_preview_array = [];
			$initialPreviewConfig = [];
			if($model->company_logo) {
				
					$initial_preview_array[] = Yii::$app->params['frontend_url']."/uploads/companies/".$model->company_logo;
					$initialPreviewConfig[] = ['caption' => $model->company_logo, 'url' => "/work/deleteimagecompany", 'key' => $model->id];
				
			}
			echo $form->field($model, 'company_logo', ['template' => "{label}\n<div class=\"col-sm-9 col-sm-offset-3\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->widget(FileInput::classname(), [
				'language' => 'ru',
			    'options' => ['multiple' => false, 'accept' => 'image/*'],
			    'pluginOptions' => [
			    	'previewFileType' => 'image', 
			    	'uploadUrl' => "/file-upload", 
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




<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => 'btn btn-success']) ?><br>
    </div>
</div>	

<?php ActiveForm::end(); ?>