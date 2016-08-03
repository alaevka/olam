<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	$this->context->layout = '@app/views/layouts/login';
	$this->title = 'Система администрирования';
?>

<div class="login-container">
	<div class="login-header login-caret">
		<div class="login-content">
			<a href="#" class="logo">
				OLAM.UZ
			</a>
			<p class="description">Пожалуйста, заполните форму для продолжения работы в системе!</p>
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>
	</div>
	<?php //echo $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
	<div class="login-progressbar">
		<div></div>
	</div>
	<div class="login-form">
		<div class="login-content">
			<div class="form-login-error">
				<h3>Invalid login</h3>
				<p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
			</div>
			<?php $form = ActiveForm::begin([
                'id'                     => 'form_login',
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
                'validateOnBlur'         => false,
                'validateOnType'         => false,
                'validateOnChange'       => false,
            ]) ?>
				<?= $form->field($model, 'login', 
					[
						'inputOptions' => 
							[
								'autofocus' => 'autofocus', 
								'placeholder' => 'Логин', 
								'class' => 'form-control', 
								'tabindex' => '1'
							],
						'template' => '<div class="input-group">
											<div class="input-group-addon">
												<i class="entypo-user"></i>
											</div>
											{input}
										</div>{error}'
					])->label(false) ?>

				<?= $form->field($model, 'password', 
					[
						'inputOptions' => 
							[
								'placeholder' => 'Пароль', 
								'class' => 'form-control', 
								'tabindex' => '2'
							],
						'template' => '<div class="input-group">
											<div class="input-group-addon">
												<i class="entypo-key"></i>
											</div>
											{input}
										</div>{error}'
					])->passwordInput()->label(false) ?>

				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						Войти
					</button>
				</div>
			<?php ActiveForm::end(); ?>
			<div class="login-bottom-links">
				&copy; <a href="#">olam.uz 2016</a>
			</div>
		</div>
	</div>
</div>