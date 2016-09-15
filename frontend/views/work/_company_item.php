<?php 
	use yii\helpers\Url;
?>
<div class="company_item well">
	<div class="row">
		<div class="col-xs-2">
			<img class="img-responsive" src="/uploads/companies/<?= $model->_getImage() ?>">
		</div>
		<div class="col-xs-10">
			<div><b><?= $model->company_name ?></b></div>
			<div><?= $model->getCompanyType() ?></div>
			<div><?= $model->company_description; ?></div>
		</div>
	</div>
	<div class="delete-company">
		<a href="<?= Url::to(['/work/delete/company/'.$model->id]) ?>" class="company-delete-url"><i class="fa fa-trash"></i></a>
		<?php
			$script = '
				$(document).ready(function() {
					$(".company-delete-url").click(function(){
						if (confirm("'.Yii::t('app', 'works.are_you_sure').'") == true) {
							var location = $(this).attr("href");
						   	location.href="+location+";
						} else {
						   	return false;
						}
					});
				});
			';
			$this->registerJs($script, yii\web\View::POS_READY);
		?>
	</div>
</div>