<?php
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\helpers\Url;
	use kartik\file\FileInput;
	use yii\helpers\ArrayHelper;
	use kartik\tree\TreeViewInput;
	use common\models\AdsCategories;
	$this->title = Yii::t('app', 'ads.create_ad');
?>

<div class="row">
    <div class="col-md-12 central-content" id="central-content">
        <h1><?= Yii::t('app', 'ads.create_ad') ?></h1>
    </div>
	
	<div class="col-md-9">

		<?php $form = ActiveForm::begin([
		    'id' => 'create-ad-form',
		    'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
		    'fieldConfig' => [
        		'template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>",
        		'labelOptions' => ['class' => 'col-sm-3 control-label'],
        	],
		]); ?>

		<?php echo $form->errorSummary($model); ?>

		<?= $form->field($model, 'type', ['template' => '<div class="col-sm-12">{input}</div>'])->radioList(
				['1' => Yii::t('app', 'ads.selling'), '2' => Yii::t('app', 'ads.buy')],
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

		<div id="affix_ad_information">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'ads.affix_ad_information') ?></h3>
			<?= $form->field($model, 'category_id')->widget(TreeViewInput::classname(),[
				    // single query fetch to render the tree
				    // use the Product model you have in the previous step
				    'query' => AdsCategories::find()->addOrderBy('root, lft'), 
				    'headingOptions'=>['label'=>''],
				    'name' => 'kv-product', // input name
				    'value' => '',     // values selected (comma separated for multiple select)
				    'asDropdown' => true,   // will render the tree input widget as a dropdown.
				    'multiple' => false,     // set to false if you do not need multiple selection
				    'fontAwesome' => true,  // render font awesome icons
				    'rootOptions' => [
				        'label'=>'<i class="fa fa-tree"></i>',  // custom root label
				        'class'=>'text-success'
				    ], 
				    //'options'=>['disabled' => true],
				]);
			?>

			<?= $form->field($model, 'title')->textInput() ?>

			<?= $form->field($model, 'description', ['template' => "{label}\n<div class=\"col-sm-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->widget(\dosamigos\tinymce\TinyMce::className(), [
		        'options' => ['rows' => 6],
		        'language' => 'ru',

		        'clientOptions' => [
		            'toolbar' => "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link",
		            'menubar' => false,
		            'statusbar' => false,
		        ]
		    ]);?>

		    <?= $form->field($model, 'price')->textInput() ?>

		</div>
		
		<div id="affix_photo_and_video">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'ads.affix_photo_and_video') ?></h3>
			<div class="upload-photo-text">
				<?= Yii::t('app', 'ads.you_can_upload_not_more') ?>
			</div>
			<?php
				echo $form->field($model, 'gallery[]', ['template' => "{label}\n<div class=\"col-sm-9 col-sm-offset-3\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>"])->widget(FileInput::classname(), [
					'language' => 'ru',
				    'options' => ['multiple' => true, 'accept' => 'image/*'],
				    'pluginOptions' => ['previewFileType' => 'image', 'uploadUrl' => "http://localhost/file-upload-single/1", 'uploadAsync' => false, 'showUpload' => false]
				    
				])->label(false);
			?>
		</div>

		<div id="affix_ad_contacts_information">
			<hr class="create-separator">
			<h3><?= Yii::t('app', 'ads.affix_ad_contacts_information') ?></h3>
			
			<?= $form->field($model, 'contacts_username')->textInput() ?>

			<?= $form->field($model, 'contacts_phone')->textInput() ?>

			<?= $form->field($model, 'contacts_email')->textInput() ?>

		</div>

		

		<div>
			<?= Yii::t('app', 'ads.you_must_agree_with_terms') ?> <a href=""><?= Yii::t('app', 'user.terms_of_use_link_text') ?></a>
		</div>

		<div class="submit-button">
			<?= Html::submitButton(Yii::t('app', 'ads.add_button'), ['class' => 'btn btn-blue']) ?>
		</div>

		<?php ActiveForm::end(); ?>
	</div>
	<div class="col-md-3">
		<nav class="bs-docs-sidebar hidden-print hidden-sm hidden-xs affix" > 
			<ul class="nav bs-docs-sidenav"> 
				<li class=""><a href="#affix_ad_information"><?= Yii::t('app', 'ads.affix_ad_information') ?></a><li>
				<li class=""><a href="#affix_photo_and_video"><?= Yii::t('app', 'ads.affix_photo_and_video') ?></a><li>
				<li class=""><a href="#affix_ad_contacts_information"><?= Yii::t('app', 'ads.affix_ad_contacts_information') ?></a><li>
			</li>
		</nav>
	</div>
	
</div>