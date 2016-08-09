<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use frontend\components\NewsLeftMenuWidget;
use yii\widgets\ListView;
use yii\helpers\Url;

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
                <?= NewsLeftMenuWidget::widget() ?>
            </div>
        </div>
    </div>
    <div class="col-md-9 central-content" id="central-content">
        <h1>
            <?= Yii::t('app', 'news.new_archive') ?>
            
            <a href="#" class="pull-right arch_year">2014</a>
            <a href="#" class="pull-right arch_year">2015</a>
            <a href="#" class="pull-right arch_year">2016</a>
            <a href="#" class="pull-right arch_year"><?= Yii::t('app', 'news.all_time') ?></a>
        </h1>
        <div class="row news-list">
        <?php \yii\widgets\Pjax::begin() ?>
        <?= 
            ListView::widget([
                'dataProvider' => $listDataProvider,
                'itemView' => '_new_item_titles',
                'layout' => "{items}<hr><div class=\"col-md-12 pagination-container\">{pager}</div>",
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

