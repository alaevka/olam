<?php
	use yii\helpers\Url;
?>
<div class="col-md-12">
	<div class="row realty-item <?= ($index % 2) ? 'odd' : 'even' ?>" onclick="location.href='<?= Url::to(['/auto/view/', 'id' => $model->id]) ?>';">
		<div class="col-xs-1"><?= date('d.m.Y', $model->created_at) ?></div>
		<div class="col-xs-2">
			<img class="img-responsive" src="/uploads/auto/<?= $model->_getImage() ?>">
		</div>
		<div class="col-xs-2"><?= $model->marka->name ?> <?= $model->modelauto->name ?></div>
		<div class="col-xs-1"><?= $model->tech_construction_year ?></div>
		<div class="col-xs-2"><?= $model->tech_value ?> (<?= $model->tech_horsepower ?> <?= Yii::t('app', 'auto.horsepower') ?>)<br><?= $model->_getFuel() ?><br><?= $model->_getTransmission() ?><br><?= $model->_getGear() ?></div>
		<div class="col-xs-2"><?= $model->tech_mileage ?></div>
		<div class="col-xs-2"><?= number_format($model->price, 0, ',', ' ' ); ?> руб.</div>
	</div>
</div>