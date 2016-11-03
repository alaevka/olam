<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

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
            [['auto_object_type', 'tech_category', 'tech_marka', 'tech_model', 'tech_construction_year', 'tech_mileage', 'price', 'location_city', 'contacts_username', 'contacts_phone'], 'required', 'when' => function ($model) {
                    return $model->auto_object_type == '1';
                }, 'whenClient' => "function (attribute, value) {
                    return $(\"#auto_object_type_radio:checked\").val() == '1';
                }"],
            [['wheel_tire_category', 'wheel_tyre_radius'], 'required', 'when' => function ($model) {
                    return $model->auto_object_type == '2';
                }, 'whenClient' => "function (attribute, value) {
                    return $(\"#auto_object_type_radio:checked\").val() == '2';
                }"],
            [['contacts_username', 'contacts_phone', 'location_city', 'title', 'other_category'], 'required', 'when' => function ($model) {
                    return $model->auto_object_type == '3';
                }, 'whenClient' => "function (attribute, value) {
                    return $(\"#auto_object_type_radio:checked\").val() == '3';
                }"],

            [['wheel_manufacturer', 'wheel_pcd', 'price', 'location_city', 'contacts_phone', 'contacts_username'], 'required', 'when' => function ($model) {
                    return $model->wheel_tire_category == '1';
                }, 'whenClient' => "function (attribute, value) {
                    return $(\"#auto_wheel_tire_category:checked\").val() == '1';
                }"],
            [['tire_manufacturer', 'tire_type', 'tire_season', 'tire_width', 'tire_height', 'price', 'location_city', 'contacts_phone', 'contacts_username'], 'required', 'when' => function ($model) {
                    return $model->wheel_tire_category == '2';
                }, 'whenClient' => "function (attribute, value) {
                    return $(\"#auto_wheel_tire_category:checked\").val() == '2';
                }"],

            [['auto_object_type', 'tech_category', 'tech_marka', 'tech_model', 'tech_helm', 'tech_transmission', 'tech_fuel', 'tech_gear', 'status', 'location_city', 'user_id', 'created_at', 'updated_at', 'is_active'], 'integer'],
            [['additional_info', 'contacts_username'], 'string'],
            [['price'], 'number'],
            [['exchange', 'is_hot', 'special_notes', 'wheel_tyre_radius', 'wheel_width', 'tire_speed_index', 'wheel_dia', 'wheel_et', 'wheel_type'], 'safe'],
            [['tech_vin', 'tech_construction_year', 'tech_mileage', 'tech_value', 'tech_horsepower', 'tech_color', 'contacts_phone', 'contacts_email'], 'string', 'max' => 255],
        ];
    }

    public function getMarka()
    {
        return $this->hasOne(\common\models\AutoMarka::className(), ['marka_id' => 'tech_marka']);
    }

    public function getWheelmanu()
    {
        return $this->hasOne(\common\models\WheelsManufacturer::className(), ['id' => 'wheel_manufacturer']);
    }

    public function getTiremanu()
    {
        return $this->hasOne(\common\models\TiresManufacturer::className(), ['id' => 'tire_manufacturer']);
    }

    public function getModelauto()
    {
        return $this->hasOne(\common\models\AutoModel::className(), ['id' => 'tech_model']);
    }

    public function getLocation()
    {
        return $this->hasOne(\common\models\Locations::className(), ['id' => 'location_city']);
    }

    public function getHeightTireList() {
        return [
            '25', '30', '32', '33', '35',
            '36', '38', '40', '42', '43',
            '45', '47', '50', '55', '60',
            '65', '70', '75', '80', '82',
            '85', '90', '95'
        ];
    }


    public function getHeightList() {
        return [
            '8','9','10','11','12','13',
            '14','15','15.3','16','16.5',
            '17','17.5','18','19','19.5',
            '20','21','22','22.5','23',
            '24','25','26','28','30','32',
            '34','38','39','42','44','48'
        ];
    }

    public function getWidthList() {
        return [
            '135', '145', '165', '175',
            '185', '195', '200', '205',
            '210', '215', '225', '230',
            '235', '240', '245', '255',
            '260', '265', '275', '280',
            '285', '290', '295', '300',
            '305', '315', '320', '325',
            '330', '335', '340', '350',
            '345', '350', '355', '360',
            '365', '370', '375', '380',
            '385', '390', '395', '400',
            '405', '420', '425', '429',
            '445', '455', '470', '480',
            '495', '500', '525', '530',
            '535', '550', '600', '620',
            '650', '700', '710'
        ];
    }



    public function getWheelDia() {
        return [
            '8.6','10.5','11.0','29','37','38.0',
            '40','43.0','44.0','45','45.1','50',
            '52.0','52.1','52.5','53.0','54.0',
            '54.1','55.1','56.0','56.1','56.2',
            '56.5','56.6','56.62','56.7','57.0',
            '57.06','57.08','57.09','57.1','57.4',
            '58.0','58.1','58.5','58.55','58.6',
            '58.7','58.8','59.0','59.1','59.5',
            '59.6','60.0','60.1','60.15','60.2',
            '60.3','60.5','60.7','61','61.9','62.7',
            '63.0','63.1','63.3','63.35','63.4',
            '63.5','63.6','63.7','64.0','64.1',
            '64.2','65.0','65.06','65.1','65.2',
            '65.6','65.7','66.0','66.1','66.2',
            '66.3','66.4','66.42','66.5','66.56',
            '66.6','66.9','67','67.0','67.08',
            '67.1','67.2','67.7','68.0','68.1',
            '69.0','69.1','69.8','70.0','70.1',
            '70.2','70.27','70.3','70.4','70.6',
            '70.7','71.0','71.1','71.3','71.4',
            '71.5','71.56','71.58','71.6','71.8',
            '72.0','72.1','72.2','72.3','72.4',
            '72.5','72.56','72.6','72.62','72.69',
            '73.0','73.1','73.2','73.5','73.6',
            '73.8','73.9','74.0','74.1','74.16',
            '74.50','75.0','75.1','76.0','76.1',
            '76.5','76.6','77','77.1','77.6','77.8',
            '77.9','78.0','78.1','78.2','79','79.1',
            '79.5','79.6','80.1','82','83.0','83.3',
            '83.5','83.7','84.0','84.1','84.2','85.0',
            '85.3','86.9','87.0','87.1','87.10','87.2',
            '89','89.1','92.1','92.3','92.5','93.0',
            '93.1','94.5','95.0','95.3','95.4','95.5',
            '95.6','96','96.1','98.0','98.1','98.5',
            '98.6','99','100','100.1','100.3','101.0',
            '105.0','106.0','106.1','106.2','106.5',
            '106.6','106.7','106.8','106.9','107',
            '107.1','107.5','107.6','107.95','108.0',
            '108.1','108.2','108.3','108.4','108.5',
            '109.0','109.1','109.5','109.6','109.7',
            '109.8','110.0','110.1','110.2','110.3',
            '110.5','110.6','110.7','111','111.2',
            '111.5','111.8','112.0','112.1','112.2',
            '112.5','113','114.3','115.1','116','116.2',
            '116.9','117','117.5','118','120','120.3',
            '122.5','124','124.1','125','127','130.0',
            '130.2','131','138','138.8','139.0','142.0',
            '156','160','161.0','180.4','220','228',
            '281.0','606.0'
        ];
    }

    public function getWheelPcd() {
        return [
            '3*98','3*112.0','3*112','3*256',
            '3*220','4*100','4*120','4*130',
            '4*139.7','4*144.3','4*114.4',
            '4*114.3','4*114','4*112','4*110',
            '4*108/114.3','4*108','4*256',
            '4*98','4*113.3','4*115','5*110',
            '5*110/112','5*112','5*113.0','5*114',
            '5*114.1','5*114.3','5*115','5*100',
            '5*108/112','5*100/108','5*100/112',
            '5*104.3','5*100/114.3','5*105.0',
            '5*115/120','5*108','5*127','5*115.0',
            '5*108/114.3','5*139','5*139.7','5*144.3',
            '5*150','5*160','5*165','5*107.95',
            '5*165.1','5*190','5*98','5*135.0',
            '5*135','5*130.65','5*117.3','5*118',
            '5*120','5*120.65','5*120.7','5*120/130',
            '5*127/135','5*127/139.7','5*130',
            '5*130.6','6*139','6*139.1','6*139.7',
            '6*170','6*180','6*136.7','6*135','6*130',
            '6*127','6*115','6*114.3','6*114','6*210',
            '6*205','8*100','8*100/114.3','8*108.0',
            '8*114.0','8*130','8*144.0','8*165',
            '8*165.1','8*170','8*165.5','8*98',
            '8*98/108','9*108','9*100','9*114.3',
            '10*108/110','10*108/112','10*108/114.3',
            '10*98/108','10*108','10*100/114.3',
            '10*100/112','10*100/108','10*114.3/120',
            '10*100','10*110','10*110/112','10*110/114.3',
            '10*115/135','10*115/139.7','10*120/130',
            '10*127/135','10*135/139.7','10*335','10*337',
            '10*98','10*115/127','10*115/120.65',
            '10*115/120','10*112','10*112/114.3',
            '10*112/120','10*112/130','10*114.3',
            '10*114.3/120.65','10*114.3/127','10*114.3/130',
            '12*114.3/115','12*114.3/127','12*114.3/135',
            '12*115/127','12*135/139.7'
        ];
    }

    public function getWheelWidth() {
        return [
            '3.5','4.0','4.5','5.0',
            '5.5','6.0','6.5','7.0',
            '7.5','8.0','8.25','8.5',
            '9.0','9.5','10.0','10.5',
            '11.0','11.75','12.0','13.0'
        ];
    }

    public function getWheelEt() {
        return [
            '-63','-50.0','-49','-46.0','-44',
            '-40.0','-38','-35.0','-30','-28',
            '-25','-24','-24.0','-20.0','-19',
            '-18','-15','-14','-13','-12','-11.0',
            '-10.0','-8.0','-6.0','-5.0','-3.0',
            '-1.0','0','00.0','1.0','2.0','3.0',
            '4.0','5.0','6.0','7.0','8.0','9',
            '10.0','11.0','12.0','12.5','13.0',
            '14.0','15.0','16.0','16-22','17.0',
            '18.0','18-20','19','20.0','20','20.5',
            '20.8','21.0','22.0','23.0','23.5','24.0',
            '25/40','25.0','25-50','25','26','27.0',
            '27.5','28.0','29.0','30','30.0','30.5',
            '31.0','31','31-37','31.5','31.5-41.5',
            '32.0','32-44.5','33.0','34.0','35-40',
            '35.0','36.0','36.5','37.0','37-48','37.5',
            '38.0','38.8','39.0','40.0','40.75','40.8',
            '41.0','41.2','41.3','41.5','42-47','42',
            '42.5','43.0','43-47.5','43.5','43.8',
            '44.0','44.5','45.0','45.5','45.7','46.0',
            '47.0','47.5','48.0','49.0','49.5','50.0',
            '50/52','50','50.5','50.8','51.0','52.0',
            '52.2','52.4','52.5','53.0','53.3','54.0',
            '55.0','56.0','57.0','57.1','58.0','59.0',
            '60.0','60.1','62.0','63.0','63.35','64.0',
            '65.0','66.0','67.0','68.0','70','70-116',
            '75.0','83.0','89.1','90.0','102.0','105',
            '105.5','107.0','108.0','110.5','115.0',
            '120.0','123','124.0','132.0','157.0'
        ];
    }

    public function getWheelType() {
        return [
            1 => Yii::t('app', 'auto.cast_wheel'),
            2 => Yii::t('app', 'auto.wrought_wheel'),
            3 => Yii::t('app', 'auto.stamped_wheel'),
        ];
    }

    public function _getFuel() {
        switch($this->tech_fuel) {
            case 1: return Yii::t('app', 'auto.fuel_petrol'); break;
            case 2: return Yii::t('app', 'auto.fuel_diesel'); break;
            case 3: return Yii::t('app', 'auto.fuel_gaz'); break;
        }
    }

    public function _getTransmission() {
        switch($this->tech_transmission) {
            case 1: return Yii::t('app', 'auto.transmission_auto'); break;
            case 2: return Yii::t('app', 'auto.transmission_mechanic'); break;
        }
    }

    public function _getHelm() {
        switch($this->tech_helm) {
            case 1: return Yii::t('app', 'auto.helm_left'); break;
            case 2: return Yii::t('app', 'auto.helm_right'); break;
        }
    }

    public function _getGear() {
        switch($this->tech_gear) {
            case 1: return Yii::t('app', 'auto.front_wheel_gear'); break;
            case 2: return Yii::t('app', 'auto.back_wheel_gear'); break;
            case 3: return Yii::t('app', 'auto.full_wheel_gear'); break;
        }
    }

    public function getWheelManufacturer() {
        return Arrayhelper::map(\common\models\WheelsManufacturer::find()->orderBy('title')->asArray()->all(), 'id', 'title');
    }

    public function getOtherCategoryList() {
        return Arrayhelper::map(\common\models\AutoOtherCategory::find()->orderBy('title')->asArray()->all(), 'id', 'title');
    }

    public function getTireManufacturer() {
        return Arrayhelper::map(\common\models\TiresManufacturer::find()->orderBy('title')->asArray()->all(), 'id', 'title');
    }

    public function getSeasonesList() {
        return [
            1 => Yii::t('app', 'auto.all_season'),
            2 => Yii::t('app', 'auto.summer'),
            3 => Yii::t('app', 'auto.winter_without_thorns'),
            4 => Yii::t('app', 'auto.winter_with_thorns'),
        ];
    }

    public function getTireType() {
        return [
            1 => Yii::t('app', 'auto.cars_light'),
            2 => Yii::t('app', 'auto.commercial'),
            3 => Yii::t('app', 'auto.off_road'),
            4 => Yii::t('app', 'auto.freight'),
        ];
    }

    public function getSpeedIndexList() {
        return [
            'A', 'B', 'C', 'D', 'E',
            'F', 'G', 'H', 'J', 'K',
            'L', 'M', 'N', 'P', 'Q',
            'R', 'S', 'T', 'U', 'V',
            'VR', 'W', 'Y', 'Z', 'ZR'
        ];
    }

    public function _getImage() {
        $gallery = \common\models\Autogallery::find()->where(['auto_id' => $this->id])->limit(1)->one();
        if($gallery && file_exists(Yii::getAlias('@frontend'). '/web/uploads/auto/'.$gallery->image_name)) {
            return $gallery->image_name;
        } else {
            return 'no_image.png';
        }
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
            'is_hot' => 'Горячее предложение',
            'wheel_category' => Yii::t('app', 'auto.wheel_category'),
            'wheel_tire_category' => Yii::t('app', 'auto.wheel_tire_category'),
            'wheel_tyre_radius' => Yii::t('app', 'auto.wheel_tyre_radius'),
            'wheel_manufacturer' => Yii::t('app', 'auto.wheel_manufacturer'),
            'wheel_dia' => Yii::t('app', 'auto.wheel_dia'),
            'wheel_pcd' => Yii::t('app', 'auto.wheel_pcd'),
            'wheel_width' => Yii::t('app', 'auto.wheel_width'),
            'wheel_et' => Yii::t('app', 'auto.wheel_et'),
            'wheel_type' => Yii::t('app', 'auto.wheel_type'),
            'tire_manufacturer' => Yii::t('app', 'auto.tire_manufacturer'),
            'tire_season' => Yii::t('app', 'auto.tire_season'),
            'tire_type' => Yii::t('app', 'auto.tire_type'),
            'tire_speed_index' => Yii::t('app', 'auto.tire_speed_index'),
            'tire_width' => Yii::t('app', 'auto.tire_width'),
            'tire_height' => Yii::t('app', 'auto.tire_height'),
            'title' => Yii::t('app', 'auto.what_you_sell'),
            'other_category' => Yii::t('app', 'auto.other_category_title'),
            'is_active' => 'Отображать на сайте',


        ];
    }
}
