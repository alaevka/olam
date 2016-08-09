<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use frontend\components\NewsLeftMenuWidget;
use romi45\seoContent\components\SeoContentHelper;
use yii\widgets\ListView;
SeoContentHelper::registerAll($news_category);
?>
<?php
    $this->registerJs(
        '$(document).on(\'pjax:success\', function() {
            $(\'body\').scrollTo(\'#central-content\', 400);                
        });'
    );
?>
<div class="row">
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <?= NewsLeftMenuWidget::widget(['current_category' => $news_category->id]) ?>
            </div>
        </div>
    </div>
    <div class="col-md-9 central-content" id="central-content">
        <h1><?= $news_category->title; ?></h1>
        <div class="row news-list">
        <?php \yii\widgets\Pjax::begin() ?>
        <?= 
            ListView::widget([
                'dataProvider' => $listDataProvider,
                'itemView' => '_new_item',
                'layout' => "{items}<hr><div class=\"col-md-12 pagination-container\">{pager}<a class=\"pull-right news-arch\" href=\"\">".Yii::t('app', 'news.new_archive')."</a></div>",
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
<div class="row">
    <div class="col-md-12 direct-block"> 
        <img src="/img/temp/direct.jpg" class="img-responsive">
    </div>
</div>

