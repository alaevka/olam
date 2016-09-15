<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "companies".
 *
 * @property integer $id
 * @property integer $company_type
 * @property string $user_fio
 * @property string $user_position
 * @property string $phones
 * @property string $company_name
 * @property string $company_legal_name
 * @property string $company_description
 * @property string $company_spheres
 * @property string $company_size
 * @property string $company_site
 * @property string $company_email
 * @property string $company_logo
 * @property string $contact_city
 * @property string $contact_address_street
 * @property string $contact_address_house
 * @property string $contact_address_additional
 * @property string $contact_phones
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Companies extends \yii\db\ActiveRecord
{
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
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_type', 'user_fio', 'phones', 'company_name', 'company_legal_name', 'contact_city', 'contact_phones'], 'required'],
            [['company_type', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['user_fio', 'user_position', 'phones', 'company_name', 'company_legal_name', 'company_description', 'company_spheres', 'company_size', 'company_site', 'contact_address_street', 'contact_address_house', 'contact_address_additional', 'contact_phones'], 'string'],
            [['company_email', 'company_logo', 'contact_city'], 'string', 'max' => 255],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_type' => 'Company Type',
            'user_fio' => Yii::t('app', 'works.user_fio'),
            'user_position' => Yii::t('app', 'works.user_position'),
            'phones' => Yii::t('app', 'works.phones'),
            'company_name' => Yii::t('app', 'works.company_name'),
            'company_legal_name' => Yii::t('app', 'works.company_legal_name'),
            'company_description' => Yii::t('app', 'works.company_description'),
            'company_spheres' => Yii::t('app', 'works.company_spheres'),
            'company_size' => Yii::t('app', 'works.company_size'),
            'company_site' => Yii::t('app', 'works.company_site'),
            'company_email' => Yii::t('app', 'works.company_email'),
            'company_logo' => Yii::t('app', 'works.company_logo'),
            'contact_city' => Yii::t('app', 'works.contact_city'),
            'contact_address_street' => Yii::t('app', 'works.contact_address_street'),
            'contact_address_house' => Yii::t('app', 'works.contact_address_house'),
            'contact_address_additional' => Yii::t('app', 'works.contact_address_additional'),
            'contact_phones' => Yii::t('app', 'works.contact_phones'),
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function _getImage() {
        
        if(!empty($this->company_logo) && file_exists(Yii::getAlias('@frontend'). '/web/uploads/companies/'.$this->company_logo)) {
            return $this->company_logo;
        } else {
            return 'no_image.png';
        }
    }

    public function getCompanyType() {
        switch($this->company_type) {
            case 1: return Yii::t('app', 'works.direct_employer'); break;
            case 2: return Yii::t('app', 'works.recruitment_agency'); break;
        }
    }
}
