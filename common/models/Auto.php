<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "auto".
 *
 * @property integer $id
 * @property integer $auto_object_type
 * @property string $tech_vin
 * @property integer $tech_category
 * @property integer $tech_marka
 * @property integer $tech_model
 * @property string $tech_construction_year
 * @property string $tech_mileage
 * @property integer $tech_helm
 * @property string $tech_value
 * @property string $tech_horsepower
 * @property integer $tech_transmission
 * @property integer $tech_fuel
 * @property integer $tech_gear
 * @property string $tech_color
 * @property string $special_notes
 * @property string $additional_info
 * @property double $price
 * @property integer $exchange
 * @property integer $status
 * @property integer $location_city
 * @property string $contacts_username
 * @property string $contacts_phone
 * @property string $contacts_email
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Auto extends \yii\db\ActiveRecord
{
    public $gallery;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auto';
    }

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
    public function rules()
    {
        return [
            [['auto_object_type', 'tech_category', 'tech_marka', 'tech_model', 'tech_construction_year', 'tech_mileage', 'price', 'location_city', 'contacts_username', 'contacts_phone'], 'required'],
            [['auto_object_type', 'tech_category', 'tech_marka', 'tech_model', 'tech_helm', 'tech_transmission', 'tech_fuel', 'tech_gear', 'status', 'location_city', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['additional_info', 'contacts_username'], 'string'],
            [['price'], 'number'],
            [['exchange'], 'safe'],
            [['tech_vin', 'tech_construction_year', 'tech_mileage', 'tech_value', 'tech_horsepower', 'tech_color', 'special_notes', 'contacts_phone', 'contacts_email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auto_object_type' => Yii::t('app', 'auto.auto_object_type'),
            'tech_vin' => Yii::t('app', 'auto.tech_vin'),
            'tech_category' => Yii::t('app', 'auto.tech_category'),
            'tech_marka' => Yii::t('app', 'auto.tech_marka'),
            'tech_model' => Yii::t('app', 'auto.tech_model'),
            'tech_construction_year' => Yii::t('app', 'auto.tech_construction_year'),
            'tech_mileage' => Yii::t('app', 'auto.tech_mileage'),
            'tech_helm' => Yii::t('app', 'auto.tech_helm'),
            'tech_value' => Yii::t('app', 'auto.tech_value'),
            'tech_horsepower' => Yii::t('app', 'auto.tech_horsepower'),
            'tech_transmission' => Yii::t('app', 'auto.tech_transmission'),
            'tech_fuel' => Yii::t('app', 'auto.tech_fuel'),
            'tech_gear' => Yii::t('app', 'auto.tech_gear'),
            'tech_color' => Yii::t('app', 'auto.tech_color'),
            'special_notes' => Yii::t('app', 'auto.special_notes'),
            'additional_info' => Yii::t('app', 'auto.additional_info'),
            'price' => Yii::t('app', 'auto.price'),
            'exchange' => Yii::t('app', 'auto.exchange'),
            'status' => Yii::t('app', 'auto.status'),
            'location_city' => Yii::t('app', 'auto.location_city'),
            'contacts_username' => Yii::t('app', 'auto.contacts_username'),
            'contacts_phone' => Yii::t('app', 'auto.contacts_phone'),
            'contacts_email' => Yii::t('app', 'auto.contacts_email'),
            'user_id' => Yii::t('app', 'auto.user_id'),
            'created_at' => Yii::t('app', 'auto.created_at'),
            'updated_at' => Yii::t('app', 'auto.updated_at'),
        ];
    }
}
