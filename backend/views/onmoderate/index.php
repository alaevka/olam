<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;
$this->title = 'Контент на модерации';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel minimal">
	<!-- panel head -->
	<div class="panel-heading">
		
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Недвижимость</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- panel body -->
	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
				<?= GridView::widget([
				    'dataProvider' => $dataProvider_ads,
				    'filterModel' => $searchModel_ads,
				    'rowOptions' => function ($model, $key, $index, $grid) {
				        return ['data-sortable-id' => $model->id];
				    },
				    'tableOptions' => ['class'=>'table table-striped table-bordered table-hover dataTables-example'],
				    'layout' => "<div class=\"pull-right\">{summary}</div>\n{items}\n{pager}",
				    'columns' => [
				    	[
				    		'attribute' => 'id',
				    		'contentOptions' => ['style' => 'width: 50px;']
				    	],
				        [
				            'attribute' => 'location_city',
				            'value' => function ($model, $index, $widget) {
			                    return $model->location->location;
			                },
				        ],
				        [
				            'attribute' => 'contacts_username',
				        ],
				        [
				            'attribute' => 'contacts_phone',
				        ],
				        [
				            'attribute' => 'contacts_email',
				        ],
				        [
			                'class' => 'yii\grid\ActionColumn',
			                'contentOptions' => ['class' => 'actions_row'],
			                'template' => '{update}',
			                'buttons' => [
			                    'update' => function ($url, $model) {
			                        return Html::a('<i class="glyphicon glyphicon-wrench"></i>', Url::to(['/realty/update', 'id' => $model->id]), [
			                            'class' => 'btn btn-xs btn-primary',
			                            'title' => Yii::t('yii', 'Update'),
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
		
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Авто</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- panel body -->
	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
				<?= GridView::widget([
				    'dataProvider' => $dataProvider_auto,
				    'filterModel' => $searchModel_auto,
				    'rowOptions' => function ($model, $key, $index, $grid) {
				        return ['data-sortable-id' => $model->id];
				    },
				    'tableOptions' => ['class'=>'table table-striped table-bordered table-hover dataTables-example'],
				    'layout' => "<div class=\"pull-right\">{summary}</div>\n{items}\n{pager}",
				    'columns' => [
				    	[
				    		'attribute' => 'id',
				    		'contentOptions' => ['style' => 'width: 50px;']
				    	],
				    	[
				    		'attribute' => 'auto_object_type',
				            'value' => function ($model, $index, $widget) {
			                    switch ($model->auto_object_type) {
			                    	case '1':
			                    		return '<span class="badge badge-info badge-roundless">Автомобили</span> '. $model->marka->name.'-'.$model->modelauto->name;
			                    		break;
			                    	case '2':
			                    		switch ($model->wheel_tire_category) {
			                    			case '1':
			                    				return '<span class="badge badge-success badge-roundless">Диски</span> '.$model->wheelmanu->title;
			                    				break;
			                    			case '2':
			                    				return '<span class="badge badge-secondary badge-roundless">Шины</span> '.$model->tiremanu->title;
			                    				break;
			                    		}
			                    		break;
			                    	case '3':
			                    		return '<span class="badge badge-roundless">Прочие объявления</span> '.$model->title;
			                    		break;
			                    }
			                },
			                'filter' => ['1' => 'Автомобили', '2' => 'Диски и шины', '3' => 'Прочие объявления'],
			                'format' => 'raw'
				    	],
				        [
				            'attribute' => 'location_city',
				            'value' => function ($model, $index, $widget) {
			                    return $model->location->location;
			                },
				        ],
				        [
				            'attribute' => 'contacts_username',
				        ],
				        [
				            'attribute' => 'contacts_phone',
				        ],
				        [
				            'attribute' => 'contacts_email',
				        ],
				        [
			                'class' => 'yii\grid\ActionColumn',
			                'contentOptions' => ['class' => 'actions_row'],
			                'template' => '{update}',
			                'buttons' => [
			                    'update' => function ($url, $model) {
			                        return Html::a('<i class="glyphicon glyphicon-wrench"></i>', Url::to(['/auto/update', 'id' => $model->id]), [
			                            'class' => 'btn btn-xs btn-primary',
			                            'title' => Yii::t('yii', 'Update'),
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
		
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Резюме</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- panel body -->
	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
				<?= GridView::widget([
				    'dataProvider' => $dataProvider_resume,
				    'filterModel' => $searchModel_resume,
				    'rowOptions' => function ($model, $key, $index, $grid) {
				        return ['data-sortable-id' => $model->id];
				    },
				    'tableOptions' => ['class'=>'table table-striped table-bordered table-hover dataTables-example'],
				    'layout' => "<div class=\"pull-right\">{summary}</div>\n{items}\n{pager}",
				    'columns' => [
				    	[
				    		'attribute' => 'id',
				    		'contentOptions' => ['style' => 'width: 50px;']
				    	],
				    	[
				    		'attribute' => 'suggestion_sphere',
				    		'value' => function ($model, $index, $widget) {
			                    return $model->sphere->name;
			                },
				    	],
				    	[
				    		'attribute' => 'suggestion_position',
				    	],
				        [
				            'attribute' => 'suggestion_pay',
				            'value' => function ($model, $index, $widget) {
			                    return 'от '.number_format($model->suggestion_pay, 0, ',', ' ' ). ' руб.';
			                },
				        ],
				        [
				        	'header' => 'ФИО',
				        	'value' => function ($model, $index, $widget) {
			                    return $model->personal_first_name.' '.$model->personal_last_name;
			                },
				        ],
				        [
				            'attribute' => 'contacts_phone',
				        ],
				        [
				            'attribute' => 'contacts_email',
				        ],
				        [
			                'class' => 'yii\grid\ActionColumn',
			                'contentOptions' => ['class' => 'actions_row'],
			                'template' => '{update}',
			                'buttons' => [
			                    'update' => function ($url, $model) {
			                        return Html::a('<i class="glyphicon glyphicon-wrench"></i>', Url::to(['/work/updateresume', 'id' => $model->id]), [
			                            'class' => 'btn btn-xs btn-primary',
			                            'title' => Yii::t('yii', 'Update'),
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
		
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Вакансии</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- panel body -->
	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
				<?= GridView::widget([
				    'dataProvider' => $dataProvider_vacancy,
				    'filterModel' => $searchModel_vacancy,
				    'rowOptions' => function ($model, $key, $index, $grid) {
				        return ['data-sortable-id' => $model->id];
				    },
				    'tableOptions' => ['class'=>'table table-striped table-bordered table-hover dataTables-example'],
				    'layout' => "<div class=\"pull-right\">{summary}</div>\n{items}\n{pager}",
				    'columns' => [
				    	[
				    		'attribute' => 'id',
				    		'contentOptions' => ['style' => 'width: 50px;']
				    	],
				    	[
				    		'attribute' => 'title',
				    	],
				        [
				            'attribute' => 'company_id',
				            'value' => function ($model, $index, $widget) {
			                    return $model->company->company_name;
			                },
				        ],
				        [
				            'attribute' => 'wage_level',
				        ],
				        [
			                'class' => 'yii\grid\ActionColumn',
			                'contentOptions' => ['class' => 'actions_row'],
			                'template' => '{update}',
			                'buttons' => [
			                    'update' => function ($url, $model) {
			                        return Html::a('<i class="glyphicon glyphicon-wrench"></i>', Url::to(['/work/updatevacancy', 'id' => $model->id]), [
			                            'class' => 'btn btn-xs btn-primary',
			                            'title' => Yii::t('yii', 'Update'),
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
		
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Объявления</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- panel body -->
	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
				<?= GridView::widget([
				    'dataProvider' => $dataProvider_adsother,
				    'filterModel' => $searchModel_adsother,
				    'rowOptions' => function ($model, $key, $index, $grid) {
				        return ['data-sortable-id' => $model->id];
				    },
				    'tableOptions' => ['class'=>'table table-striped table-bordered table-hover dataTables-example'],
				    'layout' => "<div class=\"pull-right\">{summary}</div>\n{items}\n{pager}",
				    'columns' => [
				    	[
				    		'attribute' => 'id',
				    		'contentOptions' => ['style' => 'width: 50px;']
				    	],
				    	[
				            'attribute' => 'title',
				        ],
				        [
				            'attribute' => 'location_city',
				            'value' => function ($model, $index, $widget) {
			                    return $model->location->location;
			                },
				        ],
				        
				        [
				            'attribute' => 'contacts_phone',
				        ],
				        [
				            'attribute' => 'contacts_email',
				        ],
				        [
				            'attribute' => 'price',
				        ],
				        [
			                'class' => 'yii\grid\ActionColumn',
			                'contentOptions' => ['class' => 'actions_row'],
			                'template' => '{update}',
			                'buttons' => [
			                    'update' => function ($url, $model) {
			                        return Html::a('<i class="glyphicon glyphicon-wrench"></i>', Url::to(['/otherads/update', 'id' => $model->id]), [
			                            'class' => 'btn btn-xs btn-primary',
			                            'title' => Yii::t('yii', 'Update'),
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