<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;
$this->title = 'Изменеие пункта';
$this->params['breadcrumbs'][] = ['label' => 'Справочник "Населенные пункты"', 'url' => ['/locations/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel minimal">
	<!-- panel head -->
	<div class="panel-heading">
		<div class="panel-title"><?= $this->title; ?></div>
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Изменение категории</a>
				</li>
				<li class="">
					<a data-method="post" href="<?= Url::to(['/locations/delete/', 'id' => $model->id]) ?>"><i class="entypo-minus-squared"></i> Удалить пункт</a>
				</li>
				<li class="">
					<a href="<?= Url::to(['/locations/index']) ?>"><i class="entypo-menu"></i> Список населенных пунктов</a>
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
			    ]) ?>							
			</div>
		</div>
	</div>
</div>

