<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wheels_manufacturer".
 *
 * @property integer $id
 * @property string $title
 */
class WheelsManufacturer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wheels_manufacturer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название производителя',
        ];
    }
}
