<?php
namespace frontend\components;

use Yii;
use yii\base\Widget;
use yii\helpers\Url;

class NewsLeftMenuWidget extends Widget
{
    public $news_categories;
    public $current_category;

    public function init()
    {
        parent::init();
        $this->news_categories = \common\models\NewsCategory::find()->orderBy('order')->all();

    }

    public function run()
    {
        return $this->render('news_left_menu_widget', [
            'news_categories' => $this->news_categories,
            'current_category' => $this->current_category,
        ]);
    }
}