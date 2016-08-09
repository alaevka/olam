<?php
namespace common\models;

use dektrium\user\models\User as BaseUser;

class User extends BaseUser implements
        \yii\web\IdentityInterface,
        \rmrevin\yii\module\Comments\interfaces\CommentatorInterface
{
    public function getCommentatorAvatar()
    {
        //return $this->avatar_url;
        return '/img/temp/avatar.jpg';
    }

    public function getCommentatorName()
    {
        return $this->username;
    }

    public function getCommentatorUrl()
    {
        return ['/profile', 'id' => $this->id]; // or false, if user does not have a public page
    }
}