<?php
/**
 * @var View $this
 * @var SourceMessage $model
 */

use yii\helpers\Html;
use yii\web\View;
use Zelenin\yii\modules\I18n\models\SourceMessage;
use Zelenin\yii\modules\I18n\Module;
use Zelenin\yii\SemanticUI\collections\Breadcrumb;
use Zelenin\yii\SemanticUI\Elements;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Изменение' . ': ' . $model->message;
$this->params['breadcrumbs'][] = ['label' => 'Языковые настройки', 'url' => ['/translations']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel minimal">
    <!-- panel head -->
    <div class="panel-heading">
        <div class="panel-title"><?= $this->title; ?></div>
        <div class="panel-options">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab1" data-toggle="tab"><?= $this->title ?></a>
                </li>
                
                <li class="">
                    <a href="<?= Url::to(['/translations']) ?>"><i class="entypo-menu"></i> Список слов и фраз для перевода</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- panel body -->
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <!-- <b>Переменная для перевода: <?= Elements::segment(Html::encode($model->message), []) ?></b> -->
                <?php $form = ActiveForm::begin([
                    'options' => ['class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data'],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-sm-5\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-5\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-sm-3 control-label'],
                    ],
                ]); ?>
                <div class="field">
                    <div class="ui grid">
                        <?php foreach ($model->messages as $language => $message) : ?>
                            <div class="four wide column">
                                <?= $form->field($model->messages[$language], '[' . $language . ']translation')->label($language) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => 'btn btn-success']) ?><br>
                    </div>
                </div>  
                <?php $form::end(); ?>                          
            </div>
        </div>
    </div>
</div>



