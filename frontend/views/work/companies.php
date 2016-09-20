<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\web\View;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<div class="row">
    <div class="col-md-12 central-content" id="central-content">
        <?= $this->render('/work/_works_header'); ?>
        <div>
            <h1><?= Yii::t('app', 'work.your_companies') ?> <a href="<?= Url::to(['/work/create/company']) ?>" class="btn btn-blue pull-right"><?= Yii::t('app', 'work.add_company') ?></a></h1>

            <?php \yii\widgets\Pjax::begin() ?>
                <?= 
                    ListView::widget([
                        'dataProvider' => $listDataProvider,
                        'itemView' => '_company_item',
                        'layout' => "{items}<hr><div class=\"col-md-12 pagination-container\">{pager}</div>",
                        'emptyText' => Yii::t('app', 'works.not_yet_been_added_to_your_companies'),
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
