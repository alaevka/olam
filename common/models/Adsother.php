<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "adsother".
 *
 * @property integer $id
 * @property string $type
 * @property string $title
 * @property string $description
 * @property integer $category_id
 * @property double $price
 * @property string $contacts_username
 * @property string $contacts_phone
 * @property string $contacts_email
 * @property integer $period
 * @property integer $location_city
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Adsother extends \yii\db\ActiveRecord
{

    public $gallery;

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
        return 'adsother';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'contacts_username', 'contacts_phone', 'period', 'category_id', 'type'], 'required'],
            [['contacts_email'], 'string'],
            [['category_id', 'period', 'location_city', 'user_id', 'created_at', 'updated_at', 'is_active'], 'integer'],
            [['price'], 'number'],
        ];
    }

    public function getLocation()
    {
        return $this->hasOne(\common\models\Locations::className(), ['id' => 'location_city']);
    }

    public function getCategory()
    {
        return $this->hasOne(\common\models\AdsCategories::className(), ['id' => 'category_id']);
    }

    public function _getImage() {
        $gallery = \common\models\Adsothergallery::find()->where(['ads_id' => $this->id])->limit(1)->one();
        if($gallery) {
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
            'type' => Yii::t('app', 'ads.type'),
            'title' => Yii::t('app', 'ads.title'),
            'description' => Yii::t('app', 'ads.description'),
            'category_id' => Yii::t('app', 'ads.category'),
            'price' => Yii::t('app', 'ads.price'),
            'contacts_username' => Yii::t('app', 'ads.contacts_username'),
            'contacts_phone' => Yii::t('app', 'ads.contacts_phone'),
            'contacts_email' => Yii::t('app', 'ads.contacts_email'),
            'period' => Yii::t('app', 'ads.period'),
            'location_city' => Yii::t('app', 'ads.location_city'),
            'user_id' => Yii::t('app', 'ads.title'),
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_active' => 'Отображать на сайте',
        ];
    }
}
