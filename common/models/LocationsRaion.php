<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "locations_raion".
 *
 * @property integer $id
 * @property integer $location_id
 * @property string $raion
 */
class LocationsRaion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locations_raion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location_id'], 'integer'],
            [['raion'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'location_id' => 'Location ID',
            'raion' => 'Название района',
        ];
    }

    public static function getList($relty_city_id) {
        return self::find()->select(['id', 'raion as name'])->where(['location_id' => $relty_city_id])->asArray()->all();
    }
}
