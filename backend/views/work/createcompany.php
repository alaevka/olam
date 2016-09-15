<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;
$this->title = 'Добавление компании';
$this->params['breadcrumbs'][] = ['label' => 'Компании', 'url' => ['/work/companies']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel minimal">
	<!-- panel head -->
	<div class="panel-heading">
		<div class="panel-title"><?= $this->title; ?></div>
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Добавление компании</a>
				</li>
				
				<li class="">
					<a href="<?= Url::to(['/work/companies']) ?>"><i class="entypo-menu"></i> Список компаний</a>
				</li>
			</ul>
		</div>
	</div>

	<!-- panel body -->
	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
				<?= $this->render('_formcompany', [
			        'model' => $model,
			    ]) ?>							
			</div>
		</div>
	</div>
</div>

