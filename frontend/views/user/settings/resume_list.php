<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ListView;
/**
 * @var $this  yii\web\View
 * @var $form  yii\widgets\ActiveForm
 * @var $model dektrium\user\models\SettingsForm
 */

$this->title = Yii::t('app', 'user.resume_objects');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12 central-content" id="central-content">
        <h1><?= Yii::t('app', 'user.resume_objects') ?> <span class="pull-right user-email-login"><?= Yii::$app->user->identity->email ?></span></h1>
    </div>
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-9">
        <?php \yii\widgets\Pjax::begin() ?>
        <?= 
            ListView::widget([
                'dataProvider' => $listDataProvider,
                'itemView' => '_resume_item',
                'layout' => "{items}<hr><div class=\"col-md-12 pagination-container\">{pager}</div>",
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
