<?php

namespace common\models;

use Yii;

class Resume extends \yii\base\Model
{
	public $suggestion_position;
	public $suggestion_sphere;
	public $suggestion_pay;
	public $suggestion_schedule;
	public $suggestion_employment;
	public $user_photo;

	public $personal_last_name;
	public $personal_first_name;
	public $personal_sur_name;
	public $personal_birth_day;
	public $personal_birth_month;
	public $personal_birth_year;
	public $is_view_birthday;
	public $personal_gender;
	public $personal_marital_status;
	public $personal_minors;
	public $personal_location_city;
	public $personal_location_raion;
	public $new_location_raion;
	
	public $experience_years;
	public $experience_information;
	public $experience_tags;

	public $contacts_email;
	public $contacts_phone;


	public function getEducationcollection()
    {
        return $this->hasMany(\common\models\ResumeEducation::className(), ['resume_education_id' => 'id']);
    }

}