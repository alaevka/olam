<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppBackendAsset;
use yii\helpers\Html;
use common\widgets\Alert;
use yii\helpers\Url;

AppBackendAsset::register($this);
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
				<li class="opened active">
					<a href="#">
						<i class="entypo-list"></i>
						<span class="title">Новости</span>
					</a>
					<ul>
						<li>
							<a href="#">
								<span class="title">Категории</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="title">Новости</span>
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
		<ol class="breadcrumb bc-3" >
			<li>
				<a href="index.html"><i class="fa-home"></i>Home</a>
			</li>
			<li>
				<a href="layout-api.html">Layouts</a>
			</li>
			<li class="active">
				<strong>Chat Open</strong>
			</li>
		</ol>
					
		<?= $content ?>
		
	</div>
</div>
    
   
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
