<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use frontend\components\NewsLeftMenuWidget;
use romi45\seoContent\components\SeoContentHelper;
use yii\widgets\ListView;
use yii\helpers\Url;
SeoContentHelper::registerAll($news_category);
?>
<?php
    $this->registerJs(
        '$(document).on(\'pjax:success\', function() {
            $(\'body\').scrollTo(\'#central-content\', 400);                
        });

        $(document).on(\'change\', \'#provider\', function(e) {
            $.pjax({
                timeout: 4000,
                url: $(\'#filter-form\').attr(\'action\'),
                container: \'#w0\',
                fragment: \'#w0\',
                data: {type: this.options[this.selectedIndex].value},
           });
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
        <h1>
            <?= $news_category->title; ?>
            <div class="pull-right">
                <?=Html::beginForm(Url::current(), 'GET', ['id'=>'filter-form']);?>
                     <?=Html::activeDropDownList($model_filter, 'type', \yii\helpers\Arrayhelper::map(\common\models\NewsMaterial::find()->asArray()->all(), 'id', 'title'), ['class' => 'form-control', 'id'=>'provider']); ?>
                <?=Html::endForm(); ?>
            </div>
        </h1>
        
        <div class="row news-list">
        <?php \yii\widgets\Pjax::begin(['id' => 'lists']) ?>
        <?= 
            ListView::widget([
                'dataProvider' => $listDataProvider,
                'itemView' => '_new_item',
                'layout' => "{items}<hr><div class=\"col-md-12 pagination-container\">{pager}<a class=\"pull-right news-arch\" data-pjax=\"0\" href=\"".Url::to(['/news/archive'])."\">".Yii::t('app', 'news.new_archive')."</a></div>",
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

