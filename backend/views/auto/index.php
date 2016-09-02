<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;
$this->title = 'Авто';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel minimal">
	<!-- panel head -->
	<div class="panel-heading">
		<div class="panel-title"><?= $this->title; ?></div>
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Список автотранспортных стредств</a>
				</li>
				
				<li class="">
					<a href="<?= Url::to(['/auto/create']) ?>"><i class="entypo-plus-squared"></i> Добавить объект</a>
				</li>
			</ul>
		</div>
	</div>
	<?php
		$script = '
			$(function(){
		        $(".is_hot_status_checkbox").change(function(){
		            if($(this).prop(\'checked\') == true) {
		                var is_done = 1;   
		            } else {
		                var is_done = 0;
		            }
		            var row_id = $(this).attr(\'data-key\');
		            $.ajax({
		                type: "POST",
		                dataType: \'json\',
		                url: \''.Url::toRoute("/auto/ishot").'\',
		                data: "param="+is_done+"&row_id="+row_id,
		                success: function(data,status){
		                    console.log(\'saved\');
		                }
		            });
		        });
		    });';
		$this->registerJs($script, yii\web\View::POS_READY);
	?>

	<!-- panel body -->
	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
				<?= GridView::widget([
				    'dataProvider' => $dataProvider,
				    'filterModel' => $searchModel,
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
			                    		return '<span class="badge badge-roundless">Прочие объявления</span>';
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
		                    'attribute' => 'is_hot',
		                    'filter' => ['0' => 'Нет', '1' => 'Да'],
		                    'value' => function ($model) {
		                        if($model->is_hot == 1) {
		                            return '<input type="checkbox" class="is_hot_status_checkbox" data-key="'.$model->id.'" name="is_hot_status" checked>';
		                        } else {
		                            return '<input type="checkbox" class="is_hot_status_checkbox" data-key="'.$model->id.'" name="is_hot_status">';
		                        }
		                        
		                    },
		                    'contentOptions' => ['style' => 'text-align: center;'],
		                    'format' => 'raw',
		                    'headerOptions' => [
		                        'class' => 'header-grid'
		                    ],
		                ],
			            [
			                'class' => 'yii\grid\ActionColumn',
			                'contentOptions' => ['class' => 'actions_row'],
			                'template' => '{update} {delete}',
			                'buttons' => [
			                    'update' => function ($url, $model) {
			                        return Html::a('<i class="glyphicon glyphicon-wrench"></i>', $url, [
			                            'class' => 'btn btn-xs btn-primary',
			                            'title' => Yii::t('yii', 'Update'),
			                        ]);
			                    },
			                    'delete' => function ($url, $model) {
			                        return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url, [
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

