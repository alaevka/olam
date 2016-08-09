<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use common\models\NewsCategory;

$this->title = 'Список новостей';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel minimal">
	<!-- panel head -->
	<div class="panel-heading">
		<div class="panel-title"><?= $this->title; ?></div>
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Список новостей</a>
				</li>
				
				<li class="">
					<a href="<?= Url::to(['/news/create']) ?>"><i class="entypo-plus-squared"></i> Добавить новость</a>
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
				            'filter' => Arrayhelper::map(NewsCategory::find()->orderBy('order')->asArray()->all(), 'id', 'title'),
				            'value' => function ($model, $index, $widget) {
			                    return $model->category->title;
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

