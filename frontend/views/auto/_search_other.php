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
    <div class="col-xs-5">
        <?= $form->field($search, 'other_category')->dropDownList(Auto::getOtherCategoryList(), ['id'=>'other_category']); ?>
    </div>
    <div class="col-xs-5">
        <?= $form->field($search, 'title')->textInput()->label(Yii::t('app', 'auto.search_phrase')); ?>
    </div>
    <div class="col-xs-2 search-button">
        <?= Html::submitButton(Yii::t('app', 'auto.search'), ['class' => 'btn btn-green']) ?>
    </div>
</div>
 <div class="row">
    <div class="col-xs-5">
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'price_from')->textInput()->label(Yii::t('app', 'auto.price')) ?>
        </div>
        <div class="col-xs-6 small-padding">
            <?= $form->field($search, 'price_to')->textInput()->label(Yii::t('app', 'auto.from_to')) ?>
        </div>
    </div>
    
    <div class="col-xs-5">
        
    </div>
    
    <div class="col-xs-2 reset-filter">
        <a href="<?= Url::to(['/auto/search']) ?>"><?= Yii::t('app', 'auto.reset_filter') ?></a>
    </div>
</div>
<?php ActiveForm::end(); ?>