<?php
/**
 * @var View $this
 * @var SourceMessageSearch $searchModel
 * @var ActiveDataProvider $dataProvider
 */

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
use Zelenin\yii\modules\I18n\models\search\SourceMessageSearch;
use Zelenin\yii\modules\I18n\models\SourceMessage;
use Zelenin\yii\modules\I18n\Module;
use yii\helpers\Url;

$this->title = 'Языковые настройки';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel minimal">
	<!-- panel head -->
	<div class="panel-heading">
		<div class="panel-title"><?= $this->title; ?></div>
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Список слов и фраз для перевода</a>
				</li>
			</ul>
		</div>
	</div>
	
	<!-- panel body -->
	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
				<?php
				    Pjax::begin();
				    echo GridView::widget([
				        'filterModel' => $searchModel,
				        'dataProvider' => $dataProvider,
				        'tableOptions' => ['class'=>'table table-striped table-bordered table-hover dataTables-example'],
				    	'layout' => "<div class=\"pull-right\">{summary}</div>\n{items}\n{pager}",
				        'columns' => [
				            [
				                'attribute' => 'id',
				                'value' => function ($model, $index, $dataColumn) {
				                    return $model->id;
				                },
				                'filter' => false,
				                
				            ],
				            [
				                'attribute' => 'message',
				                'format' => 'raw',
				                'value' => function ($model, $index, $widget) {
				                    return Html::a($model->message, ['update', 'id' => $model->id], ['data' => ['pjax' => 0]]);
				                },
				                'header' => 'Переменная'
				            ],
				            [
				                'attribute' => 'category',
				                'value' => function ($model, $index, $dataColumn) {
				                    return $model->category;
				                },
				                'filter' => ArrayHelper::map($searchModel::getCategories(), 'category', 'category'),
				                'header' => 'Категория'
				            ],
				            [
				                'attribute' => 'status',
				                'value' => function ($model, $index, $widget) {
				                    /** @var SourceMessage $model */
				                    return $model->isTranslated() ? 'Переведен' : 'Не переведен';
				                },
				                'filter' => $searchModel->getStatus(),
				                'header' => 'Статус'
				            ]
				        ]
				    ]);
				    Pjax::end();
				?>
			</div>
		</div>
	</div>
</div>

