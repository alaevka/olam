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
			<?php
				$last_big_new = \common\models\News::find()->where(['main_big_new' => 1])->limit(1)->one();
			?>
			<div class="col-md-8 top-new">
				<a href="/news/<?= $last_big_new->category->slug ?>/<?= $last_big_new->slug ?>"><img src="<?= Yii::$app->params['uploadsLink'] ?>/<?= $last_big_new->image_name ?>" class="img-responsive"></a>
				<a href="/news/<?= $last_big_new->category->slug ?>"><div class="top-new-category"><?= $last_big_new->category->title; ?>, <?= $last_big_new->typematerial->title; ?></div></a>
				<a href="/news/<?= $last_big_new->category->slug ?>/<?= $last_big_new->slug ?>"><h1><?= $last_big_new->title ?></h1></a>
				<a href="/news/<?= $last_big_new->category->slug ?>/<?= $last_big_new->slug ?>"><div class="top-new-subtitle">
					<?= $last_big_new->getShortText(350) ?>
				</div></a>
			</div>
			<div class="col-md-4 top-other-news">
				<h3><?= Yii::t('app', 'new.news_feed') ?></h3>
				<ul class="news-feed">
					<?php
						$right_news = \common\models\News::find()->where(['right_new' => 1])->limit(5)->all();
						foreach($right_news as $new) {
					?>
					<li>
						<a href="/news/<?= $new->category->slug ?>/<?= $new->slug ?>">
							<div class="new-date"><?= Yii::$app->formatter->asDate($new->created_at); ?></div>
							<h4><?= $new->title ?></h4>
						</a>
					</li>
					<?php } ?>
				</ul>
				<div class="all-news-link"><a href="/news"><?= Yii::t('app', 'new.all_news') ?></a></div>
			</div>
		
		<div class="row">
			<div class="col-md-12 big-new">
				<?php
					$second_big_new = \common\models\News::find()->where(['second_big_new' => 1])->limit(1)->one();
				?>
				<a href="">
					<img src="<?= Yii::$app->params['uploadsLink'] ?>/<?= $second_big_new->image_name ?>" class="img-responsive">
					<div class="caption post-content">
		                <div class="big-new-category"><?= $second_big_new->category->title; ?>, <?= $second_big_new->typematerial->title; ?></div>
        		        <h1><?= $second_big_new->title ?></h1>
		            </div>
	            </a>
			</div>
		</div>
		<div class="row other-news">
			<?php
				$main_page_news = \common\models\News::find()->where(['main_page_new' => 1])->limit(6)->all();
				foreach($main_page_news as $new) {
			?>	
			<div class="col-md-4 other-new">
				<a href="/news/<?= $new->category->slug ?>/<?= $new->slug ?>"><img class="img-responsive" src="<?= Yii::$app->params['uploadsLink'] ?>/<?= $new->image_name ?>"></a>
				<a href="/news/<?= $new->category->slug ?>/<?= $new->slug ?>"><h3><?= $new->title ?></h3></a>
				<a href="/news/<?= $new->category->slug ?>/<?= $new->slug ?>">
					<div class="other-new-subtitle">
						<?= \yii\helpers\StringHelper::truncate($new->content, 150, '...') ?>
					</div>
				</a>
				<div class="other-new-date"><?= Yii::$app->formatter->asDate($new->created_at); ?> <a href="/news/<?= $last_big_new->category->slug ?>"><?= $new->category->title; ?>, <?= $new->typematerial->title; ?></a></div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 direct-block"> 
		<img src="/img/temp/direct.jpg" class="img-responsive">
	</div>
</div>
<div class="row persons-block">
	<?php
		$last_person = \common\models\News::find()->where(['type' => 4])->orderBy('id DESC')->one();
	?>
	<div class="col-md-8 bottom-new">
		<img src="<?= Yii::$app->params['uploadsLink'] ?>/<?= $last_person->image_name; ?>" class="img-responsive">
		<div class="caption bottom-new-post-content">
            <div class="bottom-new-post-content-category"><?= $last_person->typematerial->title ?></div>
            <div class="bottom-new-post-content-title"><?= $last_person->title ?></div>
            <div class="bottom-new-post-content-subtitle"><?= \yii\helpers\StringHelper::truncate($last_person->content, 150, '...') ?></div>
            <div class="bottom-new-post-content-link">
            	<a href="/news/<?= $last_person->category->slug ?>/<?= $last_person->slug ?>"><?= Yii::t('app', 'new.read_interview') ?></a>
            </div>
        </div>
	</div>
	<div class="col-md-4 persons">
		<h3><?= Yii::t('app', 'new.persons_feed') ?></h3>
		<ul class="persons-feed">
			<?php
				$another_last_persons = \common\models\News::find()->where(['type' => 4])->orderBy('id DESC')->limit(2)->all();
				foreach($another_last_persons as $person) {
			?>
			<li>
				<a href="/news/<?= $person->category->slug ?>/<?= $person->slug ?>">
					<h4><?= $person->title ?></h4>
				</a>
				<img width="60" src="<?= Yii::$app->params['uploadsLink'] ?>/<?= $last_person->image_name; ?>" class="img-responsive" align="left"><span style="line-height: 1.3;"><?= \yii\helpers\StringHelper::truncate($person->content, 120, '...') ?></span>
				<div class="clear"></div>
			</li>
			<?php } ?>
		</ul>
		<!-- <div class="all-news-link"><a href="/persons"><?php // Yii::t('app', 'new.read_more') ?></a></div> -->
	</div>
</div>
<div class="row works-top-ads">
	<div class="works-top-ads-left-panel-vertical">
		<?= Yii::t('app', 'ads.wors') ?>
	</div>
	<div style="margin-left: 50px; float: left; width: 87%;" class="col-md-12">
		<div class="row">
			<?php
				$last_vacancy = \common\models\Vacancy::find()->orderBy('id DESC')->limit(4)->all();
				foreach($last_vacancy as $vacancy) {
			?>
			<div class="col-md-3 work-top-ads-item">
				<div class="works-top-ads-title"><a href="/work/view/vacancy/<?= $vacancy->id ?>"><?= $vacancy->title ?></a></div>
				<div class="works-top-ads-price"><?= number_format($vacancy->wage_level, 0, ',', ' ' ) ?> <?= Yii::t('app', 'works.valute') ?></div>
				<div class="works-top-ads-company"><?= $vacancy->company->company_name ?></div>
			</div>
			<?php } ?>
		</div>
		
	</div>
	<!-- <div class="col-md-1 works-top-ads-right-panel">
		<a href=""><img src="/img/refresh.png"></a>
	</div> -->
	<div class="clear"></div>
</div>
