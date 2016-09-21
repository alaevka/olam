<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "adsothergallery".
 *
 * @property integer $id
 * @property string $image_name
 * @property integer $ads_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Adsothergallery extends \yii\db\ActiveRecord
{

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adsothergallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_name'], 'string'],
            [['ads_id', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_name' => 'Image Name',
            'ads_id' => 'Ads ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
