<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;
$this->title = 'Добавление объекта';
$this->params['breadcrumbs'][] = ['label' => 'Авто', 'url' => ['/auto/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel minimal">
	<!-- panel head -->
	<div class="panel-heading">
		<div class="panel-title"><?= $this->title; ?></div>
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Добавление объекта</a>
				</li>
				
				<li class="">
					<a href="<?= Url::to(['/auto/index']) ?>"><i class="entypo-menu"></i> Список автотранспортных стредств</a>
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
	                'construction_years' => $construction_years,
                    'colors_list' => $colors_list,
                    'colors_data_attribute_list' => $colors_data_attribute_list,
			    ]) ?>							
			</div>
		</div>
	</div>
</div>

