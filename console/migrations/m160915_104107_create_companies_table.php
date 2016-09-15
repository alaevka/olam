<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `companies`.
 */
class m160915_104107_create_companies_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('companies', [
            'id' => Schema::TYPE_PK,
            'company_type' => Schema::TYPE_INTEGER,
            'user_fio' => Schema::TYPE_TEXT,
            'user_position' => Schema::TYPE_TEXT,
            'phones' => Schema::TYPE_TEXT,
            'company_name' => Schema::TYPE_TEXT,
            'company_legal_name' => Schema::TYPE_TEXT,
            'company_description' => Schema::TYPE_TEXT,
            'company_spheres' => Schema::TYPE_TEXT,
            'company_size' => Schema::TYPE_TEXT,
            'company_site' => Schema::TYPE_TEXT,
            'company_email' => Schema::TYPE_STRING,
            'company_logo' => Schema::TYPE_STRING,
            'contact_city' => Schema::TYPE_STRING,
            'contact_address_street' => Schema::TYPE_TEXT,
            'contact_address_house' => Schema::TYPE_TEXT,
            'contact_address_additional' => Schema::TYPE_TEXT,
            'contact_phones' => Schema::TYPE_TEXT,
            'user_id' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('companies');
    }
}
