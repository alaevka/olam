<?php 
if($category == 1 || $category == 4 || $category == 7) {
?>
<div class="row other-new" style="margin-bottom: 20px; margin-left: 0px; margin-right: 0px;">
    <div class="col-md-3">
        <a data-pjax="0" href="/afisha/<?= $model->slug ?>"><img class="img-responsive" src="/uploads/afisha/<?= $model->image_name; ?>"></a>
    </div>
    <div class="col-md-9">
        <div class="other-new-date" style="margin-bottom: 0px;"><?= Yii::$app->formatter->asDate($model->created_at); ?></div>
        <a data-pjax="0" href="/afisha/<?= $model->slug ?>"><h3><?= $model->title; ?></h3></a>
        <a data-pjax="0" href="/afisha/<?= $model->slug ?>">
            <div class="other-new-subtitle">
               <?= \yii\helpers\StringHelper::truncate($model->content, 150, '...') ?>
            </div>
        </a>
        
    </div>
</div>
<?php
} elseif($category == 2 || $category == 3 || $category == 5 || $category == 6) {
?>
<div class="row other-new" style="margin-bottom: 20px; margin-left: 0px; margin-right: 0px;">
    <div class="col-md-3">
        <a data-pjax="0" href="/afisha/<?= $model->slug ?>"><img class="img-responsive" src="/uploads/afisha/<?= $model->image_name; ?>"></a>
    </div>
    <div class="col-md-9">
        <a data-pjax="0" href="/afisha/<?= $model->slug ?>"><h3><?= $model->title; ?></h3></a>
        <a data-pjax="0" href="/afisha/<?= $model->slug ?>">
            <div class="other-new-subtitle">
               <?= $model->address ?>
            </div>

        </a>
        <div style="color: #ff7a1b; font-weight: 700;"><?= $model->tags ?></div>
    </div>
</div>
<?php
} else {    
	if($index == 0 || $index == 6 || $index == 10) {
		$block_class = 'col-md-8';
	} else {
		$block_class = 'col-md-4';
	}
?>
<div class="<?= $block_class ?> other-new new-block-height">
    <a data-pjax="0" href="/afisha/<?= $model->slug ?>"><img class="img-responsive" src="/uploads/afisha/<?= $model->image_name; ?>"></a>
    <a data-pjax="0" href="/afisha/<?= $model->slug ?>"><h3><?= $model->title; ?></h3></a>
    <a data-pjax="0" href="/afisha/<?= $model->slug ?>">
        <div class="other-new-subtitle">
           <?= \yii\helpers\StringHelper::truncate($model->content, 150, '...') ?>
        </div>
    </a>
    <div class="other-new-date"><?= Yii::$app->formatter->asDate($model->created_at); ?> <a data-pjax="0" class="pull-right afisha-category-link" href="/afisha/category/<?= $model->category_id ?>"><?= $model->_getCategoryId(); ?></a></div>
</div>
<?php
	if($index == 1 || $index == 11 || $index == 14) echo '<div style="clear: left;"></div>';
}
?>