<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;
$this->title = 'Добавление улицы';
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
					<a href="#tab1" data-toggle="tab">Добавление улицы</a>
				</li>
				
				<li class="">
					<a href="<?= Url::to(['/locations/update', 'id' => $model->location_id]) ?>"><i class="entypo-menu"></i> Список улиц</a>
				</li>
			</ul>
		</div>
	</div>

	<!-- panel body -->
	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
				<?= $this->render('_formstreet', [
			        'model' => $model,
			    ]) ?>							
			</div>
		</div>
	</div>
</div>

