<?php

namespace common\models;

use Yii;
/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $image_name
 * @property string $content
 * @property integer $category_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Ads extends \yii\base\Model
{
    /**
     * @inheritdoc
     */
    public $location_city;
    public $location_street;
    public $location_house;
    public $location_raion;

}
