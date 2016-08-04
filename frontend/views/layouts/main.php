<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\components\LanguageWidget;
use yii\helpers\Url;
use yii\bootstrap\Modal;
$currency_data = Yii::$app->CbRF->filter(['currency' => 'usd, eur'])->all();
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container header-container-area">
	<div class="row">
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="row">
					<!-- Navbar Links -->
			        <div class="collapse navbar-collapse">
			            <ul class="nav nav-justified">
		 	                <li><a class="top_mnu_news" href="#"><?= Yii::t('app', 'top_mnu.news') ?></a></li>
			                <li><a class="top_mnu_realty" href="#"><?= Yii::t('app', 'top_mnu.realty') ?></a></li>
			                <li><a class="top_mnu_auto" href="#"><?= Yii::t('app', 'top_mnu.auto') ?></a></li>
			                <li><a class="top_mnu_work" href="#"><?= Yii::t('app', 'top_mnu.work') ?></a></li>
			                <li><a class="top_mnu_ads" href="#"><?= Yii::t('app', 'top_mnu.ads') ?></a></li>
			                <li><a class="top_mnu_poster" href="#"><?= Yii::t('app', 'top_mnu.poster') ?></a></li>
			                <li><a class="top_mnu_tv" href="#"><?= Yii::t('app', 'top_mnu.tv') ?></a></li>
			                <li>
			                	<div class="container-search pull-right">
			                		<form class="searchbox">
			                			<input type="text" placeholder="<?= Yii::t('app', 'search.phrase.placeholder') ?>" name="search" class="searchbox-input" required>
			                			<input type="submit" class="searchbox-submit" value="GO">
			                			<span class="searchbox-icon"><img src="/img/search_icon.png"></span>
			                		</form>
			                	</div>
			                </li>
			            </ul>
			        </div>
		        </div>
		        <!-- Header -->
		        <div class="navbar-header">
		            <button type="button" class="navbar-toggle" 
		                    data-toggle="collapse" 
		                    data-target=".navbar-collapse">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		            <a class="navbar-brand" href="<?= Url::to(['/']) ?>">
		                <img src="/img/logo.png">
		            </a>
		        </div>
		        
		        <div class="pull-right auth-block">
		        	<?php if(Yii::$app->user->isGuest) { ?>
			        	<a class="login-link" id="login-link"  data-toggle="modal" data-target="#login-modal" href="<?= Url::to(['/user/login']) ?>"><?= Yii::t('app', 'user.login') ?></a><a class="register-link" id="register-link" href="<?= Url::to(['/user/registration/register']) ?>" data-toggle="modal" data-target="#registration-modal"><?= Yii::t('app', 'user.register') ?></a>

					<?php } else { ?>
						<a class="register-link" data-method="post" href="<?= Url::to(['/user/security/logout']); ?>"><?= Yii::t('app', 'user.logout') ?></a>
					<?php } ?>
		        </div>
		        <div class="pull-right currency-block">
		        	<span class="symbol-dollar">$</span><a href="#"><?= $currency_data['USD']['value'] ?> <span class="caret"></span></a><span class="symbol-euro">&euro;</span><a href="#"><?= $currency_data['EUR']['value'] ?> <span class="caret"></span></a>
		        </div>
		        <div class="pull-right social-block">
		        	<a href=""><img src="/img/social_fb.png"></a>
		        	<a href=""><img src="/img/social_vk.png"></a>
		        	<a href=""><img src="/img/social_tw.png"></a>
		        </div>
		        <div class="pull-right i18n-block">
		        	<?= LanguageWidget::widget() ?>
		        </div>
			</div>
		</nav>
	</div>
</div>

<div class="container main-container-area">
	<div class="row banners-block">
		<div class="col-md-12">
			<img class="img-responsive" src="/img/temp/banner.jpg">
		</div>
	</div>
	<?= $content ?>
</div>
<footer>
	<div class="container footer-container">
		<div class="row">
			<div class="col-md-4">
				<div class="footer-menu">
					<ul>
						<li><a href=""><?= Yii::t('app', 'footer.project_news') ?></a></li>
						<li><a href=""><?= Yii::t('app', 'footer.ads') ?></a></li>
						<li><a href=""><?= Yii::t('app', 'footer.support') ?></a></li>
					</ul>
					<div class="clear"></div>
				</div>

				<div class="footer-copyrights">
					&copy; olam.uz, 2016
				</div>
				<div class="social-block-footer">
		        	<a href=""><img src="/img/social_fb.png"></a>
		        	<a href=""><img src="/img/social_vk.png"></a>
		        	<a href=""><img src="/img/social_tw.png"></a>
		        </div>
			</div>
			<div class="col-md-4">
				<div class="footer-subscribe-title"><?= Yii::t('app', 'footer.subscribe_for_news') ?></div>
				<div class="footer-subscribe">
					<input type="text" class="form-control input-sm" maxlength="128" placeholder="<?= Yii::t('app', 'footer.your_email') ?>" />
				 	<button type="submit" class="btn btn-subscribe"><?= Yii::t('app', 'footer.btn') ?></button>
				</div>
			</div>
			<div class="col-md-4">
				<div class="footer-terms-of-use"><a href=""><?= Yii::t('app', 'footer.terms_of_use_site_materials') ?></a></div>
				<div class="footer-address"><?= Yii::t('app', 'footer.company_address') ?></div>
				<div class="footer-counter"><img src="/img/temp/li_counter.png"></div>
			</div>
		</div>
	</div>
</footer>
<?php
	Modal::begin ( [
	    'header' => '<h4 class="modal-title" id="registrationModalLabel">'.Yii::t('app', 'modal.registration').'</h4>',
	    'id' => 'registration-modal',
	    'size' => 'modal-width',
	    'toggleButton' => [
	        'tag' => 'a',
	        'style' => ['display' => 'none']
	    ]
	] );
	Modal::end ();
?>
<?php
	Modal::begin ( [
	    'header' => '<h4 class="modal-title" id="loginModalLabel">'.Yii::t('app', 'modal.login').'</h4>',
	    'id' => 'login-modal',
	    'size' => 'modal-width',
	    'toggleButton' => [
	        'tag' => 'a',
	        'style' => ['display' => 'none']
	    ]
	] );
	Modal::end ();
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
