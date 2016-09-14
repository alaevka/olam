<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `resume`.
 */
class m160914_081444_create_resume_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('resume', [
            'id' => Schema::TYPE_PK,
            'suggestion_position' => Schema::TYPE_TEXT,
            'suggestion_sphere' => Schema::TYPE_INTEGER,
            'suggestion_pay' => Schema::TYPE_STRING,
            'suggestion_schedule' => Schema::TYPE_INTEGER,
            'suggestion_employment' => Schema::TYPE_INTEGER,
            'user_photo' => Schema::TYPE_STRING,
            'personal_last_name' => Schema::TYPE_TEXT,
            'personal_first_name' => Schema::TYPE_TEXT,
            'personal_sur_name' => Schema::TYPE_TEXT,
            'personal_birth_day' => Schema::TYPE_STRING,
            'personal_birth_month' => Schema::TYPE_STRING,
            'personal_birth_year' => Schema::TYPE_STRING,
            'is_view_birthday' => Schema::TYPE_INTEGER,
            'personal_gender' => Schema::TYPE_INTEGER,
            'personal_marital_status' => Schema::TYPE_INTEGER,
            'personal_minors' => Schema::TYPE_INTEGER,
            'personal_location_city' => Schema::TYPE_INTEGER,
            'personal_location_raion' => Schema::TYPE_INTEGER,
            'experience_years' => Schema::TYPE_TEXT,
            'experience_information' => Schema::TYPE_TEXT,
            'experience_tags' => Schema::TYPE_TEXT,
            'contacts_email' => Schema::TYPE_STRING,
            'contacts_phone' => Schema::TYPE_STRING,
            'user_id' => Schema::TYPE_INTEGER,
            'created_at'    => Schema::TYPE_INTEGER,
            'updated_at'    => Schema::TYPE_INTEGER,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('resume');
    }
}
