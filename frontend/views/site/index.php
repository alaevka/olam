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
			<div class="row ads-left-banner">
				<img src="/img/temp/ads.jpg" class="img-responsive">
			</div>
			<div class="row ads-left-banner">
				<img src="/img/temp/bads2.jpg" class="img-responsive">
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
			<div class="row other-news">
				<div class="col-md-4 other-new">
					<a href=""><img class="img-responsive" src="/img/temp/new1.jpg"></a>
					<a href=""><h3>Небольшая квартира для молодой пары в городе</h3></a>
					<a href="">
						<div class="other-new-subtitle">
							Две комнаты, светлый интерьер и стеклянная перегородка между спальней и гостиной
						</div>
					</a>
					<div class="other-new-date"><?= Yii::t('app', 'new.date') ?> <a href=""><?= Yii::t('app', 'new.category') ?></a></div>
				</div>
				<div class="col-md-4 other-new">
					<a href=""><img class="img-responsive" src="/img/temp/new2.jpg"></a>
					<a href=""><h3>Небольшая квартира для молодой пары в городе</h3></a>
					<a href="">
						<div class="other-new-subtitle">
							Две комнаты, светлый интерьер и стеклянная перегородка между спальней и гостиной
						</div>
					</a>
					<div class="other-new-date"><?= Yii::t('app', 'new.date') ?> <a href=""><?= Yii::t('app', 'new.category') ?></a></div>
				</div>
				<div class="col-md-4 other-new">
					<a href=""><img class="img-responsive" src="/img/temp/new3.jpg"></a>
					<a href=""><h3>Небольшая квартира для молодой пары в городе</h3></a>
					<a href="">
						<div class="other-new-subtitle">
							Две комнаты, светлый интерьер и стеклянная перегородка между спальней и гостиной
						</div>
					</a>
					<div class="other-new-date"><?= Yii::t('app', 'new.date') ?> <a href=""><?= Yii::t('app', 'new.category') ?></a></div>
				</div>
				<div class="col-md-4 other-new">
					<a href=""><img class="img-responsive" src="/img/temp/new4.jpg"></a>
					<a href=""><h3>Небольшая квартира для молодой пары в городе</h3></a>
					<a href="">
						<div class="other-new-subtitle">
							Две комнаты, светлый интерьер и стеклянная перегородка между спальней и гостиной
						</div>
					</a>
					<div class="other-new-date"><?= Yii::t('app', 'new.date') ?> <a href=""><?= Yii::t('app', 'new.category') ?></a></div>
				</div>
				<div class="col-md-4 other-new">
					<a href=""><img class="img-responsive" src="/img/temp/new5.jpg"></a>
					<a href=""><h3>Небольшая квартира для молодой пары в городе</h3></a>
					<a href="">
						<div class="other-new-subtitle">
							Две комнаты, светлый интерьер и стеклянная перегородка между спальней и гостиной
						</div>
					</a>
					<div class="other-new-date"><?= Yii::t('app', 'new.date') ?> <a href=""><?= Yii::t('app', 'new.category') ?></a></div>
				</div>
				<div class="col-md-4 other-new">
					<a href=""><img class="img-responsive" src="/img/temp/new6.jpg"></a>
					<a href=""><h3>Небольшая квартира для молодой пары в городе</h3></a>
					<a href="">
						<div class="other-new-subtitle">
							Две комнаты, светлый интерьер и стеклянная перегородка между спальней и гостиной
						</div>
					</a>
					<div class="other-new-date"><?= Yii::t('app', 'new.date') ?> <a href=""><?= Yii::t('app', 'new.category') ?></a></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 direct-block"> 
			<img src="/img/temp/direct.jpg" class="img-responsive">
		</div>
	</div>
	<div class="row persons-block">
		<div class="col-md-8 bottom-new">
			<img src="/img/temp/bottom_new.jpg" class="img-responsive">
			<div class="caption bottom-new-post-content">
                <div class="bottom-new-post-content-category"><?= Yii::t('app', 'new.category') ?></div>
                <div class="bottom-new-post-content-title">"Интерактивная игра, в которой нужно угадать" ответы предыдущего читателя</div>
                <div class="bottom-new-post-content-subtitle">Петербуржец — о том, как именно он поймал рекордное количество покемонов ответы предыдущего читателя</div>
                <div class="bottom-new-post-content-link">
                	<a href=""><?= Yii::t('app', 'new.read_interview') ?></a>
                </div>
            </div>
		</div>
		<div class="col-md-4 persons">
			<h3><?= Yii::t('app', 'new.persons_feed') ?></h3>
			<ul class="persons-feed">
				<li>
					<a href="">
						<h4>Петербуржец — о том, как именно он поймал рекордное количество покемонов</h4>
					</a>
					<img src="/img/temp/person.jpg" class="img-responsive" align="left"><span>Интерактивная игра, в которой нужно угадать ответы предыдущего читателя</span>
					<div class="clear"></div>
				</li>
				<li>
					<a href="">
						<h4>Петербуржец — о том, как именно он поймал рекордное количество покемонов</h4>
					</a>
					<img src="/img/temp/person.jpg" class="img-responsive" align="left"><span>Интерактивная игра, в которой нужно угадать ответы предыдущего читателя</span>
					<div class="clear"></div>
				</li>
			</ul>
			<div class="all-news-link"><a href=""><?= Yii::t('app', 'new.read_more') ?></a></div>
		</div>
	</div>
	<div class="row works-top-ads">
		<div class="works-top-ads-left-panel-vertical">
			<?= Yii::t('app', 'ads.wors') ?>
		</div>
		<div style="margin-left: 50px; float: left; width: 87%;" class="col-md-12">
			<div class="row">
				<div class="col-md-3 work-top-ads-item">
					<div class="works-top-ads-title"><a href="">Менеджер по продажам</a></div>
					<div class="works-top-ads-price">до 45 000 руб.</div>
					<div class="works-top-ads-company">ООО НПП "Сенсор"</div>
				</div>
				<div class="col-md-3 work-top-ads-item">
					<div class="works-top-ads-title"><a href="">Менеджер по продажам</a></div>
					<div class="works-top-ads-price">до 45 000 руб.</div>
					<div class="works-top-ads-company">ООО НПП "Сенсор"</div>
				</div>
				<div class="col-md-3 work-top-ads-item">
					<div class="works-top-ads-title"><a href="">Менеджер по продажам</a></div>
					<div class="works-top-ads-price">до 45 000 руб.</div>
					<div class="works-top-ads-company">ООО НПП "Сенсор"</div>
				</div>
				<div class="col-md-3 work-top-ads-item">
					<div class="works-top-ads-title"><a href="">Менеджер по продажам</a></div>
					<div class="works-top-ads-price">до 45 000 руб.</div>
					<div class="works-top-ads-company">ООО НПП "Сенсор"</div>
				</div>
			</div>
			
		</div>
		<div class="col-md-1 works-top-ads-right-panel">
			<a href=""><img src="/img/refresh.png"></a>
		</div>
		<div class="clear"></div>
	</div>
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