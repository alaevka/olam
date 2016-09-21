<?php
	use yii\helpers\Url;
?>
<div class="adjs-item <?= ($index % 2) ? 'odd' : 'even' ?>" onclick="location.href='<?= Url::to(['/ads/view/'.$model->id]) ?>';">
	<div class="row">
		<div class="col-xs-1"><?= date('d.m.Y', $model->created_at) ?></div>
		<div class="col-xs-2">
			<img class="img-responsive" src="/uploads/other/<?= $model->_getImage() ?>">
		</div>
		<div class="col-xs-8">
			<div class="title"><a href="<?= Url::to(['/ads/view/'.$model->id]) ?>"><?= $model->title; ?></a></div>
			<div class="price"><?= number_format($model->price, 0, ',', ' ' ) ?> <?= Yii::t('app', 'ads.valute') ?></div>
			<div class="location"><?= $model->location->location; ?></div>
		</div>
	</div>
</div>