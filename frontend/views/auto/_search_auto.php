<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use yii\helpers\ArrayHelper;
    use kartik\depdrop\DepDrop;
    use yii\helpers\Url;
?>

<?php $form = ActiveForm::begin([
    'id' => 'filter-form-1',
    'action' => Url::to(['/auto/search']),
]); ?>
<div class="row">
    <div class="col-xs-2">
        <?= $form->field($search, 'tech_category')->dropDownList(Arrayhelper::map(\common\models\AutoCategory::find()->asArray()->all(), 'id', 'name'), ['id'=>'tech_category_id', 'prompt' => Yii::t('app', 'auto.select_auto_category')]); ?>
    </div>
    
    <div class="col-xs-2">
        <?= $form->field($search, 'tech_marka')->widget(DepDrop::classname(), [
            'options'=>['id'=>'tech_marka_id'],
            'pluginOptions'=>[
                'depends'=>['tech_category_id'],
                'placeholder'=> Yii::t('app', 'auto.select_mark'),
                'url'=>Url::to(['/auto/getmark', 'selected' => $search->tech_marka]),
                'initialize' => true
            ]
        ]);
        ?>
    </div>
    <div class="col-xs-2">
        <?= $form->field($search, 'tech_model')->widget(DepDrop::classname(), [
            'options'=>['id'=>'tech_model_id'],
            'pluginOptions'=>[
                'depends'=>['tech_category_id', 'tech_marka_id'],
                'placeholder'=> Yii::t('app', 'auto.select_model'),
                'url'=>Url::to(['/auto/getmodel', 'selected' => $search->tech_model])
            ]
        ]);
        ?>
    </div>
    <div class="col-xs-2">
       <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'year_from')->textInput()->label(Yii::t('app', 'auto.year')) ?>
        </div>
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'year_to')->textInput()->label(Yii::t('app', 'auto.from_to')) ?>
        </div>
    </div>
    <div class="col-xs-2">
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'price_from')->textInput()->label(Yii::t('app', 'auto.price')) ?>
        </div>
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'price_to')->textInput()->label(Yii::t('app', 'auto.from_to')) ?>
        </div>
    </div>
    <div class="col-xs-2 search-button">
        <?= Html::submitButton(Yii::t('app', 'auto.search'), ['class' => 'btn btn-green']) ?>
    </div>
</div>
 <div class="row">
    <div class="col-xs-2">
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'mileage_from')->textInput()->label(Yii::t('app', 'auto.mileage')) ?>
        </div>
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'mileage_to')->textInput()->label(Yii::t('app', 'auto.from_to')) ?>
        </div>
    </div>
    <div class="col-xs-2">
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'horsepower_from')->textInput()->label(Yii::t('app', 'auto.horsepower')) ?>
        </div>
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'horsepower_to')->textInput()->label(Yii::t('app', 'auto.from_to')) ?>
        </div>
    </div>
    <div class="col-xs-2">
        <?= $form->field($search, 'tech_fuel')->dropDownList(['1' => Yii::t('app', 'auto.fuel_petrol'), '2' => Yii::t('app', 'auto.fuel_diesel'), '3' => Yii::t('app', 'auto.fuel_gaz')], ['id'=>'tech_fuel', 'prompt' => Yii::t('app', 'auto.select_fuel')]) ?>
    </div>
    <div class="col-xs-2">
        <?= $form->field($search, 'tech_transmission')->dropDownList(['1' => Yii::t('app', 'auto.transmission_auto'), '2' => Yii::t('app', 'auto.transmission_mechanic')], ['id'=>'tech_transmission', 'prompt' => Yii::t('app', 'auto.select_transmission')]) ?>
    </div>
    <div class="col-xs-2">
        <?= $form->field($search, 'tech_gear')->dropDownList(['1' => Yii::t('app', 'auto.front_wheel_gear'), '2' => Yii::t('app', 'auto.back_wheel_gear'), '3' => Yii::t('app', 'auto.full_wheel_gear')], ['id'=>'tech_gear', 'prompt' => Yii::t('app', 'auto.select_gear')]) ?>
    </div>
    
    <div class="col-xs-2 reset-filter">
        <a href="<?= Url::to(['/auto/search']) ?>"><?= Yii::t('app', 'auto.reset_filter') ?></a>
    </div>
</div>
<?php ActiveForm::end(); ?>