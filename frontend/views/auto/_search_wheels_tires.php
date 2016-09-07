<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use yii\helpers\ArrayHelper;
    use kartik\depdrop\DepDrop;
    use yii\helpers\Url;
    use common\models\Auto;
?>

<?php $form = ActiveForm::begin([
    'id' => 'filter-form-2',
    'action' => Url::to(['/auto/search']),
]); ?>
<div class="row">
    <div class="col-xs-2">
        <?= $form->field($search, 'wheel_tire_category')->dropDownList(['1' => Yii::t('app', 'auto.wheels'), '2' => Yii::t('app', 'auto.tires')], ['id'=>'wheel_tire_category']); ?>
        <?php
            $script = '
                $(document).ready(function() {
                    $("#wheel_tire_category").change(function() {
                        if($(this).val() == 1 || $(this).val() == "") {
                            $(".for_wheels_block").show();
                            $(".for_tires_block").hide();
                        }
                        if($(this).val() == 2) {
                            $(".for_wheels_block").hide();
                            $(".for_tires_block").show();
                        }
                    });
                });
            ';
            $this->registerJs($script, yii\web\View::POS_READY);
        ?>
    </div>
    <div class="col-xs-2">
        <?= $form->field($search, 'wheel_tyre_radius')->dropDownList(Auto::getHeightList(), ['prompt' => Yii::t('app', 'auto.select_radius')]); ?>
    </div>
    <div class="col-xs-2 for_wheels_block">
        <?= $form->field($search, 'wheel_manufacturer')->dropDownList(Auto::getWheelManufacturer(), ['prompt' => Yii::t('app', 'auto.select_manufacturer')]); ?>
    </div>
    <div class="col-xs-2 for_wheels_block">
        <?= $form->field($search, 'wheel_dia')->dropDownList(Auto::getWheelDia(), ['prompt' => Yii::t('app', 'auto.select_wheel_dia')]); ?>
    </div>
    <div class="col-xs-2 for_wheels_block">
        <?= $form->field($search, 'wheel_pcd')->dropDownList(Auto::getWheelPcd(), ['prompt' => Yii::t('app', 'auto.select_wheel_pcd')]); ?>
    </div>
    <div class="col-xs-2 for_tires_block">
        <?= $form->field($search, 'tire_manufacturer')->dropDownList(Auto::getTireManufacturer(), ['prompt' => Yii::t('app', 'auto.select_manufacturer')]); ?>
    </div>
    <div class="col-xs-2 for_tires_block">
        <?= $form->field($search, 'tire_width')->dropDownList(Auto::getWidthList(), ['prompt' => Yii::t('app', 'auto.select_tire_width')]); ?>   
    </div>
    <div class="col-xs-2 for_tires_block">
        <?= $form->field($search, 'tire_height')->dropDownList(Auto::getHeightTireList(), ['prompt' => Yii::t('app', 'auto.select_tire_height')]); ?>  
    </div>

    <div class="col-xs-2 search-button">
        <?= Html::submitButton(Yii::t('app', 'auto.search'), ['class' => 'btn btn-green']) ?>
    </div>
</div>
 <div class="row">
    <div class="col-xs-2 for_wheels_block">
        <?= $form->field($search, 'wheel_width')->dropDownList(Auto::getWheelWidth(), ['prompt' => Yii::t('app', 'auto.select_wheel_width')]); ?>
    </div>
    <div class="col-xs-2 for_wheels_block">
        <?= $form->field($search, 'wheel_et')->dropDownList(Auto::getWheelEt(), ['prompt' => Yii::t('app', 'auto.select_wheel_et')]); ?>
    </div>
    <div class="col-xs-2 for_wheels_block">
        <?= $form->field($search, 'wheel_type')->dropDownList(Auto::getWheelType(), ['prompt' => Yii::t('app', 'auto.select_wheel_type')]); ?>
    </div>
    <div class="col-xs-2 for_tires_block">
        <?= $form->field($search, 'tire_type')->dropDownList(Auto::getTireType(), ['prompt' => Yii::t('app', 'auto.select_tire_type')]); ?>      
    </div>
    <div class="col-xs-2 for_tires_block">
        <?= $form->field($search, 'tire_speed_index')->dropDownList(Auto::getSpeedIndexList(), ['prompt' => Yii::t('app', 'auto.select_tire_speed_index')]); ?>
    </div>
    <div class="col-xs-2 for_tires_block">
        <?= $form->field($search, 'tire_season')->dropDownList(Auto::getSeasonesList(), ['id'=>'tire_season', 'prompt' => Yii::t('app', 'auto.select_season')]); ?>
    </div>



    <div class="col-xs-2">
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'price_from')->textInput()->label(Yii::t('app', 'auto.price')) ?>
        </div>
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'price_to')->textInput()->label(Yii::t('app', 'auto.from_to')) ?>
        </div>
    </div>
    <div class="col-xs-2">
        
    </div>
    
    <div class="col-xs-2 reset-filter">
        <a href="<?= Url::to(['/auto/search']) ?>"><?= Yii::t('app', 'auto.reset_filter') ?></a>
    </div>
</div>
<?php ActiveForm::end(); ?>