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
use yii\widgets\Menu;

/** @var dektrium\user\models\User $user */
$user = Yii::$app->user->identity;
$networksVisible = count(Yii::$app->authClientCollection->clients) > 0;

?>

<div class="panel">
    <div>
        <?= Menu::widget([
            'options' => [
                'class' => 'nav bs-docs-sidenav profile-side',
            ],
            'items' => [
                ['label' => Yii::t('app', 'user.profile'), 'url' => ['/user/profile'], 'active' => Yii::$app->controller->action->id == 'account' ? true : false],
                ['label' => Yii::t('app', 'user.realty_objects'), 'url' => ['/user/objects/realty'], 'active' => Yii::$app->controller->action->id == 'objectsrealty' ? true : false],
                ['label' => Yii::t('app', 'user.auto_objects'), 'url' => ['/user/objects/auto'], 'active' => Yii::$app->controller->action->id == 'objectsauto' ? true : false],
                ['label' => Yii::t('app', 'user.vacancy_objects'), 'url' => ['/user/objects/vacancy'], 'active' => Yii::$app->controller->action->id == 'objectsvacancy' ? true : false],
                ['label' => Yii::t('app', 'user.resume_objects'), 'url' => ['/user/objects/resume'], 'active' => Yii::$app->controller->action->id == 'objectsresume' ? true : false],
                ['label' => Yii::t('app', 'user.ads_objects'), 'url' => ['/user/objects/ads'], 'active' => Yii::$app->controller->action->id == 'objectsads' ? true : false],
                [
                    'label' => Yii::t('app', 'user.social_networs'),
                    'url' => ['/user/social'],
                    'visible' => $networksVisible
                ],
            ],
        ]) ?>
    </div>
</div>
