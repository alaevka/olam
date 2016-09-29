<?php
	use yii\helpers\Url;
?>
<div class="profile-item <?= ($index % 2) ? 'odd' : 'even' ?>" onclick="location.href='<?= Url::to(['/work/view/resume/', 'id' => $model->id]) ?>';">
	<div class="ts-resume-title"><a href="/work/view/resume/<?= $model->id ?>"><?= $model->suggestion_position ?></a></div>
	<div class="ts-resume-price"><?= Yii::t('app', 'works.from') ?> <?= number_format($model->suggestion_pay, 0, ',', ' ' ) ?> <?= Yii::t('app', 'works.valute') ?></div>
</div> 