<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use yii\helpers\ArrayHelper;
    use kartik\depdrop\DepDrop;
    use yii\helpers\Url;
?>

<?php $form = ActiveForm::begin([
    'id' => 'filter-form-1',
    'action' => Url::to(['/realty/search']),
]); ?>
<div class="row">
    <div class="col-xs-2">
        <?= $form->field($search, 'rlty_action')->dropDownList(\common\models\Ads::_getRltyActions(1)) ?>
    </div>
    
    <div class="col-xs-2">
        <?= $form->field($search, 'rooms_count')->radioList(
            ['1' => '1', '2' => '2', '3' => '3', '4' => '3+'],
            [
                'item' => function($index, $label, $name, $checked, $value) {

                    $return = '<div class="radio radio-primary radio-inline">';
                    if($checked) {
                        $return .= '<input checked id="rooms_count'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                    } else {
                        $return .= '<input id="rooms_count'.$index.'" type="radio" name="' . $name . '" value="' . $value . '">';
                    }
                    $return .= '<label for="rooms_count'.$index.'">'. ucwords($label) .'</label>';
                    $return .= '</div>';

                    return $return;
                }
            ]

        ) ?>
    </div>
    <div class="col-xs-2">
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'area_from')->textInput()->label(Yii::t('app', 'rlty.area')) ?>
        </div>
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'area_to')->textInput()->label(Yii::t('app', 'rlty.from_to')) ?>
        </div>
    </div>
    <div class="col-xs-2">
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'level_from')->textInput()->label(Yii::t('app', 'rlty.level')) ?>
        </div>
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'level_to')->textInput()->label(Yii::t('app', 'rlty.from_to')) ?>
        </div>
    </div>
    <div class="col-xs-2">
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'price_from')->textInput()->label(Yii::t('app', 'rlty.price')) ?>
        </div>
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'price_to')->textInput()->label(Yii::t('app', 'rlty.from_to')) ?>
        </div>
    </div>
    <div class="col-xs-2 search-button">
        <?= Html::submitButton(Yii::t('app', 'realty.search'), ['class' => 'btn btn-green']) ?>
    </div>
</div>
 <div class="row">
    <div class="col-xs-2">
        <?= $form->field($search, 'location_city')->dropDownList(Arrayhelper::map(\common\models\Locations::find()->asArray()->all(), 'id', 'location'), ['id' => 'rlty_city_id']) ?>
    </div>
    <div class="col-xs-2">
        <?= $form->field($search, 'location_raion')->widget(DepDrop::classname(), [
                    'options'=>['id'=>'rlty_raion_id'],
                    'pluginOptions'=>[
                        'depends'=>['rlty_city_id'],
                        'placeholder'=> Yii::t('app', 'rlty.select_raion'),
                        'url'=>Url::to(['/realty/getraion', 'selected' => $search->location_raion]),
                        'initialize' => true
                    ]
                ]);
        ?>
    </div>
    <div class="col-xs-2">
        <?= $form->field($search, 'location_street')->widget(DepDrop::classname(), [
                    'options'=>['id'=>'rlty_street_id'],
                    'pluginOptions'=>[
                        'depends'=>['rlty_city_id'],
                        'placeholder'=> Yii::t('app', 'rlty.select_street'),
                        'url'=>Url::to(['/realty/getstreet', 'selected' => $search->location_raion]),
                        'initialize' => true
                    ]
                ]);
        ?>
    </div>
    <div class="col-xs-2">
        <?= $form->field($search, 'house_type')->dropDownList(Arrayhelper::map(\common\models\Housetypes::find()->asArray()->all(), 'id', 'title')) ?>
    </div>
    <div class="col-xs-2">
        <?= $form->field($search, 'house_material')->dropDownList(Arrayhelper::map(\common\models\Housematerials::find()->asArray()->all(), 'id', 'title')) ?>
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