<?php
namespace backend\components;

use romi45\seoContent\components\SeoBehavior;
use romi45\seoContent\models\SeoContent;

class ExtendedSeoBehavior extends SeoBehavior
{


	public function saveSeoContent()
    {
        $model = SeoContent::findOne([
            'model_id' => $this->owner->getPrimaryKey(),
            'model_name' => $this->owner->className()
        ]);

        if (!$model) {
            $model = new SeoContent();
            $model->model_id = $this->owner->getPrimaryKey();
            $model->model_name = $this->owner->className();
        }
        $model->title = $this->owner->{$this->titleAttribute};
        $model->keywords = $this->owner->{$this->keywordsAttribute};
        $model->description = $this->owner->{$this->descriptionAttribute};
        $model->save();
    }
	
}