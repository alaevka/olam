<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "autogallery".
 *
 * @property integer $id
 * @property string $image_name
 * @property integer $auto_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Autogallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'autogallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_name'], 'string'],
            [['auto_id', 'created_at', 'updated_at'], 'integer'],
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
            'auto_id' => 'Auto ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
