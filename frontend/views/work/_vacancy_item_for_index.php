<?php
	use yii\helpers\Url;
?>
<div class="col-xs-4 vacancy_index" onclick="location.href='<?= Url::to(['/work/view/vacancy/'.$model->id]) ?>';">
	<div class="vacancy_index_inner">
		<div class="vacancy_index_inner_title"><a href="/work/view/vacancy/<?= $model->id ?>"><?= $model->title ?></a></div>
		<div class="vacancy_index_inner_price"><?= Yii::t('app', 'works.from') ?> <?= number_format($model->wage_level, 0, ',', ' ' ) ?> <?= Yii::t('app', 'works.valute') ?></div>
		<div class="vacancy_index_inner_company"><?= $model->company->company_name ?></div>
	</div>
</div>