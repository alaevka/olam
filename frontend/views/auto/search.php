<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\web\View;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<div class="row">
    <div class="col-md-12 central-content" id="central-content">
        <ul class="nav nav-tabs nav-justified filter-tabs">
          <li role="presentation" class="active"><a href="#auto" role="tab" data-toggle="tab"><?= Yii::t('app', 'auto.auto') ?></a></li>
          <li role="presentation"><a href="#wheels_tires" role="tab" data-toggle="tab"><?= Yii::t('app', 'rlty.wheels_tires') ?></a></li>
          <li role="presentation"><a href="#other" role="tab" data-toggle="tab"><?= Yii::t('app', 'rlty.other') ?></a></li>
        </ul>
        <div class="tab-content filter-content">
            <div role="tabpanel" class="tab-pane active" id="auto">
                <?= $this->render('_search_auto', ['search' => $search]); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="wheels_tires">
                <?= $this->render('_search_wheels_tires', ['search' => $search]); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="other">
                <?= $this->render('_search_other', ['search' => $search]); ?>
            </div>
        </div>
        <div class="list-auto">
            <h1><?= Yii::t('app', 'auto.search_results') ?></h1>
            <?php
                $header = '
                    <div class="col-md-12">
                        <div class="row header-list">
                            <div class="col-xs-1">'.Yii::t('app', 'rlty.date').'</div>
                            <div class="col-xs-2">'.Yii::t('app', 'rlty.photo').'</div>
                            <div class="col-xs-2">'.Yii::t('app', 'rlty.mark_model').'</div>
                            <div class="col-xs-1">'.Yii::t('app', 'rlty.year').'</div>
                            <div class="col-xs-2">'.Yii::t('app', 'rlty.engine').'</div>
                            <div class="col-xs-2">'.Yii::t('app', 'rlty.mileage').'</div>
                            <div class="col-xs-2">'.Yii::t('app', 'rlty.price_city').'</div>
                        </div>
                    </div>
                ';
            ?>
            <?php \yii\widgets\Pjax::begin() ?>

            <?= 
                ListView::widget([
                    'dataProvider' => $listDataProvider,
                    'itemView' => '_object_item',
                    'layout' => $header."{items}<hr><div class=\"col-md-12 pagination-container\">{pager}</div>",
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