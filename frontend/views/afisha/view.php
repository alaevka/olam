<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use romi45\seoContent\components\SeoContentHelper;
use yii\widgets\ListView;

SeoContentHelper::registerAll($model);
?>
<?php
    $this->registerJs(
        '$(document).on(\'pjax:success\', function() {
            $(\'body\').scrollTo(\'.read-more\', 400);                
        });'
    );
?>
<div class="row">
    <div class="col-md-12 central-content" id="central-content">
        <h1 class="page-title"><?= $model->title; ?></h1>
        <div class="new-detail-top-data"><?= Yii::$app->formatter->asDate($model->created_at); ?> <?= Yii::t('app', 'app.count_views') ?>: 200 <a href="/afisha/category/<?= $model->category_id ?>"><?= $model->_getCategoryId(); ?></a></div>
        <div class="row new-detail-img">
	        <div class="col-md-1">
	        	<img src="/img/temp/share_vertical.png" class="img-responsive">
	        </div>
	        <div class="col-md-11">
	        	<img class="img-responsive" src="<?= Yii::$app->params['uploadsLink'] ?>/<?= $model->image_name; ?>">
	        </div>
	    </div>
	    <div class="row new-content">
	    	<div class="col-md-12">
	    		<?= $model->content; ?>
	    	</div>
	    </div>
        <?php if($model->category_id == 2 || $model->category_id == 3 || $model->category_id == 5 || $model->category_id == 6) { ?>
        <hr>
        <div class="row">
            <div class="col-md-12" style="font-weight: bold; color: #9c9999;">
                <div>Адрес: <?= $model->address ?></div>
                <div>Телефон(ы): <?= $model->phone ?></div>
                <div>Время работы: <?= $model->work_time ?></div>
                <div>Варианты оплаты: <?= $model->pay_type ?></div>
            </div>
        </div>
        <?php } ?>
	    <hr>
	    
        <?php
        use rmrevin\yii\module\Comments;

        echo Comments\widgets\CommentListWidget::widget([
            'entity' => 'afisha-'.$model->id, // type and id
        ]);
        ?>
        <hr>
    </div>
</div>
<?= $this->render('/direct/bottom_block'); ?>
