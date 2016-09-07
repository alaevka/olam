<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "locations_street".
 *
 * @property integer $id
 * @property integer $location_id
 * @property integer $raion_id
 * @property string $street
 */
class LocationsStreet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locations_street';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location_id', 'raion_id'], 'integer'],
            [['street'], 'string'],
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
            'raion_id' => 'Raion ID',
            'street' => 'Название улицы',
        ];
    }

    public static function getList($relty_city_id) {
        return self::find()->select(['id', 'street as name'])->where(['location_id' => $relty_city_id])->asArray()->all();
    }
}
