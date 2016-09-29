<?php
	use yii\helpers\Url;
?>
<div class="profile-item <?= ($index % 2) ? 'odd' : 'even' ?>" onclick="location.href='<?= Url::to(['/realty/view/?id='.$model->id]) ?>';">
	<div class="title"><a href="<?= Url::to(['/realty/view/?id='.$model->id]) ?>"><?= $model->title; ?></a></div>
	<div class="price"><?= number_format($model->price, 0, ',', ' ' ) ?> <?= Yii::t('app', 'ads.valute') ?></div>
</div>