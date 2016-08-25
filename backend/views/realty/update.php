<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;
$this->title = 'Изменеие объекта';
$this->params['breadcrumbs'][] = ['label' => 'Недвижимость', 'url' => ['/realty/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel minimal">
	<!-- panel head -->
	<div class="panel-heading">
		<div class="panel-title"><?= $this->title; ?></div>
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Изменение объекта</a>
				</li>
				<li class="">
					<a data-method="post" href="<?= Url::to(['/realty/delete/', 'id' => $model->id]) ?>"><i class="entypo-minus-squared"></i> Удалить объект</a>
				</li>
				<li class="">
					<a href="<?= Url::to(['/realty/index']) ?>"><i class="entypo-menu"></i> Список объектов</a>
				</li>
			</ul>
		</div>
	</div>

	<!-- panel body -->
	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
				<?= $this->render('_form', [
			        'model' => $model,
			        'locations' => $locations,
	                'flat_type' => $flat_type,
	                'flat_plan' => $flat_plan,
	                'flat_repairs' => $flat_repairs,
	                'type_of_ownership' => $type_of_ownership,
	                'house_type' => $house_type,
	                'house_material' => $house_material,
			    ]) ?>							
			</div>
		</div>
	</div>
</div>

