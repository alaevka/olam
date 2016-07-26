<?php

/* @var $this yii\web\View */

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
	 	                <li><a href="#"><?= Yii::t('app', 'top_mnu.news') ?></a></li>
		                <li><a href="#"><?= Yii::t('app', 'top_mnu.realty') ?></a></li>
		                <li><a href="#"><?= Yii::t('app', 'top_mnu.auto') ?></a></li>
		                <li><a href="#"><?= Yii::t('app', 'top_mnu.work') ?></a></li>
		                <li><a href="#"><?= Yii::t('app', 'top_mnu.ads') ?></a></li>
		                <li><a href="#"><?= Yii::t('app', 'top_mnu.poster') ?></a></li>
		                <li><a href="#"><?= Yii::t('app', 'top_mnu.tv') ?></a></li>
		                <li><a href="#"><?= Yii::t('app', 'top_mnu.search') ?></a></li>
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

		        <!-- <ul class="pull-right">
		        	<li>lang</li>
		        	<li>auth</li>
		        </ul> -->
			</div>
		</nav>
	</div>
</div>

<div class="container main-container-area">
	<div class="row"></div>
</div>