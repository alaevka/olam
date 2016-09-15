<?php
	use yii\helpers\Url;
?>
<div class="resume-item <?= ($index % 2) ? 'odd' : 'even' ?>" onclick="location.href='<?= Url::to(['/work/view/resume/'.$model->id]) ?>';">
	<div class="row">
		<div class="col-xs-1 resume-date-created"><?= date('d.m.Y', $model->created_at) ?></div>
		<div class="col-xs-8 resume-title"><a href="/work/view/resume/<?= $model->id ?>"><?= $model->suggestion_position ?></a></div>
		<div class="col-xs-3 resume-price"><?= Yii::t('app', 'works.from') ?> <?= number_format($model->suggestion_pay, 0, ',', ' ' ) ?> <?= Yii::t('app', 'works.valute') ?></div>
	</div>
	<div class="row">
		<div class="col-xs-2">
			<img class="img-responsive" src="/uploads/works/<?= $model->_getImage() ?>">
		</div>
		<div class="col-xs-10">
			<div><a href="<?= Url::to(['/work/view/resume/'.$model->id]) ?>"><?= $model->personal_first_name ?> <?= $model->personal_last_name ?>, <?= $model->_getYearsold() ?></a> </div>
			<div><?= $model->location->location; ?></div>
			<div><b><?= Yii::t('app', 'works.experience_years_in_sphere') ?>:</b> <?= $model->experience_years ?></div>
			<div class="experience_information"><?= $model->experience_information; ?></div>
		</div>
	</div>
</div>