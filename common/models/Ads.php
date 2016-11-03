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
    public $new_location_raion;
    public $new_location_street;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads';
    }

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

    public function getLocation()
    {
        return $this->hasOne(\common\models\Locations::className(), ['id' => 'location_city']);
    }
    public function getLocationraion()
    {
        return $this->hasOne(\common\models\LocationsRaion::className(), ['id' => 'location_raion']);
    }
    public function getLocationstreet()
    {
        return $this->hasOne(\common\models\LocationsStreet::className(), ['id' => 'location_street']);
    }


    public function getHouseMaterial()
    {
        return $this->hasOne(\common\models\Housematerials::className(), ['id' => 'house_material']);
    }
    public function getFlatType()
    {
        return $this->hasOne(\common\models\Flattypes::className(), ['id' => 'flat_type']);
    }
    public function getFlatPlan()
    {
        return $this->hasOne(\common\models\Flatplans::className(), ['id' => 'flat_plan']);
    }
    public function getFlatRepairs()
    {
        return $this->hasOne(\common\models\Flatrepairs::className(), ['id' => 'flat_repairs']);
    }

    public function _getFlatType() {
        return Arrayhelper::map(\common\models\Flattypes::find()->asArray()->all(), 'id', 'title');
    }

    public function _getFlatPlan() {
        return Arrayhelper::map(\common\models\Flatplans::find()->asArray()->all(), 'id', 'title');
    }

    public function _getFlatRepairs() {
        return Arrayhelper::map(\common\models\Flatrepairs::find()->asArray()->all(), 'id', 'title');
    }

    public function _getTypeOfOwnership() {
        return Arrayhelper::map(\common\models\Ownership::find()->asArray()->all(), 'id', 'title');
    }

    public function _getHouseType() {
        return Arrayhelper::map(\common\models\Housetypes::find()->asArray()->all(), 'id', 'title');
    }
    
    public function _getHouseMaterial() {
        return Arrayhelper::map(\common\models\Housematerials::find()->asArray()->all(), 'id', 'title');
    }

    public function _getRltyActions($param=0) {
        if($param == 0) {
            return [
                '1' => Yii::t('app', 'rlty.action_type_1'), 
                '2' => Yii::t('app', 'rlty.action_type_2'),
                '3' => Yii::t('app', 'rlty.action_type_3'),
                '4' => Yii::t('app', 'rlty.action_type_4'),
            ];
        }
        if($param == 1) {
            return [
                '1' => Yii::t('app', 'rlty.action_type_1'), 
                '2' => Yii::t('app', 'rlty.action_type_2'),
            ];
        }

    }

    public function _getAction() {
        switch ($this->rlty_action) {
            case 1:
                return Yii::t('app', 'rlty.action_type_1'). ' / ';
                break;
            case 2:
                return Yii::t('app', 'rlty.action_type_2'). ' / ';
                break;
            case 3:
                return Yii::t('app', 'rlty.action_type_3'). ' / ';
                break;
            case 4:
                return Yii::t('app', 'rlty.action_type_4'). ' / ';
                break;
        }
    }

    public function _getType() {
        switch ($this->rlty_type) {
            case 1:
                return Yii::t('app', 'rlty.type_for_living'). ' / ';
                break;
            case 2:
                return Yii::t('app', 'rlty.type_for_rent'). ' / ';
                break;
            case 3:
                return Yii::t('app', 'rlty.type_commercial'). ' / ';
                break;
            case 4:
                return Yii::t('app', 'rlty.type_houses_cottages'). ' / ';
                break;
            case 5:
                return Yii::t('app', 'rlty.type_garages'). ' / ';
                break;
            case 6:
                return Yii::t('app', 'rlty.type_land'). ' / ';
                break;
        }
    }

    public function _getRoomsCount() {
        if(!empty($this->rooms_count)) {
            return $this->rooms_count.'-'.Yii::t('app', 'rlty.phrase_rooms_count_flats'). ' / ';
        }    
    }

    public function _getVariant() {
        return Yii::t('app', 'rlty.object_variant'). ' №'.$this->id;
    }

    public function _getRealtyLocationRaion() {
        return ArrayHelper::map(Ads::find()->groupBy('location_raion')->all(), 'id', 'location_raion');
    }

    public function _getImage() {
        $gallery = \common\models\Adsgallery::find()->where(['ads_id' => $this->id])->limit(1)->one();
        if($gallery) {
            return $gallery->image_name;
        } else {
            return 'no_image.png';
        }
    }

    public function _getFlatTypeObject() {
        $flattypes = \common\models\Flattypes::findOne($this->flat_type);
        return $flattypes->title;
    }

    public function _getPriceOneMeter() {
        return number_format($this->price/$this->area_total, 0, ',', ' ' ). 'руб. м2'; 
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rlty_type', 'rlty_action', 'location_city', 'location_house', 'price', 'contacts_username', 'contacts_phone', 'title'], 'required'],

            [['location_street'], 'required', 'when' => function ($model) {
                    return $model->new_location_street == '';
                }, 'whenClient' => "function (attribute, value) {
                    return $(\"#ads-new_location_street\").val() == '';
                }"],
            [['location_raion'], 'required', 'when' => function ($model) {
                    return $model->new_location_raion == '';
                }, 'whenClient' => "function (attribute, value) {
                    return $(\"#ads-new_location_raion\").val() == '';
                }"],

            [['price_conditions', 'gallery', 'new_location_raion', 'new_location_street', 'area_for_living', 'area_total', 'area_kitchen', 'level', 'total_levels', 'loggias_count', 'balconies_count', 'year_of_construction', 'additional_info', 'build_type', 'is_active'], 'safe'],
            [['rlty_type', 'rlty_action', 'location_city', 'rooms_count', 'flat_type', 'flat_plan', 'flat_repairs', 'type_of_ownership', 'house_type', 'house_material', 'user_id', 'created_at', 'updated_at', 'build_type', 'is_hot'], 'integer'],
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
            'title' => Yii::t('app', 'rlty.title'),
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
            'is_hot' => 'Горячее предложение',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'build_type' => Yii::t('app', 'rlty.is_new_building'),
            'new_location_raion' =>  Yii::t('app', 'rlty.new_location_raion'),
            'new_location_street' =>  Yii::t('app', 'rlty.new_location_street'),
            'is_active' => 'Отображать на сайте',
        ];
    }
}
