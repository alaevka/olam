<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppBackendAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\web\View;

AppBackendAsset::register($this);
$active_url_str = Yii::$app->controller->id;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Система управления сайтом</title>
    <?php $this->head() ?>
    <!--[if lt IE 9]><script src="/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="page-body">
<?php $this->beginBody() ?>
	<div class="page-container chat-visible">
	<div class="sidebar-menu">
		<div class="sidebar-menu-inner">
			<header class="logo-env">
				<div class="logo">
					<a href="">
						<img src="/images/logo.png" width="120" alt="" />
					</a>
				</div>

				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon">
						<i class="entypo-menu"></i>
					</a>
				</div>
				
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation">
						<i class="entypo-menu"></i>
					</a>
				</div>
			</header>
			<ul id="main-menu" class="main-menu">
				<li <?php if($active_url_str == 'newscategory' || $active_url_str == 'news') { ?>class="opened active"<?php } ?>>
					<a href="#">
						<i class="entypo-list"></i>
						<span class="title">Новости</span>
					</a>
					<ul>
						<li <?php if($active_url_str == 'newscategory') { ?>class="active"<?php } ?>>
							<a href="<?= Url::to(['/newscategory/index']) ?>">
								<span class="title">Категории новостей</span>
							</a>
						</li>
						<li <?php if($active_url_str == 'news') { ?>class="active"<?php } ?>>
							<a href="<?= Url::to(['/news/index']) ?>">
								<span class="title">Список новостей</span>
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">
						<i class="entypo-network"></i>
						<span class="title">Недвижимость</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="entypo-rocket"></i>
						<span class="title">Авто</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="entypo-vcard"></i>
						<span class="title">Работа</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="entypo-sound"></i>
						<span class="title">Объявления</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="entypo-picture"></i>
						<span class="title">Афиша</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="entypo-monitor"></i>
						<span class="title">ТВ</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="main-content">
		<div class="row">
			<div class="col-md-6 col-sm-8 clearfix">
				<h3>Система управления сайтом olam.uz</h3>
			</div>
			<div class="col-md-6 col-sm-4 clearfix hidden-xs">
				<ul class="list-inline links-list pull-right">
					<li class="sep"></li>
					<li>
						<a data-method="post" href="<?= Url::to(['/user/security/logout']); ?>">
							Выйти из системы <i class="entypo-logout right"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<hr />

		<?= Breadcrumbs::widget([
			'homeLink' => [ 
                'label' => 'Ситема управления',
                'url' => Yii::$app->homeUrl,
             ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

		<?= $content ?>
		
	</div>
</div>

<?php if (Yii::$app->getSession()->hasFlash('admin_flash_message')): ?>
    <?=
        $this->registerJs(
            "
            	toastr.info('".Yii::$app->getSession()->getFlash('admin_flash_message')."');
            ", 
            View::POS_END, 
            'flash_message'
        );
    ?>
<?php endif; ?>   
   
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
