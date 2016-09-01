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
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <?= NewsLeftMenuWidget::widget(['current_category' => $model->category->id]) ?>
            </div>
        </div>
    </div>
    <div class="col-md-9 central-content" id="central-content">
        <h1 class="page-title"><?= $model->title; ?></h1>
        <div class="new-detail-top-data"><?= Yii::$app->formatter->asDate($model->created_at); ?> <?= Yii::t('app', 'app.count_views') ?>: 200 <a href="/news/<?= $model->category->slug ?>"><?= $model->category->title; ?></a></div>
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
	    <hr>
	    
	    <?php
        use rmrevin\yii\module\Comments;

        echo Comments\widgets\CommentListWidget::widget([
            'entity' => 'news-'.$model->id, // type and id
        ]);
        ?>
        <hr>
        <h3 class="comments read-more"><?= Yii::t('app', 'app.read_more') ?></h3>
        <div class="row">
        <?php \yii\widgets\Pjax::begin() ?>
        <?= 
            ListView::widget([
                'dataProvider' => $listDataProvider,
                'itemView' => '_new_item_base',
                'layout' => "{items}<div style=\"clear: left;\"></div><hr><div class=\"col-md-12 pagination-container\">{pager}<a class=\"pull-right news-arch\" href=\"\">".Yii::t('app', 'news.new_archive')."</a></div>",
                'emptyText' => Yii::t('app', 'news.not_yet_been_added_to_this_category_news'),
                'emptyTextOptions' => ['class' => 'not_yet_been'],
                'pager' => [
                    'options' => [
                        'class' => 'pagination',
                    ],
                ]
            ]); 
        ?>
        <?php \yii\widgets\Pjax::end() ?>
        </div>
    </div>
</div>
<?= $this->render('/direct/bottom_block'); ?>
