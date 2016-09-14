<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;
$this->title = 'Изменение резюме';
$this->params['breadcrumbs'][] = ['label' => 'Резюме', 'url' => ['/work/resume']];
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
					<a data-method="post" href="<?= Url::to(['/work/deleteresume/', 'id' => $model->id]) ?>"><i class="entypo-minus-squared"></i> Удалить резюме</a>
				</li>
				<li class="">
					<a href="<?= Url::to(['/work/resume']) ?>"><i class="entypo-menu"></i> Список резюме</a>
				</li>
			</ul>
		</div>
	</div>

	<!-- panel body -->
	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
				<?= $this->render('_formresume', [
			        'model' => $model,
			        'modelEducation' => $modelEducation,
			    ]) ?>							
			</div>
		</div>
	</div>
</div>

