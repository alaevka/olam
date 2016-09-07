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
          <li role="presentation" class="active"><a href="#residential" role="tab" data-toggle="tab"><?= Yii::t('app', 'rlty.residential') ?></a></li>
          <li role="presentation"><a href="#rent" role="tab" data-toggle="tab"><?= Yii::t('app', 'rlty.rent') ?></a></li>
          <li role="presentation"><a href="#commercial" role="tab" data-toggle="tab"><?= Yii::t('app', 'rlty.commercial') ?></a></li>
          <li role="presentation"><a href="#houses_cottages" role="tab" data-toggle="tab"><?= Yii::t('app', 'rlty.houses_cottages') ?></a></li>
          <li role="presentation"><a href="#garages" role="tab" data-toggle="tab"><?= Yii::t('app', 'rlty.garages') ?></a></li>
          <li role="presentation"><a href="#land" role="tab" data-toggle="tab"><?= Yii::t('app', 'rlty.land') ?></a></li>
        </ul>
        <div class="tab-content filter-content">
            <div role="tabpanel" class="tab-pane active" id="residential">
                <?= $this->render('_search_residential', ['search' => $search]); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="rent">
                <?= $this->render('_search_rent', ['search' => $search]); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="commercial">
                <?= $this->render('_search_commercial', ['search' => $search]); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="houses_cottages">
                <?= $this->render('_search_houses_cottages', ['search' => $search]); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="garages">
                <?= $this->render('_search_garages', ['search' => $search]); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="land">
                <?= $this->render('_search_land', ['search' => $search]); ?>
            </div>
        </div>
        
        <div class="list-realty">
            <h1><?= Yii::t('app', 'rlty.search_results') ?></h1>
            
            <ul class="nav nav-tabs filter-tabs">
              <li role="presentation" class="active"><a href="#table" role="tab" data-toggle="tab"><?= Yii::t('app', 'rlty.table_view') ?></a></li>
              <li role="presentation"><a href="#map" role="tab" data-toggle="tab"><?= Yii::t('app', 'rlty.map_view') ?></a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="table">
                    <?php
                        $header = '
                            <div class="col-md-12">
                            <div class="row header-list">
                                <div class="col-xs-1">'.Yii::t('app', 'rlty.date').'</div>
                                <div class="col-xs-1">'.Yii::t('app', 'rlty.photo').'</div>
                                <div class="col-xs-1">'.Yii::t('app', 'rlty.rooms').'</div>
                                <div class="col-xs-1">'.Yii::t('app', 'rlty.city').'</div>
                                <div class="col-xs-1">'.Yii::t('app', 'rlty.raion').'</div>
                                <div class="col-xs-1">'.Yii::t('app', 'rlty.street').'</div>
                                <div class="col-xs-1">'.Yii::t('app', 'rlty.house').'</div>
                                <div class="col-xs-1">'.Yii::t('app', 'rlty.area').'</div>
                                <div class="col-xs-1">'.Yii::t('app', 'rlty.level').'</div>
                                <div class="col-xs-2">'.Yii::t('app', 'rlty.price').'</div>
                                <div class="col-xs-1">'.Yii::t('app', 'rlty.username').'</div>
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
                <div role="tabpanel" class="tab-pane" id="map">
                    <div class="row">
                        <div class="col-md-12" style="min-height: 700px;">google map</div>
                    </div> 
                </div>
                
            </div>
        </div>
    </div>
</div>
<?= $this->render('/direct/bottom_block'); ?>