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
        
        <div class="header-page">
            <h1><?= Yii::t('app', 'top_mnu.auto') ?></h1>
        </div>
        <div class="row last_10_objects">
            <?php
                foreach($last_10_objects as $object) {
            ?>
            <div class="col-md-3 object-item">
                <a href="<?= Url::to(['/auto/view/', 'id' => $object->id]) ?>">
                    <img class="img-responsive" src="/uploads/auto/<?= $object->_getImage() ?>">
                    <div class="price"><?= number_format($object->price, 0, ',', ' ' ); ?> руб.</div>
                    <div class="flat_type"><?=  $object->marka->name.'-'.$object->modelauto->name ?></div>
                    <div class="flat_location"><?= $object->tech_construction_year ?>, <?= $object->_getFuel() ?>, <?= number_format($object->tech_mileage, 0, ',', ' ' ); ?> <?= Yii::t('app', 'auto.mileage_val') ?>, <?= $object->location->location ?></div>
                </a>
            </div>
            <?php } ?>
            
        </div>

    </div>
</div>
<?= $this->render('/direct/bottom_block'); ?>