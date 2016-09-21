<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
?>
<div class="row">
    <div class="col-md-12 central-content object-model-ads" id="central-content">
        <div>
	        <div class="object-breadcrumbs">
				<?= $model->category->getBreadCrumbs(200) ?>
	        </div>
            <h1><?= $model->title ?></h1>
			<div class="price"><?= number_format($model->price, 0, ',', ' ' ); ?> руб.</div>
			<div class="row pics">
				<div class="col-md-6">
					<img class="img-responsive" src="/uploads/other/<?= $model->_getImage() ?>">
				</div>
				<div class="col-md-6">
					<div class="row">
					<?php
						$gallery = \common\models\Adsothergallery::find()->where(['ads_id' => $model->id])->all();
						if($gallery) {
							foreach($gallery as $gal) {
						?>
						<div class="col-xs-4" style="min-height: 130px;"><img class="img-responsive" src="/uploads/other/<?= $gal->image_name ?>"></div>
						<?php
							}
						}
					?>
					</div>
				</div>
			</div>
			<h4><?= Yii::t('app', 'ads.additional_info') ?></h4>
		    <div><?= $model->description; ?></div>
		    <h4><?= Yii::t('app', 'ads.contacts') ?></h4>
		    <div class="contacts-block">
		    	<div class="username"><?= $model->contacts_username ?></div>
		    	<div class="phone"><?= $model->contacts_phone ?></div>
		    	<div class="sendmail"><a href="mailto:<?= $model->contacts_email ?>"><?= Yii::t('app', 'ads.write_on_email') ?></a></div>
		    </div>
		</div>
	</div>
</div>
