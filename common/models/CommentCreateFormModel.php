<?php
namespace common\models;

use rmrevin\yii\module\Comments\forms\CommentCreateForm as BaseCommentCreateForm;

class CommentCreateFormModel extends BaseCommentCreateForm 
{
    public function attributeLabels()
    {
        return [
            'entity' => \Yii::t('app', 'Entity'),
            'from' => \Yii::t('app', 'Your name'),
            'text' => \Yii::t('app', 'app.comment'),
        ];
    }
}