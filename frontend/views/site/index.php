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
		            <a class="navbar-brand" href="<?= Url::to(['/']) ?>">
		                <img src="/img/logo.png">
		            </a>
		        </div>
		        
		        <div class="pull-right auth-block">
		        	<?php if(Yii::$app->user->isGuest) { ?>
			        	<a class="login-link" id="login-link"  data-toggle="modal" data-target="#login-modal" href="<?= Url::to(['/user/login']) ?>"><?= Yii::t('app', 'user.login') ?></a><a class="register-link" id="register-link" href="<?= Url::to(['/user/registration/register']) ?>" data-toggle="modal" data-target="#registration-modal"><?= Yii::t('app', 'user.register') ?></a>

					<?php } else { ?>
						<a class="register-link" data-method="post" href="<?= Url::to(['/user/security/logout']); ?>"><?= Yii::t('app', 'logout') ?></a>
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
	<div class="row">
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-12">
					<ul class="lft_mnu">
						<li><a href=""><?= Yii::t('app', 'lft_mnu.uzbekistan') ?></a></li>
						<li><a href=""><?= Yii::t('app', 'lft_mnu.ussr_cntr') ?></a></li>
						<li><a href=""><?= Yii::t('app', 'lft_mnu.world') ?></a></li>
						<li><a href=""><?= Yii::t('app', 'lft_mnu.sport') ?></a></li>
						<li><a href=""><?= Yii::t('app', 'lft_mnu.business') ?></a></li>
						<li><a href=""><?= Yii::t('app', 'lft_mnu.tech') ?></a></li>
						<li><a href=""><?= Yii::t('app', 'lft_mnu.culture') ?></a></li>
						<li><a href=""><?= Yii::t('app', 'lft_mnu.internet') ?></a></li>
						<li><a href=""><?= Yii::t('app', 'lft_mnu.travel') ?></a></li>
						<li><a href=""><?= Yii::t('app', 'lft_mnu.photo') ?></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			
				<div class="col-md-8 top-new">
					<a href="#"><img src="/img/temp/top_new.jpg" class="img-responsive"></a>
					<a href="#"><div class="top-new-category"><?= Yii::t('app', 'new.category') ?></div></a>
					<a href="#"><h1>Как и зачем художница Катрин Ненашева гуляет по городу, привязанная к кровати</h1></a>
					<a href="#"><div class="top-new-subtitle">Вчера стало известно о петербургском студенте, поймавшем всех покемонов, которых можно получить в игре Pokémon GO. Чтобы побить предыдущий рекорд по ловле покемонов, 19-летнему Георгию Тимофееву (в игре — Gosha443) пришлось потратить две недели, пройти 60 километров..</div></a>
				</div>
				<div class="col-md-4 top-other-news">
					<h3><?= Yii::t('app', 'new.news_feed') ?></h3>
					<ul class="news-feed">
						<li>
							<a href="">
								<div class="new-date"><?= Yii::t('app', 'new.date') ?></div>
								<h4>Петербуржец — о том, как именно он поймал рекордное количество покемонов</h4>
							</a>
						</li>
						<li>
							<a href="">
								<div class="new-date"><?= Yii::t('app', 'new.date') ?></div>
								<h4>Директору Библиотеки украинской литературы продлили домашний арест</h4>
							</a>
						</li>
						<li>
							<a href="">
								<div class="new-date"><?= Yii::t('app', 'new.date') ?></div>
								<h4>Владимир Путин — о целенаправленной кампании против российских спортсменов</h4>
							</a>
						</li>
						<li>
							<a href="">
								<div class="new-date"><?= Yii::t('app', 'new.date') ?></div>
								<h4>На руководителя приюта для животных «Эко Вешняки» завели уголовное дело</h4>
							</a>
						</li>
					</ul>
					<div class="all-news-link"><a href=""><?= Yii::t('app', 'new.all_news') ?></a></div>
				</div>
			
			<div class="row">
				<div class="col-md-12 big-new">
					<a href="">
						<img src="/img/temp/big_new.jpg" class="img-responsive">
						<div class="caption post-content">
			                <div class="big-new-category"><?= Yii::t('app', 'new.category') ?></div>
	        		        <h1>«Конь БоДжек» и ещё 6 хороших мультсериалов для взрослых</h1>
			            </div>
		            </a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">1</div>
				<div class="col-md-4">2</div>
				<div class="col-md-4">3</div>
				<div class="col-md-4">4</div>
				<div class="col-md-4">5</div>
				<div class="col-md-4">6</div>
				<div class="col-md-4">7</div>
			</div>
		</div>
	</div>
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