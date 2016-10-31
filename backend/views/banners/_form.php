<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\helpers\ArrayHelper;
?>

    <div class="alert alert-info"><strong>Внимание!</strong> Вы можете указать либо код баннера либо зарузить его изображение и установить ссылку на него. Приоритетным является код баннера.</div>


	<?php $form = ActiveForm::begin([
        'id' => 'banners-form',
        'errorSummaryCssClass' => 'error-summary alert alert-danger',
        'options' => ['class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data'],
        'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-sm-5\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-5\">{error}\n{hint}</div>",
        'labelOptions' => ['class' => 'col-sm-3 control-label'],
        ],
    ]); ?>

    <?php echo $form->errorSummary($model); ?>

    <legend>Баннеры главной страницы</legend>


    <?= $form->field($model, 'main_page1_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'main_page1_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->main_page1_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->main_page1_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->main_page1_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'main_page1_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'main_page2_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'main_page2_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->main_page2_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->main_page2_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->main_page2_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'main_page2_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'main_page3_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'main_page3_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->main_page3_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->main_page3_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->main_page3_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'main_page3_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'main_page4_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'main_page4_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->main_page4_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->main_page4_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->main_page4_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>
    <?= $form->field($model, 'main_page4_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>



    <legend>Баннеры страницы новостей</legend>


    <?= $form->field($model, 'news1_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'news1_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->news1_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->news1_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->news1_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'news1_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'news2_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'news2_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->news2_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->news2_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->news2_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'news2_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'news3_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'news3_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->news3_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->news3_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->news3_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'news3_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'news4_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'news4_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->news4_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->news4_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->news4_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>
    <?= $form->field($model, 'news4_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>


    <legend>Баннеры страницы недвижимость</legend>


    <?= $form->field($model, 'realty1_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'realty1_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->realty1_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->realty1_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->realty1_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'realty1_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'realty2_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'realty2_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->realty2_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->realty2_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->realty2_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'realty2_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'realty3_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'realty3_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->realty3_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->realty3_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->realty3_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>
    <?= $form->field($model, 'realty3_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'realty4_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'realty4_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->realty4_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->realty4_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->realty4_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>
    <?= $form->field($model, 'realty4_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>


    <legend>Баннеры страницы авто</legend>


    <?= $form->field($model, 'auto1_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'auto1_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->auto1_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->auto1_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->auto1_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'auto1_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'auto2_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'auto2_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->auto2_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->auto2_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->auto2_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>
    <?= $form->field($model, 'auto2_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'auto3_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'auto3_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->auto3_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->auto3_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->auto3_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'auto3_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'auto4_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'auto4_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->auto4_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->auto4_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->auto4_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'auto4_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>


    <legend>Баннеры страницы работа</legend>


    <?= $form->field($model, 'work1_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'work1_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->work1_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->work1_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->work1_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'work1_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'work2_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'work2_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->work2_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->work2_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->work2_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'work2_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'work3_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'work3_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->work3_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->work3_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->work3_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'work3_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'work4_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'work4_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->work4_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->work4_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->work4_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'work4_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>



    <legend>Баннеры страницы объявления</legend>


    <?= $form->field($model, 'ads1_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'ads1_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->ads1_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->ads1_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->ads1_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'ads1_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'ads2_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'ads2_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->ads2_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->ads2_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->ads2_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'ads2_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'ads3_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'ads3_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->ads3_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->ads3_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->ads3_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'ads3_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'ads4_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'ads4_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->ads4_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->ads4_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->ads4_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'ads4_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>


        
     <legend>Баннеры страницы афиша</legend>


    <?= $form->field($model, 'afisha1_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'afisha1_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->afisha1_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->afisha1_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->afisha1_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'afisha1_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'afisha2_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'afisha2_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->afisha2_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->afisha2_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->afisha2_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'afisha2_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'afisha3_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'afisha3_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->afisha3_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->afisha3_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->afisha3_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'afisha3_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'afisha4_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'afisha4_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->afisha4_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->afisha4_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->afisha4_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'afisha4_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>


     <legend>Баннеры страницы ТВ</legend>


    <?= $form->field($model, 'tv1_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'tv1_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->tv1_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->tv1_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->tv1_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'tv1_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'tv2_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'tv2_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->tv2_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->tv2_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->tv2_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'tv2_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'tv3_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'tv3_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->tv3_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->tv3_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->tv3_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'tv3_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'tv4_text', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textArea(['rows' => 6]) ?>


    <?= $form->field($model, 'tv4_image', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->fileInput() ?>


    <?php if(!empty($model->tv4_image) && file_exists(Yii::getAlias('@frontend/web/uploads/banners/').$model->tv4_image)) { ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="questions-question_text">Текущее изображение</label>
        <div class="col-sm-5">
            <a href="#" class="thumbnail" style="width: 210px;">
                <img src="<?= Yii::$app->params['frontend_url'] ?>/uploads/banners/<? echo $model->tv4_image; ?>" />
            </a>    
        </div>
    </div>
    <?php } ?>

    <?= $form->field($model, 'tv4_image_url', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>




    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => 'btn btn-success']) ?><br>
        </div>
    </div>  

    <?php ActiveForm::end(); ?>

</div>