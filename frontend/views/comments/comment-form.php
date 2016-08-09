<?php

use rmrevin\yii\module\Comments;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$Widget = $this->context;

?>

<a name="commentcreateform"></a>
<div class="row comment-form">
    <div class="col-md-12">
        <?php
        /** @var ActiveForm $form */
        $form = ActiveForm::begin();

        echo Html::activeHiddenInput($CommentCreateForm, 'id');

        if (\Yii::$app->getUser()->getIsGuest()) {
            echo $form->field($CommentCreateForm, 'from')
                ->textInput(['placeholder' => Yii::t('app', 'app.new_comment_your_name_placeholder')])->label(false);
        }

        $options = [];

        if ($Widget->Comment->isNewRecord) {
            $options['data-role'] = 'new-comment';
            $options['placeholder'] = Yii::t('app', 'app.new_comment_placeholder');
        }

        echo $form->field($CommentCreateForm, 'text')
            ->textarea($options)->label(false);

        ?>
        <div class="actions">
            <?php
            echo Html::submitButton(\Yii::t('app', 'app.send_comment'), [
                'class' => 'btn btn-primary btn-comment-send',
            ]);
            ?>
        </div>
        <?php
        ActiveForm::end();
        ?>
    </div>
</div>