<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Url;
?>

	<?php $form = ActiveForm::begin([
        'id' => 'locations-form',
        'errorSummaryCssClass' => 'error-summary alert alert-danger',
        'options' => ['class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data'],
        'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-sm-5\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-5\">{error}\n{hint}</div>",
        'labelOptions' => ['class' => 'col-sm-3 control-label'],
        ],
    ]); ?>

    <?php echo $form->errorSummary($model); ?>

    <?= $form->field($model, 'location', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <?= $form->field($model, 'district', [
        'inputOptions'=>['class'=>'form-control input-sm']
    ])->textInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => 'btn btn-success']) ?><br>
        </div>
    </div>	

    <?php ActiveForm::end(); ?>

    <?php if(!$model->isNewRecord) { ?>

    <div class="panel minimal">
        <!-- panel head -->
        <div class="panel-heading">
            <div class="panel-title">Районы населенного пункта</div>
            <div class="panel-options">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">Список районов</a>
                    </li>
                    
                    <li class="">
                        <a href="<?= Url::to(['/locations/createraion', 'location_id' => $model->id]) ?>"><i class="entypo-plus-squared"></i> Добавить район</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- panel body -->
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <?= GridView::widget([
                        'dataProvider' => $dataProviderRaion,
                        'filterModel' => $searchModelRaion,
                        'tableOptions' => ['class'=>'table table-striped table-bordered table-hover dataTables-example'],
                        'layout' => "<div class=\"pull-right\">{summary}</div>\n{items}\n{pager}",
                        'columns' => [
                            [
                                'attribute' => 'raion',
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'contentOptions' => ['class' => 'actions_row'],
                                'template' => '{update} {delete}',
                                'buttons' => [
                                    'update' => function ($url, $model) {
                                        return Html::a('<i class="glyphicon glyphicon-wrench"></i>', Url::to(['/locations/updateraion', 'id' => $model->id]), [
                                            'class' => 'btn btn-xs btn-primary',
                                            'title' => Yii::t('yii', 'Update'),
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {
                                        return Html::a('<i class="glyphicon glyphicon-trash"></i>', Url::to(['/locations/deleteraion', 'id' => $model->id]), [
                                            'class' => 'btn btn-xs btn-danger',
                                            'data-method' => 'post',
                                            'data-confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                                            'title' => Yii::t('yii', 'Delete'),
                                        ]);
                                    },
                                ]
                            ],
                        ],
                    ]); ?>  
                </div>
            </div>
        </div>
    </div>


    <div class="panel minimal">
        <!-- panel head -->
        <div class="panel-heading">
            <div class="panel-title">Улицы населенного пункта</div>
            <div class="panel-options">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">Список улиц</a>
                    </li>
                    
                    <li class="">
                        <a href="<?= Url::to(['/locations/createstreet', 'location_id' => $model->id]) ?>"><i class="entypo-plus-squared"></i> Добавить улицу</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- panel body -->
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <?= GridView::widget([
                        'dataProvider' => $dataProviderStreet,
                        'filterModel' => $searchModelStreet,
                        'tableOptions' => ['class'=>'table table-striped table-bordered table-hover dataTables-example'],
                        'layout' => "<div class=\"pull-right\">{summary}</div>\n{items}\n{pager}",
                        'columns' => [
                            [
                                'attribute' => 'street',
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'contentOptions' => ['class' => 'actions_row'],
                                'template' => '{update} {delete}',
                                'buttons' => [
                                    'update' => function ($url, $model) {
                                        return Html::a('<i class="glyphicon glyphicon-wrench"></i>', Url::to(['/locations/updatestreet', 'id' => $model->id]), [
                                            'class' => 'btn btn-xs btn-primary',
                                            'title' => Yii::t('yii', 'Update'),
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {
                                        return Html::a('<i class="glyphicon glyphicon-trash"></i>', Url::to(['/locations/deletestreet', 'id' => $model->id]), [
                                            'class' => 'btn btn-xs btn-danger',
                                            'data-method' => 'post',
                                            'data-confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                                            'title' => Yii::t('yii', 'Delete'),
                                        ]);
                                    },
                                ]
                            ],
                        ],
                    ]); ?>  
                </div>
            </div>
        </div>
    </div>

    <?php } ?>