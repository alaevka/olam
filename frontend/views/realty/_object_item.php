<?php
	use yii\helpers\Url;
?>
<div class="col-md-12">
	<div class="row realty-item <?= ($index % 2) ? 'odd' : 'even' ?>" onclick="location.href='<?= Url::to(['/realty/view/', 'id' => $model->id]) ?>';">
		<div class="col-xs-1"><?= date('d.m.Y', $model->created_at) ?></div>
		<div class="col-xs-1">
			
			<img class="img-responsive" src="/uploads/objects/<?= $model->_getImage() ?>">
		</div>
		<div class="col-xs-1"><?= $model->rooms_count ?></div>
		<div class="col-xs-1"><?= $model->location->location ?></div>
		<div class="col-xs-1"><?= $model->locationraion->raion ?></div>
		<div class="col-xs-1"><?= $model->locationstreet->street ?></div>
		<div class="col-xs-1"><?= $model->location_house ?></div>
		<div class="col-xs-1"><?= $model->area_total ?>/<?= $model->area_for_living ?>/<?= $model->area_kitchen ?></div>
		<div class="col-xs-1"><?= $model->level ?>/<?= $model->total_levels ?></div>
		<div class="col-xs-2"><?= number_format($model->price, 0, ',', ' ' ); ?> руб.</div>
		<div class="col-xs-1"><?= $model->contacts_username ?></div>
	</div>
</div>