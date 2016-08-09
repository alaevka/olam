<?php
namespace common\models;

use rmrevin\yii\module\Comments\models\Comment as BaseComment;

class CommentModel extends BaseComment 
{
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('app', 'ID'),
            'entity' => \Yii::t('app', 'Entity'),
            'from' => \Yii::t('app', 'Comment author'),
            'text' => \Yii::t('app', 'app.comment'),
            'created_by' => \Yii::t('app', 'Created by'),
            'updated_by' => \Yii::t('app', 'Updated by'),
            'created_at' => \Yii::t('app', 'Created at'),
            'updated_at' => \Yii::t('app', 'Updated at'),
        ];
    }
}