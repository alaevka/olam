<?php
	use yii\widgets\ListView;
    use yii\helpers\Url;
?>
<div class="row" style="margin-right: -65px;">
	<ul class="nav nav-pills afisha-nav nav-justified">
		<li role="presentation" <?php if($category == 1) { ?>class="active"<?php } ?>><a href="<?= Url::to(['/afisha/category/1']) ?>">Новости</a></li>
		<li role="presentation" <?php if($category == 2) { ?>class="active"<?php } ?>><a href="<?= Url::to(['/afisha/category/2']) ?>">Кинотеатры</a></li>
		<li role="presentation" <?php if($category == 3) { ?>class="active"<?php } ?>><a href="<?= Url::to(['/afisha/category/3']) ?>">Театры</a></li>
		<li role="presentation" <?php if($category == 4) { ?>class="active"<?php } ?>><a href="<?= Url::to(['/afisha/category/4']) ?>">Искусство</a></li>
		<li role="presentation" <?php if($category == 5) { ?>class="active"<?php } ?>><a href="<?= Url::to(['/afisha/category/5']) ?>">Рестораны</a></li>
		<li role="presentation" <?php if($category == 6) { ?>class="active"<?php } ?>><a href="<?= Url::to(['/afisha/category/6']) ?>">Клубы</a></li>
		<li role="presentation" <?php if($category == 7) { ?>class="active"<?php } ?>><a href="<?= Url::to(['/afisha/category/7']) ?>">Активный отдых</a></li>
	</ul>
</div>
<div class="row">
    <div class="col-md-12 central-content central-content-afisha" id="central-content">
		<div class="header-page-afisha">
		    <h1><?= Yii::t('app', 'top_mnu.poster') ?></h1>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-12 central-content" id="central-content">
        <div class="row news-list">
        <?php \yii\widgets\Pjax::begin() ?>
        <?= 
            ListView::widget([
                'dataProvider' => $listDataProvider,
                'itemView' => '_afisha_item',
                'layout' => "{items}<hr><div class=\"col-md-12 pagination-container\">{pager}</div>",
                'emptyText' => Yii::t('app', 'news.not_yet_been_added_to_this_category_news'),
                'emptyTextOptions' => ['class' => 'not_yet_been'],
                'pager' => [
                    'options' => [
                        
                        'class' => 'pagination',
                        
                    ],
                ]
            ]); 
        ?>
        <?php \yii\widgets\Pjax::end() ?>
        </div>
    </div>
</div>
<?= $this->render('/direct/bottom_block'); ?>