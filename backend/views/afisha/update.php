<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;
$this->title = 'Изменеие события';
$this->params['breadcrumbs'][] = ['label' => 'Афиша', 'url' => ['/afisha/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel minimal">
	<!-- panel head -->
	<div class="panel-heading">
		<div class="panel-title"><?= $this->title; ?></div>
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Изменение события</a>
				</li>
				<li class="">
					<a data-method="post" href="<?= Url::to(['/afisha/delete/', 'id' => $model->id]) ?>"><i class="entypo-minus-squared"></i> Удалить событие</a>
				</li>
				<li class="">
					<a href="<?= Url::to(['/afisha/index']) ?>"><i class="entypo-menu"></i> Список событий</a>
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

