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
        
        <div>
            <h1><?= Yii::t('app', 'ads.ads_title') ?></h1>
            <div class="tab-content filter-content-ads">
                <div role="tabpanel" class="tab-pane active with-padding" id="vacancies">
                    <?php $form = ActiveForm::begin([
                        'id' => 'filter-form-ads',
                        'action' => Url::to(['/ads/search']),
                        'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-sm-12\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>",
                            'labelOptions' => ['class' => 'col-sm-3 control-label'],
                        ],
                    ]); ?>
                    <div class="row">
                        <div class="col-xs-10">
                            <?= $form->field($search, 'text_query', ['template' => '{input}'])->textInput(['placeholder' => Yii::t('app', 'ads.placeholder_for_text_what_we_search')])->label(false) ?>
                        </div>
                        <div class="col-xs-2">
                            <?= Html::submitButton(Yii::t('app', 'ads.search'), ['class' => 'btn btn-green']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="list_categories row">
                
                <?php
                    if($list_categories) {
                        foreach ($list_categories as $category) {
                ?>
                    <div class="col-xs-4 item"><a href="<?= Url::to(['/ads/search', 'category_id' => $category->id]) ?>"><?= $category->name; ?></a></div>
                <?php
                        }
                    }
                ?>
            </div>
            <div class="row last_10_objects_ads">
                <?php
                    foreach($last_10_objects as $object) {
                ?>
                <div class="col-xs-3 object-item">
                    <a href="<?= Url::to(['/ads/view/'.$object->id]) ?>">
                        <img class="img-responsive" src="/uploads/other/<?= $object->_getImage() ?>">
                        <div class="price"><?= number_format($object->price, 0, ',', ' ' ); ?> руб.</div>
                        <div class="flat_type"><?= $object->title; ?></div>
                        <div class="flat_location"><?= $object->location->location ?></div>
                    </a>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>