<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;
$this->title = 'Изменение района';
$this->params['breadcrumbs'][] = ['label' => 'Справочник "Населенные пункты"', 'url' => ['/locations/index']];
$this->params['breadcrumbs'][] = ['label' => 'Изменение населенного пункта', 'url' => ['/locations/update?id='.$model->location_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel minimal">
	<!-- panel head -->
	<div class="panel-heading">
		<div class="panel-title"><?= $this->title; ?></div>
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Изменение района</a>
				</li>
				<li class="">
					<a data-method="post" href="<?= Url::to(['/locations/deleteraion/', 'id' => $model->id]) ?>"><i class="entypo-minus-squared"></i> Удалить район</a>
				</li>
				<li class="">
					<a href="<?= Url::to(['/locations/update', 'id' => $model->location_id]) ?>"><i class="entypo-menu"></i> Список районов</a>
				</li>
			</ul>
		</div>
	</div>

	<!-- panel body -->
	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
				<?= $this->render('_formraion', [
			        'model' => $model,
			    ]) ?>							
			</div>
		</div>
	</div>
</div>

