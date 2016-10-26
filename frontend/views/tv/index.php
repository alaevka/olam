<?php
	use yii\widgets\ActiveForm;
	use yii\helpers\Url;
?>
<div class="row">
    <div class="col-md-12 central-content" id="central-content">
        
        <div>
            <h1><?= Yii::t('app', 'tv.tv_programm_on_today') ?>, <span class="now-date-for-tv"><?= date("j F Y, l") ?></span></h1>
			
			<div class="days_and_time_block row">
				<div class="col-md-7">
					<ul class="days">
						<li><a <?php if($now_day_of_week == 1) { ?>class="active"<?php } ?> href=""><?= Yii::t('app', 'tv.mo') ?></a></li>
						<li><a <?php if($now_day_of_week == 2) { ?>class="active"<?php } ?> href=""><?= Yii::t('app', 'tv.tu') ?></a></li>
						<li><a <?php if($now_day_of_week == 3) { ?>class="active"<?php } ?> href=""><?= Yii::t('app', 'tv.we') ?></a></li>
						<li><a <?php if($now_day_of_week == 4) { ?>class="active"<?php } ?> href=""><?= Yii::t('app', 'tv.th') ?></a></li>
						<li><a <?php if($now_day_of_week == 5) { ?>class="active"<?php } ?> href=""><?= Yii::t('app', 'tv.fr') ?></a></li>
						<li><a style="color: #ff0000;" <?php if($now_day_of_week == 6) { ?>class="active"<?php } ?> href=""><?= Yii::t('app', 'tv.sa') ?></a></li>
						<li><a style="color: #ff0000;" <?php if($now_day_of_week == 0) { ?>class="active"<?php } ?> href=""><?= Yii::t('app', 'tv.su') ?></a></li>
					</ul>
					<div class="clear"></div>
				</div>
				<?php $form = ActiveForm::begin([
	                'id' => 'filter-form-tv',
	                'action' => Url::to(['/tv/index']),
	                'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
	                'fieldConfig' => [
	                    'template' => "{input}",
	                ],
	            ]); ?>
				<div class="col-md-3">
					
		            <div class="row">
		            	<div class="col-xs-5"><?= $form->field($model, 'time_from')->dropDownList($time_array)->label(false) ?></div>
		            	<div class="col-xs-2" style="padding: 5px 0 0 0; text-align: center;"><?= Yii::t('app', 'tv.to') ?></div>
		            	<div class="col-xs-5"><?= $form->field($model, 'time_to')->dropDownList($time_array)->label(false) ?></div>
		            </div>
		            
				</div>
				<div class="col-md-1">
					<?= \yii\helpers\Html::submitButton(Yii::t('app', 'tv.search_tv'), ['class' => 'btn btn-blue']) ?>
				</div>
				<?php ActiveForm::end(); ?>
			</div>

			<?php foreach($channels as $channel) { ?>
			<div class="row programms-list">
				<div class="col-md-2"><?= $channel->_getChannel() ?></div>
				<div class="col-md-1 time">
					<?php 
						$channel_programms = \common\models\Tvprogramms::find()->where(['channel' => $channel->channel, 'day' => date('l')])->all();
						foreach($channel_programms as $show) {
					?>
						<?= $show->time; ?><br>
					<?php } ?>
				</div>
				<div class="col-md-9">
					<?php 
						foreach($channel_programms as $show) {
					?>
						<?= $show->show; ?><br>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
        </div>
    </div>
</div>