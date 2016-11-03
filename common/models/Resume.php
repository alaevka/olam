<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "resume".
 *
 * @property integer $id
 * @property string $suggestion_position
 * @property integer $suggestion_sphere
 * @property string $suggestion_pay
 * @property integer $suggestion_schedule
 * @property integer $suggestion_employment
 * @property string $user_photo
 * @property string $personal_last_name
 * @property string $personal_first_name
 * @property string $personal_sur_name
 * @property string $personal_birth_day
 * @property string $personal_birth_month
 * @property string $personal_birth_year
 * @property integer $is_view_birthday
 * @property integer $personal_gender
 * @property integer $personal_marital_status
 * @property integer $personal_minors
 * @property integer $personal_location_city
 * @property integer $personal_location_raion
 * @property string $experience_years
 * @property string $experience_information
 * @property string $experience_tags
 * @property string $contacts_email
 * @property string $contacts_phone
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $suggestions_city
 * @property integer $business_trip
 * @property string $languages
 * @property string $drivers_license
 * @property integer $smoking
 * @property string $personal_qualities
 */
class Resume extends \yii\db\ActiveRecord
{
    public $new_location_raion;


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
        return 'resume';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['suggestion_position', 'suggestion_sphere', 'personal_last_name', 'personal_first_name', 'personal_sur_name', 'personal_birth_day', 'personal_birth_month', 'personal_birth_year', 'personal_location_city'], 'required'],
            [['suggestion_position', 'personal_last_name', 'personal_first_name', 'personal_sur_name', 'experience_years', 'experience_information', 'suggestions_city', 'personal_qualities'], 'string'],
            [['suggestion_sphere', 'suggestion_schedule', 'suggestion_employment', 'personal_gender', 'personal_marital_status', 'personal_minors', 'personal_location_city', 'personal_location_raion', 'user_id', 'created_at', 'updated_at', 'business_trip', 'smoking'], 'integer'],
            [['user_photo', 'personal_birth_day', 'personal_birth_month', 'personal_birth_year', 'contacts_email', 'contacts_phone'], 'string', 'max' => 255],
            [['languages', 'experience_tags', 'is_view_birthday', 'drivers_license', 'new_location_raion', 'suggestion_pay', 'is_active'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'suggestion_position' => Yii::t('app', 'works.suggestion_position'),
            'suggestion_sphere' => Yii::t('app', 'works.suggestion_sphere'),
            'suggestion_pay' => Yii::t('app', 'works.suggestion_pay'),
            'suggestion_schedule' => Yii::t('app', 'works.suggestion_schedule'),
            'suggestion_employment' => Yii::t('app', 'works.suggestion_employment'),
            'user_photo' => Yii::t('app', 'works.user_photo'),
            'personal_last_name' => Yii::t('app', 'works.personal_last_name'),
            'personal_first_name' => Yii::t('app', 'works.personal_first_name'),
            'personal_sur_name' => Yii::t('app', 'works.personal_sur_name'),
            'personal_birth_day' => Yii::t('app', 'works.personal_birth_day'),
            'personal_birth_month' => Yii::t('app', 'works.personal_birth_month'),
            'personal_birth_year' => Yii::t('app', 'works.personal_birth_year'),
            'is_view_birthday' => Yii::t('app', 'works.is_view_birthday'),
            'personal_gender' => Yii::t('app', 'works.personal_gender'),
            'personal_marital_status' => Yii::t('app', 'works.personal_marital_status'),
            'personal_minors' => Yii::t('app', 'works.personal_minors'),
            'personal_location_city' => Yii::t('app', 'works.personal_location_city'),
            'personal_location_raion' => Yii::t('app', 'works.personal_location_raion'),
            'experience_years' => Yii::t('app', 'works.experience_years'),
            'experience_information' => Yii::t('app', 'works.experience_information'),
            'experience_tags' => Yii::t('app', 'works.experience_tags'),
            'contacts_email' => Yii::t('app', 'works.contacts_email'),
            'contacts_phone' => Yii::t('app', 'works.contacts_phone'),
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'suggestions_city' => Yii::t('app', 'works.suggestions_city'),
            'business_trip' => Yii::t('app', 'works.business_trip'),
            'languages' => Yii::t('app', 'works.languages'),
            'drivers_license' => Yii::t('app', 'works.drivers_license'),
            'smoking' => Yii::t('app', 'works.smoking'),
            'personal_qualities' => Yii::t('app', 'works.personal_qualities'),
            'is_active' => 'Отображать на сайте',
        ];
    }

    public function getSphere()
    {
        return $this->hasOne(\common\models\WorkSpheres::className(), ['id' => 'suggestion_sphere']);
    }

    public function getLocation()
    {
        return $this->hasOne(\common\models\Locations::className(), ['id' => 'personal_location_city']);
    }

    public function _getExperienceTags() {
        $tags_array = [];
        foreach(\common\models\Resume::find(['experience_tags'])->all() as $tags_group) {
            $tags_array = array_merge(unserialize($tags_group->experience_tags), $tags_array);
        }
        return $tags_array;
    }

    public static function _getCount() {
        return self::find()->count();
    }

    public function _getImage() {
        
        if(!empty($this->user_photo) && file_exists(Yii::getAlias('@frontend'). '/web/uploads/works/'.$this->user_photo)) {
            return $this->user_photo;
        } else {
            return 'no_image.png';
        }
    }

    public function _getYearsold() {
        if($this->personal_birth_month > date('m') || $this->personal_birth_month == date('m') && $this->personal_birth_day > date('d'))
            return $this->plural_form(date('Y') - $this->personal_birth_year - 1, [Yii::t('app', 'works.god'), Yii::t('app', 'works.goda'), Yii::t('app', 'works.let')]);
        else
            return $this->plural_form(date('Y') - $this->personal_birth_year, [Yii::t('app', 'works.god'), Yii::t('app', 'works.goda'), Yii::t('app', 'works.let')]);
    } 

    protected function plural_form($number, $after) {
        $cases = array (2, 0, 1, 1, 1, 2);
        return $number.' '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
    }

    public function getSuggestionschedule() {
        return $this->hasOne(\common\models\WorkSchedule::className(), ['id' => 'suggestion_schedule']);
    }
    public function getSuggestionemployment() {
        return $this->hasOne(\common\models\WorkEmployment::className(), ['id' => 'suggestion_employment']);
    }

    public function _getBuisnessTrip() {
        switch ($this->business_trip) {
            case '1':
                return Yii::t('app', 'works.business_trip_yes');
                break;
            case '2':
                return Yii::t('app', 'works.business_trip_no');
                break;
        }
    }

    public function _getDriverLicense() {
        if(!empty($this->drivers_license)) {
            $result = '';
            foreach (unserialize($this->drivers_license) as $key => $value) {
                switch ($value) {
                    case '1':
                        $result .= 'A';
                        break;
                    case '2':
                        $result .= 'B';
                        break;
                    case '3':
                        $result .= 'C';
                        break;
                    case '4':
                        $result .= 'D';
                        break;
                    case '5':
                        $result .= 'E';
                        break;
                }
            }
            return Yii::t('app', 'works.available_catregories').' '.$result;
        } else {
            return Yii::t('app', 'works.not_available');
        }
    }

    public function _getLanguages() {
        if(!empty($this->languages)) {
            $result = '';
            foreach (unserialize($this->languages) as $key => $value) {
                $result .= $value.';';
            }
            return $result;
        } else {
            return Yii::t('app', 'works.not_available');
        }
    }
}
