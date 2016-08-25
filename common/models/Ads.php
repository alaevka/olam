<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "ads".
 *
 * @property integer $id
 * @property string $slug
 * @property integer $rlty_type
 * @property integer $rlty_action
 * @property integer $location_city
 * @property string $location_street
 * @property string $location_house
 * @property string $location_raion
 * @property integer $rooms_count
 * @property string $area_total
 * @property string $area_for_living
 * @property string $area_kitchen
 * @property string $level
 * @property string $total_levels
 * @property integer $flat_type
 * @property integer $flat_plan
 * @property integer $flat_repairs
 * @property string $loggias_count
 * @property string $balconies_count
 * @property double $price
 * @property string $price_conditions
 * @property integer $type_of_ownership
 * @property string $year_of_construction
 * @property integer $house_type
 * @property integer $house_material
 * @property string $additional_info
 * @property string $contacts_username
 * @property string $contacts_phone
 * @property string $contacts_email
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Ads extends \yii\db\ActiveRecord
{
    public $gallery;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads';
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

    public function getLocation()
    {
        return $this->hasOne(\common\models\Locations::className(), ['id' => 'location_city']);
    }

    public function _getFlatType() {
        return ['1' => Yii::t('app', 'rlty.flat_type_1'), '2' => Yii::t('app', 'rlty.flat_type_2')];
    }

    public function _getFlatPlan() {
        return ['1' => Yii::t('app', 'rlty.flat_plan_type_1'), '2' => Yii::t('app', 'rlty.flat_plan_type_2')];
    }

    public function _getFlatRepairs() {
        return ['1' => Yii::t('app', 'rlty.flat_repairs_type_1'), '2' => Yii::t('app', 'rlty.flat_repairs_type_2')];
    }

    public function _getTypeOfOwnership() {
        return ['1' => Yii::t('app', 'rlty.type_of_ownership_type_1'), '2' => Yii::t('app', 'rlty.type_of_ownership_type_2')];
    }

    public function _getHouseType() {
        return ['1' => Yii::t('app', 'rlty.house_type_type_1'), '2' => Yii::t('app', 'rlty.house_type_type_2')];
    }
    
    public function _getHouseMaterial() {
        return ['1' => Yii::t('app', 'rlty.house_material_type_1'), '2' => Yii::t('app', 'rlty.house_material_type_2')];
    }

    public function _getRltyActions() {
        return [
            '1' => Yii::t('app', 'rlty.action_type_1'), 
            '2' => Yii::t('app', 'rlty.action_type_2'),
            '3' => Yii::t('app', 'rlty.action_type_3'),
            '4' => Yii::t('app', 'rlty.action_type_4'),

        ];
    }

    public function _getRealtyLocationRaion() {
        return ArrayHelper::map(Ads::find()->groupBy('location_raion')->all(), 'id', 'location_raion');
    }

    public function _getImage() {
        $gallery = \common\models\Adsgallery::find()->where(['ads_id' => $this->id])->limit(1)->one();
        if($gallery) {
            return $gallery->image_name;
        }
    }

    public function _getFlatTypeObject() {
        switch ($this->flat_type) {
            case 1:
                return Yii::t('app', 'rlty.flat_type_1');
                break;
            
            case 2:
                return Yii::t('app', 'rlty.flat_type_2');
                break;
        }
    }




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rlty_type', 'rlty_action', 'location_city', 'location_street', 'location_house', 'price', 'contacts_username', 'contacts_phone'], 'required'],
            // [['slug', 'location_street', 'location_house', 'location_raion', 'area_total', 'area_for_living', 'area_kitchen', 'level', 'total_levels', 'loggias_count', 'balconies_count', 'year_of_construction', 'additional_info', 'contacts_username', 'contacts_phone', 'contacts_email'], 'string'],
            [['price_conditions', 'gallery'], 'safe'],
            [['rlty_type', 'rlty_action', 'location_city', 'rooms_count', 'flat_type', 'flat_plan', 'flat_repairs', 'type_of_ownership', 'house_type', 'house_material', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'rlty_type' => Yii::t('app', 'rlty.rlty_type'),
            'rlty_action' => Yii::t('app', 'rlty.rlty_action'),
            'location_city' => Yii::t('app', 'rlty.location_city'),
            'location_street' => Yii::t('app', 'rlty.location_street'),
            'location_house' => Yii::t('app', 'rlty.location_house'),
            'location_raion' => Yii::t('app', 'rlty.location_raion'),
            'rooms_count' => Yii::t('app', 'rlty.rooms_count'),
            'area_total' => Yii::t('app', 'rlty.area_total'),
            'area_for_living' => Yii::t('app', 'rlty.area_for_living'),
            'area_kitchen' => Yii::t('app', 'rlty.area_kitchen'),
            'level' => Yii::t('app', 'rlty.level'),
            'total_levels' => Yii::t('app', 'rlty.total_levels'),
            'flat_type' => Yii::t('app', 'rlty.flat_type'),
            'flat_plan' => Yii::t('app', 'rlty.flat_plan'),
            'flat_repairs' => Yii::t('app', 'rlty.flat_repairs'),
            'loggias_count' => Yii::t('app', 'rlty.loggias_count'),
            'balconies_count' => Yii::t('app', 'rlty.balconies_count'),
            'price' => Yii::t('app', 'rlty.price'),
            'price_conditions' => Yii::t('app', 'rlty.price_conditions'),
            'type_of_ownership' => Yii::t('app', 'rlty.type_of_ownership'),
            'year_of_construction' => Yii::t('app', 'rlty.year_of_construction'),
            'house_type' => Yii::t('app', 'rlty.house_type'),
            'house_material' => Yii::t('app', 'rlty.house_material'),
            'additional_info' => Yii::t('app', 'rlty.additional_info'),
            'contacts_username' => Yii::t('app', 'rlty.contacts_username'),
            'contacts_phone' => Yii::t('app', 'rlty.contacts_phone'),
            'contacts_email' => Yii::t('app', 'rlty.contacts_email'),
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
