<?php
	use yii\helpers\Url;
?>
<div class="profile-item <?= ($index % 2) ? 'odd' : 'even' ?>" onclick="location.href='<?= Url::to(['/work/view/vacancy/', 'id' => $model->id]) ?>';">
	<div class="ts-resume-title"><a href="/work/view/vacancy/<?= $model->id ?>"><?= $model->title ?></a></div>
	<div class="ts-resume-price"><?= Yii::t('app', 'works.from') ?> <?= number_format($model->wage_level, 0, ',', ' ' ) ?> <?= Yii::t('app', 'works.valute') ?></div>
</div> 