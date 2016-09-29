<?php
	use kartik\tree\TreeView;
	use common\models\AdsCategories;

	$this->title = 'Список категорий';
	$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel minimal">
	<!-- panel head -->
	<div class="panel-heading">
		<div class="panel-title"><?= $this->title; ?></div>
		<div class="panel-options">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1" data-toggle="tab">Список категорий</a>
				</li>
			</ul>
		</div>
	</div>
	
	<!-- panel body -->
	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
				<?php
					echo TreeView::widget([
					    // single query fetch to render the tree
					    // use the Product model you have in the previous step
					    'query' => AdsCategories::find()->addOrderBy('root, lft'), 
					    'headingOptions' => ['label' => ''],
					    'fontAwesome' => false,     // optional
					    'isAdmin' => false,         // optional (toggle to enable admin mode)
					    'displayValue' => 1,        // initial display value
					    'softDelete' => true,       // defaults to true
					    'cacheSettings' => [        
					        'enableCache' => true   // defaults to true
					    ],
					    'iconEditSettings'=> [
        					'show' => 'none',
        				]
					]);
				?>	
			</div>
		</div>
	</div>
</div>

