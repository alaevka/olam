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
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => function () { return strtotime(date('Y-m-d H:i:s')); },

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
