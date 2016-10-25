<?php 
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
?>