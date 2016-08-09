<div class="col-md-12 other-new">
    <a data-pjax="0" href="/news/<?= $model->category->slug ?>/<?= $model->slug ?>"><h3><?= $model->title; ?></h3></a>
    <div class="other-new-date"><?= Yii::$app->formatter->asDate($model->created_at); ?> <a data-pjax="0" href="/news/<?= $model->category->slug ?>"><?= $model->category->title; ?></a> <?= Yii::t('app', 'app.count_views') ?>: 200</div>
</div>
