<div class="col-md-4 other-new new-block-height">
    <a href="/news/<?= $model->category->slug ?>/<?= $model->slug ?>"><img class="img-responsive" src="<?= Yii::$app->params['uploadsLink'] ?>/<?= $model->image_name; ?>"></a>
    <a href="/news/<?= $model->category->slug ?>/<?= $model->slug ?>"><h3><?= $model->title; ?></h3></a>
    <a href="/news/<?= $model->category->slug ?>/<?= $model->slug ?>">
        <div class="other-new-subtitle">
           <?= \yii\helpers\StringHelper::truncate($model->content, 150, '...') ?>
        </div>
    </a>
    <div class="other-new-date"><?= Yii::$app->formatter->asDate($model->created_at); ?> <a href=""><?= $model->category->title; ?></a></div>
</div>
