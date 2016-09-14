<?php

namespace common\models;

use Yii;

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
 */
class Resume extends \yii\db\ActiveRecord
{
    public $new_location_raion;
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
            [['suggestion_position', 'personal_last_name', 'personal_first_name', 'personal_sur_name', 'experience_years', 'experience_information', 'experience_tags'], 'string'],
            [['suggestion_sphere', 'suggestion_schedule', 'suggestion_employment', 'is_view_birthday', 'personal_gender', 'personal_marital_status', 'personal_minors', 'personal_location_city', 'personal_location_raion', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['suggestion_pay', 'user_photo', 'personal_birth_day', 'personal_birth_month', 'personal_birth_year', 'contacts_email', 'contacts_phone'], 'string', 'max' => 255],
        ];
    }

    public function getEducationcollection()
    {
        return $this->hasMany(\common\models\ResumeEducation::className(), ['resume_education_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'suggestion_position' => 'Suggestion Position',
            'suggestion_sphere' => 'Suggestion Sphere',
            'suggestion_pay' => 'Suggestion Pay',
            'suggestion_schedule' => 'Suggestion Schedule',
            'suggestion_employment' => 'Suggestion Employment',
            'user_photo' => 'User Photo',
            'personal_last_name' => 'Personal Last Name',
            'personal_first_name' => 'Personal First Name',
            'personal_sur_name' => 'Personal Sur Name',
            'personal_birth_day' => 'Personal Birth Day',
            'personal_birth_month' => 'Personal Birth Month',
            'personal_birth_year' => 'Personal Birth Year',
            'is_view_birthday' => 'Is View Birthday',
            'personal_gender' => 'Personal Gender',
            'personal_marital_status' => 'Personal Marital Status',
            'personal_minors' => 'Personal Minors',
            'personal_location_city' => 'Personal Location City',
            'personal_location_raion' => 'Personal Location Raion',
            'experience_years' => 'Experience Years',
            'experience_information' => 'Experience Information',
            'experience_tags' => 'Experience Tags',
            'contacts_email' => 'Contacts Email',
            'contacts_phone' => 'Contacts Phone',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
