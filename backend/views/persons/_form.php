<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\helpers\ArrayHelper;
?>

	<?php $form = ActiveForm::begin([
        'id' => 'persons-form',
        'errorSummaryCssClass' => 'error-summary alert alert-danger',
        'options' => ['class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data'],
        'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-sm-5\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-5\">{error}\n{hint}</div>",
        'labelOptions' => ['class' => 'col-sm-3 control-label'],
        ],
    ]); ?>

    <?php echo $form->errorSummary($model); ?>

    

    <?= $form->field($model, 'title', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'subtitle', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'tags', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>


    <?= $form->field($model, 'content')->widget(TinyMce::className(), [
        'options' => ['rows' => 15],
        'language' => 'ru',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste image responsivefilemanager filemanager"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image media",
            'external_filemanager_path' => '/plugins/responsivefilemanager/filemanager/',
            'filemanager_title' => 'Responsive Filemanager',
            'external_plugins' => [
                // Кнопка загрузки файла в диалоге вставки изображения.
                'filemanager' => '/plugins/responsivefilemanager/filemanager/plugin.min.js',
                // Кнопка загрузки файла в тулбаре.
                'responsivefilemanager' => '/plugins/responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js',
            ],
        ]
    ]);?>

    <?= $form->field($model, 'image_name', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->image_name) && file_exists(Yii::getAlias('@frontend/web/uploads/persons/').$model->image_name)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/persons/<? echo $model->image_name; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>


    <?= $form->field($model, 'seoTitle', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'seoKeywords', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'seoDescription', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea() ?>


    
    

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => 'btn btn-success']) ?><br>
        </div>
    </div>	

    <?php ActiveForm::end(); ?>

</div>