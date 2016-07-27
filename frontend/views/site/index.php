<?php

use frontend\components\LanguageWidget;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */


$currency_data = Yii::$app->CbRF->filter(['currency' => 'usd, eur'])->all();


$this->title = 'olam development';
?>
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
			                	<div class="container-search">
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
		            <a class="navbar-brand" href="#">
		                <img src="/img/logo.png">
		            </a>
		        </div>
		        
		        <div class="pull-right auth-block">
		        	<?php if(Yii::$app->user->isGuest) { ?>
			        	<a class="login-link" href=""><?= Yii::t('app', 'user.login') ?></a><a class="register-link" id="register-link" href="<?= Url::to(['/user/registration/register']) ?>" data-toggle="modal" data-target="#registration-modal"><?= Yii::t('app', 'user.register') ?></a>

					<?php } else { ?>
						<a data-method="post" href="<?= Url::to(['/user/security/logout']); ?>"><?= Yii::t('app', 'logout') ?></a>
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
	<div class="row"></div>
</div>
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