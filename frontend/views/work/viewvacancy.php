<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
?>
<div class="row">
    <div class="col-md-12 central-content" id="central-content">
        <?= $this->render('/work/_works_header'); ?>
       
            <h1 class="row">
            	<div class="col-xs-8">
            		<?= $model->title ?><br>
					<?= $model->_getExpTags() ?>
            	</div>
				<div class="col-xs-2">
	            	<?= Yii::t('app', 'works.from') ?> <?= number_format($model->wage_level, 0, ',', ' ' ) ?> <?= Yii::t('app', 'works.valute') ?>
	            </div>
	            <div class="col-xs-2">
	            	<img class="img-responsive" src="/uploads/companies/<?= $model->company->_getImage() ?>">
	            </div>
            </h1>
            <h3><?= Yii::t('app', 'works.about_company_and_vacancy') ?></h3>
            <div class="vacancy-company"><b><?= $model->company->company_name ?></b></div>
            <div class="vacancy-company-address"><?= $model->company->contact_city ?>, <?= $model->company->contact_address_street ?>, <?= $model->company->contact_address_house ?></div>

            <div class="vacancy_desc">
            	<?= $model->vacancy_description ?>
            </div>	
			
			<h3><?= Yii::t('app', 'works.duties') ?></h3>
			<div><?= $model->duties ?></div>

			<h3><?= Yii::t('app', 'works.requirements') ?></h3>
			<div><?= $model->requirements ?></div>	

			<h3><?= Yii::t('app', 'works.conditions') ?></h3>
			<div><?= $model->conditions ?></div>

			<h3><?= Yii::t('app', 'works.experience_years') ?></h3>
			<div><?= $model->experience_years ?></div>	

			<h3><?= Yii::t('app', 'works.suggestion_employment') ?></h3>
			<div><?= $model->_getSuggestionEmployment() ?></div>
        	
        	<hr>
        	<div class="vacancy_contacts">
			<?php if(!Yii::$app->user->isGuest) { ?>
				
				<div><b><?= $model->company->user_fio ?></b></div>
				<div><?= $model->company->user_position ?></div>
				<div><?= $model->company->phones ?></div>
				<div><a target="_blank" href="<?= $model->company->company_site ?>"><?= $model->company->company_site ?></a></div>
				<div><a target="_blank" href="mailto:<?= $model->company->company_email ?>"><?= $model->company->company_email ?></a></div>

			<?php } ?>
			</div>
    </div>
</div>