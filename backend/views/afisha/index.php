<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = 'Афиша';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel minimal">
	<!-- panel head -->
	<div class="panel-heading">
		<div class="panel-title"><?= $this->title; ?></div>
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Список событий</a>
				</li>
				
				<li class="">
					<a href="<?= Url::to(['/afisha/create']) ?>"><i class="entypo-plus-squared"></i> Добавить событие</a>
				</li>
			</ul>
		</div>
	</div>
	
	<!-- panel body -->
	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
				<?= GridView::widget([
				    'dataProvider' => $dataProvider,
				    'filterModel' => $searchModel,
				    'tableOptions' => ['class'=>'table table-striped table-bordered table-hover dataTables-example'],
				    'layout' => "<div class=\"pull-right\">{summary}</div>\n{items}\n{pager}",
				    'columns' => [
				        [
				            'attribute' => 'title',
				        ],
				        [
				            'attribute' => 'slug',
				        ],
				        [
				            'attribute' => 'category_id',
				            'filter' => [1 => 'Новости', 2 => 'Кинотеатры', 3 => 'Театры', 4 => 'Искусство', 5 => 'Рестораны', 6 => 'Клубы', 7 => 'Активный отдых'],
				            'value' => function ($model, $index, $widget) {
			                    return $model->_getCategoryId();
			                },
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

