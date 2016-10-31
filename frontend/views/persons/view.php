<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use frontend\components\NewsLeftMenuWidget;
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
        <div class="new-detail-top-data"><?= Yii::$app->formatter->asDate($model->created_at); ?> <?= Yii::t('app', 'app.count_views') ?>: 200 </div>
        <div class="row new-detail-img">
	        <div class="col-md-1">
	        	<img src="/img/temp/share_vertical.png" class="img-responsive">
	        </div>
	        <div class="col-md-11">
	        	<img class="img-responsive" src="/uploads/persons/<?= $model->image_name; ?>">
                <div class="caption bottom-new-post-content" style="width: 70%;">
                    <div class="bottom-new-post-content-category"><?= $model->tags ?></div>
                    <div class="bottom-new-post-content-title"><?= $model->title ?></div>
                    <div class="bottom-new-post-content-subtitle"><?= $model->subtitle ?></div>
                </div>
	        </div>
	    </div>
	    <div class="row new-content">
	    	<div class="col-md-12">
	    		<?= $model->content; ?>
	    	</div>
	    </div>
	    <hr>
	    
	    <?php
        use rmrevin\yii\module\Comments;

        echo Comments\widgets\CommentListWidget::widget([
            'entity' => 'persons-'.$model->id, // type and id
        ]);
        ?>
        <hr>
    </div>
</div>
<?= $this->render('/direct/bottom_block'); ?>
