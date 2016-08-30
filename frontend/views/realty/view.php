<?php
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\widgets\ListView;
	use yii\helpers\Url;
	$this->title = Yii::t('app', 'rlty.create_add');
?>

<div class="row">
    <div class="col-md-12 central-content object-model" id="central-content">
    	<div class="object-breadcrumbs"><?= $model->location->location; ?> / <?= $model->_getType() ?><?= $model->_getAction() ?><?= $model->_getRoomsCount() ?><?= $model->location_raion; ?> / <?= $model->location_street; ?> / <?= $model->_getVariant() ?></div>
        <h1><?= $model->title; ?></h1>
        <h3><?= $model->_getVariant() ?>, <?= Yii::t('app', 'rlty.date_updated') ?>: <?= date("d.m.Y", $model->updated_at) ?>, <?= Yii::t('app', 'rlty.date_created') ?>: <?= date("d.m.Y", $model->created_at) ?>, <?= Yii::t('app', 'rlty.views_count') ?>: 0</h3>
		
		<div class="row">
			<div class="col-md-6">
				<div><?= $model->location->location; ?>, <?= $model->location_raion; ?>, <?= $model->location_street; ?>, <?= $model->location_house; ?></div>
		       	<div class="price"><?= number_format($model->price, 0, ',', ' ' ); ?> руб. <span><?= $model->_getPriceOneMeter() ?></span></div>
			    <h4><?= Yii::t('app', 'rlty.area') ?></h4>
			    <div><?= Yii::t('app', 'rlty.area_total') ?>: <?= $model->area_total; ?> м2</div>
			    <div><?= Yii::t('app', 'rlty.area_for_living') ?>: <?= $model->area_for_living; ?> м2</div>
			    <div><?= Yii::t('app', 'rlty.area_kitchen') ?>: <?= $model->area_kitchen; ?> м2</div>
			    <h4><?= Yii::t('app', 'rlty.details') ?></h4>
			    <div>
			    	<table class="table">
						<tr>
							<td><?= Yii::t('app', 'rlty.level') ?></td>
							<td><?= $model->level ?></td>
						</tr>
						<tr>
							<td><?= Yii::t('app', 'rlty.total_levels') ?></td>
							<td><?= $model->total_levels ?></td>
						</tr>
						<tr>
							<td><?= Yii::t('app', 'rlty.house_material') ?></td>
							<td><?= $model->houseMaterial->title ?></td>
						</tr>
						<tr>
							<td><?= Yii::t('app', 'rlty.flat_type') ?></td>
							<td><?= $model->flatType->title ?></td>
						</tr>
						<tr>
							<td><?= Yii::t('app', 'rlty.flat_plan') ?></td>
							<td><?= $model->flatPlan->title ?></td>
						</tr>
						<tr>
							<td><?= Yii::t('app', 'rlty.flat_repairs') ?></td>
							<td><?= $model->flatRepairs->title ?></td>
						</tr>
			    	</table>
			    </div>
			    <h4><?= Yii::t('app', 'rlty.additional_info') ?></h4>
			    <div><?= $model->additional_info; ?></div>
			    <h4><?= Yii::t('app', 'rlty.contacts') ?></h4>
			    <div class="contacts-block">
			    	<div class="username"><?= $model->contacts_username ?></div>
			    	<div class="phone"><?= $model->contacts_phone ?></div>
			    	<div class="sendmail"><a href="mailto:<?= $model->contacts_email ?>"><?= Yii::t('app', 'rlty.write_on_email') ?></a></div>
			    </div>
			</div>
			<div class="col-md-6">
				<div class="row">
				    <div class="row">
				        <div class="col-md-12" id="slider">
			                <div class="col-md-12" id="carousel-bounding-box">
			                    <div id="gallery-slides" class="carousel slide" data-ride="carousel">
			                        <!-- main slider carousel items -->
			                        <div class="carousel-inner" role="listbox">
			                            <?php 
			                            	$gallery = \common\models\Adsgallery::find()->where(['ads_id' => $model->id])->all();
				        					$i = 0;
				        					foreach($gallery as $item) {
				        				?>
			                            <div class="<?php if($i == 0) { ?>active<?php } ?> item" data-slide-number="<?= $i; ?>">
			                                <img src="/uploads/objects/<?= $item->image_name; ?>" class="img-responsive">
			                            </div>
			                            <?php $i++; ?>
			                            <?php } ?>
			                        </div>
			                        <a class="carousel-control left" href="#gallery-slides" data-slide="prev">‹</a>
			                        <a class="carousel-control right" href="#gallery-slides" data-slide="next">›</a>
			                    </div>
			                </div>
				        </div>
				    </div>
				    <div class="col-md-12 hidden-sm hidden-xs" id="slider-thumbs">
	            		<!-- thumb navigation carousel items -->
	        			<ul class="list-inline">
	        				<?php 
	        					$i = 0;
	        					foreach($gallery as $item) {
	        				?>
		          			<li>
		          				<a id="carousel-selector-<?= $i; ?>" class="selected">
		            				<img width="60" src="/uploads/objects/cropped_<?= $item->image_name; ?>" class="img-responsive">
		          				</a>
		          			</li>
		          			<?php $i++; ?>
		          			<?php } ?>
			            </ul>
        			</div>
				    <?php
				    	$script = '
							$("#gallery-slides").carousel({
							    interval: 4000
							});
							
							$("[id^=carousel-selector-]").click( function(){
							  var id_selector = $(this).attr("id");
							  var id = id_selector.substr(id_selector.length -1);
							  id = parseInt(id);
							  $("#gallery-slides").carousel(id);
							  $("[id^=carousel-selector-]").removeClass(\'selected\');
							  $(this).addClass(\'selected\');
							});

							// when the carousel slides, auto update
							$("#gallery-slides").on(\'slid\', function (e) {
							  var id = $(".item.active").data("slide-number");
							  id = parseInt(id);
							  $("[id^=carousel-selector-]").removeClass(\'selected\');
							  $("[id=carousel-selector-\'+id+\']").addClass(\'selected\');
							});	

				    	';
				    	$this->registerJs($script, yii\web\View::POS_READY);
				    ?>
				</div>
			</div>
		</div>
		<div class="similar">
			<h4><?= Yii::t('app', 'rlty.similar_offers') ?></h4>
			<?php
                $header = '
                    <div class="col-md-12">
                    <div class="row header-list">
                        <div class="col-xs-1">'.Yii::t('app', 'rlty.date').'</div>
                        <div class="col-xs-1">'.Yii::t('app', 'rlty.photo').'</div>
                        <div class="col-xs-1">'.Yii::t('app', 'rlty.rooms').'</div>
                        <div class="col-xs-1">'.Yii::t('app', 'rlty.city').'</div>
                        <div class="col-xs-1">'.Yii::t('app', 'rlty.raion').'</div>
                        <div class="col-xs-1">'.Yii::t('app', 'rlty.street').'</div>
                        <div class="col-xs-1">'.Yii::t('app', 'rlty.house').'</div>
                        <div class="col-xs-1">'.Yii::t('app', 'rlty.area').'</div>
                        <div class="col-xs-1">'.Yii::t('app', 'rlty.level').'</div>
                        <div class="col-xs-2">'.Yii::t('app', 'rlty.price').'</div>
                        <div class="col-xs-1">'.Yii::t('app', 'rlty.username').'</div>
                    </div>
                    </div>
                ';
            ?>
            <?php \yii\widgets\Pjax::begin() ?>

            <?= 
                ListView::widget([
                    'dataProvider' => $listDataProvider,
                    'itemView' => '_object_item',
                    'layout' => $header."{items}<hr><div class=\"col-md-12 pagination-container\">{pager}</div>",
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