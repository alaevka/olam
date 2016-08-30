<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;
$this->title = 'Изменеие позиции';
$this->params['breadcrumbs'][] = ['label' => $model_name_title, 'url' => ['/directory/'.strtolower($model_name)]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel minimal">
	<!-- panel head -->
	<div class="panel-heading">
		<div class="panel-title"><?= $this->title; ?></div>
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Изменение позиции</a>
				</li>
				<li class="">
					<a data-method="post" href="<?= Url::to(['/directory/delete/', 'id' => $model->id, 'model_name' => $model_name]) ?>"><i class="entypo-minus-squared"></i> Удалить категорию</a>
				</li>
				<li class="">
					<a href="<?= Url::to(['/directory/'.$model_name]) ?>"><i class="entypo-menu"></i> Список позиций</a>
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

