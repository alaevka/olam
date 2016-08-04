<?php

use frontend\components\NewsLeftMenuWidget;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'olam development';
?>

<div class="row">
	<div class="col-md-3">
		<div class="row">
			<div class="col-md-12">
				<?= NewsLeftMenuWidget::widget() ?>
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
