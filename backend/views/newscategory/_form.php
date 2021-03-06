<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

	<?php $form = ActiveForm::begin([
        'id' => 'newscategory-form',
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