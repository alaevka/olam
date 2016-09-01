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
                <?php $form = ActiveForm::begin([
                    'id' => 'filter-form-1',
                ]); ?>
                <div class="row">
                    <div class="col-xs-2">
                        <?= $form->field($search, 'rlty_action')->dropDownList(\common\models\Ads::_getRltyActions()) ?>
                    </div>
                    <div class="col-xs-2">
                        <?= $form->field($search, 'location_raion')->dropDownList(\common\models\Ads::_getRealtyLocationRaion()) ?>
                    </div>
                    <div class="col-xs-2">
                        <?= $form->field($search, 'rooms_count')->radioList(
                            ['1' => '1', '2' => '2', '3' => '3', '4' => '3+'],
                            [
                                'item' => function($index, $label, $name, $checked, $value) {

                                    $return = '<div class="radio radio-primary radio-inline">';
                                    $return .= '<input id="rooms_count'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                                    $return .= '<label for="rooms_count'.$index.'">'. ucwords($label) .'</label>';
                                    $return .= '</div>';

                                    return $return;
                                }
                            ]

                        ) ?>
                    </div>
                    <div class="col-xs-2">
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'area_from')->textInput()->label('Area') ?>
                        </div>
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'area_to')->textInput()->label('from/to') ?>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'price_from')->textInput()->label('Price') ?>
                        </div>
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'price_to')->textInput()->label('from/to') ?>
                        </div>
                    </div>
                    <div class="col-xs-2 search-button">
                        <?= Html::submitButton(Yii::t('app', 'realty.search'), ['class' => 'btn btn-green']) ?>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-xs-2">
                        <?= $form->field($search, 'location_city')->dropDownList(Arrayhelper::map(\common\models\Locations::find()->asArray()->all(), 'id', 'location')) ?>
                    </div>
                    <div class="col-xs-2">
                        <?= $form->field($search, 'house_type')->dropDownList(Arrayhelper::map(\common\models\Housetypes::find()->asArray()->all(), 'id', 'title')) ?>
                    </div>
                    <div class="col-xs-2">
                        <?= $form->field($search, 'house_material')->dropDownList(Arrayhelper::map(\common\models\Housematerials::find()->asArray()->all(), 'id', 'title')) ?>
                    </div>
                    <div class="col-xs-2">
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'level_from')->textInput()->label('Level') ?>
                        </div>
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'level_to')->textInput()->label('from/to') ?>
                        </div>
                    </div>
                    <div class="col-xs-2 checkbox-in-filter">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox2" class="styled" type="checkbox">
                            <label for="checkbox2">
                                <?= Yii::t('app', 'rlty.is_new_building') ?>
                            </label>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="rent">
                <?php $form = ActiveForm::begin([
                    'id' => 'filter-form-1',
                ]); ?>
                <div class="row">
                    <div class="col-xs-2">
                        <?= $form->field($search, 'rlty_action')->dropDownList(\common\models\Ads::_getRltyActions()) ?>
                    </div>
                    <div class="col-xs-2">
                        <?= $form->field($search, 'location_raion')->dropDownList(\common\models\Ads::_getRealtyLocationRaion()) ?>
                    </div>
                    <div class="col-xs-2">
                        <?= $form->field($search, 'rooms_count')->radioList(
                            ['1' => '1', '2' => '2', '3' => '3', '4' => '3+'],
                            [
                                'item' => function($index, $label, $name, $checked, $value) {

                                    $return = '<div class="radio radio-primary radio-inline">';
                                    $return .= '<input id="rooms_count'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                                    $return .= '<label for="rooms_count'.$index.'">'. ucwords($label) .'</label>';
                                    $return .= '</div>';

                                    return $return;
                                }
                            ]

                        ) ?>
                    </div>
                    <div class="col-xs-2">
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'area_from')->textInput()->label('Area') ?>
                        </div>
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'area_to')->textInput()->label('from/to') ?>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'price_from')->textInput()->label('Price') ?>
                        </div>
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'price_to')->textInput()->label('from/to') ?>
                        </div>
                    </div>
                    <div class="col-xs-2 search-button">
                        <?= Html::submitButton(Yii::t('app', 'realty.search'), ['class' => 'btn btn-green']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="commercial">
                <?php $form = ActiveForm::begin([
                    'id' => 'filter-form-1',
                ]); ?>
                <div class="row">
                    <div class="col-xs-2">
                        <?= $form->field($search, 'rlty_action')->dropDownList(\common\models\Ads::_getRltyActions()) ?>
                    </div>
                    <div class="col-xs-2">
                        <?= $form->field($search, 'location_raion')->dropDownList(\common\models\Ads::_getRealtyLocationRaion()) ?>
                    </div>
                    <div class="col-xs-2">
                        <?= $form->field($search, 'rooms_count')->radioList(
                            ['1' => '1', '2' => '2', '3' => '3', '4' => '3+'],
                            [
                                'item' => function($index, $label, $name, $checked, $value) {

                                    $return = '<div class="radio radio-primary radio-inline">';
                                    $return .= '<input id="rooms_count'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                                    $return .= '<label for="rooms_count'.$index.'">'. ucwords($label) .'</label>';
                                    $return .= '</div>';

                                    return $return;
                                }
                            ]

                        ) ?>
                    </div>
                    <div class="col-xs-2">
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'area_from')->textInput()->label('Area') ?>
                        </div>
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'area_to')->textInput()->label('from/to') ?>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'price_from')->textInput()->label('Price') ?>
                        </div>
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'price_to')->textInput()->label('from/to') ?>
                        </div>
                    </div>
                    <div class="col-xs-2 search-button">
                        <?= Html::submitButton(Yii::t('app', 'realty.search'), ['class' => 'btn btn-green']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="houses_cottages">
                <?php $form = ActiveForm::begin([
                    'id' => 'filter-form-1',
                ]); ?>
                <div class="row">
                    <div class="col-xs-2">
                        <?= $form->field($search, 'rlty_action')->dropDownList(\common\models\Ads::_getRltyActions()) ?>
                    </div>
                    <div class="col-xs-2">
                        <?= $form->field($search, 'location_raion')->dropDownList(\common\models\Ads::_getRealtyLocationRaion()) ?>
                    </div>
                    <div class="col-xs-2">
                        <?= $form->field($search, 'rooms_count')->radioList(
                            ['1' => '1', '2' => '2', '3' => '3', '4' => '3+'],
                            [
                                'item' => function($index, $label, $name, $checked, $value) {

                                    $return = '<div class="radio radio-primary radio-inline">';
                                    $return .= '<input id="rooms_count'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                                    $return .= '<label for="rooms_count'.$index.'">'. ucwords($label) .'</label>';
                                    $return .= '</div>';

                                    return $return;
                                }
                            ]

                        ) ?>
                    </div>
                    <div class="col-xs-2">
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'area_from')->textInput()->label('Area') ?>
                        </div>
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'area_to')->textInput()->label('from/to') ?>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'price_from')->textInput()->label('Price') ?>
                        </div>
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'price_to')->textInput()->label('from/to') ?>
                        </div>
                    </div>
                    <div class="col-xs-2 search-button">
                        <?= Html::submitButton(Yii::t('app', 'realty.search'), ['class' => 'btn btn-green']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="garages">
                <?php $form = ActiveForm::begin([
                    'id' => 'filter-form-1',
                ]); ?>
                <div class="row">
                    <div class="col-xs-2">
                        <?= $form->field($search, 'rlty_action')->dropDownList(\common\models\Ads::_getRltyActions()) ?>
                    </div>
                    <div class="col-xs-2">
                        <?= $form->field($search, 'location_raion')->dropDownList(\common\models\Ads::_getRealtyLocationRaion()) ?>
                    </div>
                    <div class="col-xs-2">
                        <?= $form->field($search, 'rooms_count')->radioList(
                            ['1' => '1', '2' => '2', '3' => '3', '4' => '3+'],
                            [
                                'item' => function($index, $label, $name, $checked, $value) {

                                    $return = '<div class="radio radio-primary radio-inline">';
                                    $return .= '<input id="rooms_count'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                                    $return .= '<label for="rooms_count'.$index.'">'. ucwords($label) .'</label>';
                                    $return .= '</div>';

                                    return $return;
                                }
                            ]

                        ) ?>
                    </div>
                    <div class="col-xs-2">
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'area_from')->textInput()->label('Area') ?>
                        </div>
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'area_to')->textInput()->label('from/to') ?>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'price_from')->textInput()->label('Price') ?>
                        </div>
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'price_to')->textInput()->label('from/to') ?>
                        </div>
                    </div>
                    <div class="col-xs-2 search-button">
                        <?= Html::submitButton(Yii::t('app', 'realty.search'), ['class' => 'btn btn-green']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="land">
                <?php $form = ActiveForm::begin([
                    'id' => 'filter-form-1',
                ]); ?>
                <div class="row">
                    <div class="col-xs-2">
                        <?= $form->field($search, 'rlty_action')->dropDownList(\common\models\Ads::_getRltyActions()) ?>
                    </div>
                    <div class="col-xs-2">
                        <?= $form->field($search, 'location_raion')->dropDownList(\common\models\Ads::_getRealtyLocationRaion()) ?>
                    </div>
                    <div class="col-xs-2">
                        <?= $form->field($search, 'rooms_count')->radioList(
                            ['1' => '1', '2' => '2', '3' => '3', '4' => '3+'],
                            [
                                'item' => function($index, $label, $name, $checked, $value) {

                                    $return = '<div class="radio radio-primary radio-inline">';
                                    $return .= '<input id="rooms_count'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                                    $return .= '<label for="rooms_count'.$index.'">'. ucwords($label) .'</label>';
                                    $return .= '</div>';

                                    return $return;
                                }
                            ]

                        ) ?>
                    </div>
                    <div class="col-xs-2">
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'area_from')->textInput()->label('Area') ?>
                        </div>
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'area_to')->textInput()->label('from/to') ?>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'price_from')->textInput()->label('Price') ?>
                        </div>
                        <div class="col-xs-6 small-padding">
                            <?= $form->field($search, 'price_to')->textInput()->label('from/to') ?>
                        </div>
                    </div>
                    <div class="col-xs-2 search-button">
                        <?= Html::submitButton(Yii::t('app', 'realty.search'), ['class' => 'btn btn-green']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        
        <div class="header-page">
            <h1><?= Yii::t('app', 'top_mnu.realty') ?></h1>
        </div>
        <div class="row last_10_objects">
            <?php
                foreach($last_10_objects as $object) {
            ?>
            <div class="col-md-3 object-item">
                <a href="<?= Url::to(['/realty/view/', 'id' => $object->id]) ?>">
                    <img class="img-responsive" src="/uploads/objects/<?= $object->_getImage() ?>">
                    <div class="price"><?= number_format($object->price, 0, ',', ' ' ); ?> руб.</div>
                    <div class="flat_type"><?= $object->_getFlatTypeObject() ?></div>
                    <div class="flat_location"><?= $object->location->location.', '.$object->location_raion ?></div>
                </a>
            </div>
            <?php } ?>
            
        </div>
        <div class="hot-objects">
            <h3><?= Yii::t('app', 'rlty.hot_objects') ?></h3>
            <div id="myCarousel" class="carousel slide">
                <!-- Carousel items -->
                <div class="carousel-inner">
                    
                    <div class="item active">
                        <div class="row">
                            <?php 
                                $i = 1;
                                foreach($hot_objects as $object) {

                            ?>
                            <div class="col-sm-3 object-item">
                                <a href="<?= Url::to(['/realty/view/', 'id' => $object->id]) ?>">
                                    <img class="img-responsive" src="/uploads/objects/<?= $object->_getImage() ?>">
                                    <div class="price"><?= number_format($object->price, 0, ',', ' ' ); ?> руб.</div>
                                    <div class="flat_type"><?= $object->_getFlatTypeObject() ?></div>
                                    <div class="flat_location"><?= $object->location->location.', '.$object->location_raion ?></div>
                                </a>
                            </div>

                            <?php 
                                if($i%4 == 0 && $i != 12) {
                            ?>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">    
                            <?php } $i++; } ?>
                        </div>
                        <!--/row-->
                    </div>
                    
                </div>
                <!--/carousel-inner--> <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>

                <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
            </div>
            <!--/myCarousel-->
        </div>
        <div class="list-realty">
            <h1><?= Yii::t('app', 'rlty.all_variants') ?></h1>
            
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