<?php
	use yii\helpers\Url;
?>
<div class="vacancy-item <?= ($index % 2) ? 'odd' : 'even' ?>" onclick="location.href='<?= Url::to(['/work/view/vacancy/'.$model->id]) ?>';">
	<div class="row">
		<div class="col-xs-8">
			<div class="resume-date-created"><?= date('d.m.Y', $model->created_at) ?></div>
			<div class="resume-title"><a href="/work/view/vacancy/<?= $model->id ?>"><?= $model->title ?></a></div>
			<div class="vacancy-company"><?= $model->company->company_name ?></div>
			<div class="vacancy-company-address"><?= $model->company->contact_city ?>, <?= $model->company->contact_address_street ?>, <?= $model->company->contact_address_house ?></div>
		</div>
		<div class="col-xs-2 resume-price"><?= Yii::t('app', 'works.from') ?> <?= number_format($model->wage_level, 0, ',', ' ' ) ?> <?= Yii::t('app', 'works.valute') ?></div>
		<div class="col-xs-2">
			<img class="img-responsive" src="/uploads/companies/<?= $model->company->_getImage() ?>">
		</div>
	</div>
</div>