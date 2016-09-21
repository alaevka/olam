<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\helpers\ArrayHelper;
    use yii\widgets\ListView;
?>

<div class="row">
    <div class="col-md-12 central-content" id="central-content">
        <div>
            <h1><?= Yii::t('app', 'ads.search_results') ?></h1>
            <?php $form = ActiveForm::begin([
                'id' => 'filter-form-ads',
                'action' => Url::to(['/ads/search']),
                'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>",
                    'labelOptions' => ['class' => 'col-sm-3 control-label'],
                ],
            ]); ?>
            <div class="tab-content filter-content-work left-corner-filter">
                <div role="tabpanel" class="tab-pane active with-padding">
                    
                    <div class="row">
                        <div class="col-xs-10">
                            <?= $form->field($search, 'text_query', ['template' => '{input}'])->textInput(['placeholder' => Yii::t('app', 'ads.placeholder_for_text_what_we_search')])->label(false) ?>
                        </div>
                        <div class="col-xs-2">
                            <?= Html::submitButton(Yii::t('app', 'ads.search'), ['class' => 'btn btn-green']) ?>
                        </div>
                    </div>
                    
                </div>
            </div>
            <?php ActiveForm::end(); ?>
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
            <div class="list-ads-pjs" style="margin-top: 20px;">
                <?php \yii\widgets\Pjax::begin() ?>
                <?= 
                    ListView::widget([
                        'dataProvider' => $listDataProvider,
                        'itemView' => '_ads_item',
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
</div>