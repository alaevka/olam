<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `auto`.
 */
class m160901_115911_create_auto_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('auto', [
            'id' => Schema::TYPE_PK,
            'auto_object_type' => Schema::TYPE_INTEGER,
            'tech_vin' => Schema::TYPE_STRING,
            'tech_category' => Schema::TYPE_INTEGER,
            'tech_marka' => Schema::TYPE_INTEGER,
            'tech_model' => Schema::TYPE_INTEGER,
            'tech_construction_year' => Schema::TYPE_STRING,
            'tech_mileage' => Schema::TYPE_STRING,
            'tech_helm' => Schema::TYPE_INTEGER,
            'tech_value' => Schema::TYPE_STRING,
            'tech_horsepower' => Schema::TYPE_STRING,
            'tech_transmission' => Schema::TYPE_INTEGER,
            'tech_fuel' => Schema::TYPE_INTEGER,
            'tech_gear' => Schema::TYPE_INTEGER,
            'tech_color' => Schema::TYPE_STRING,
            'special_notes' => Schema::TYPE_STRING,
            'additional_info' => Schema::TYPE_TEXT,
            'price' => Schema::TYPE_FLOAT,
            'exchange' => Schema::TYPE_INTEGER,
            'status' => Schema::TYPE_INTEGER,
            'location_city' => Schema::TYPE_INTEGER,
            'contacts_username' => Schema::TYPE_TEXT,
            'contacts_phone' => Schema::TYPE_STRING,
            'contacts_email' => Schema::TYPE_STRING,
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
        $this->dropTable('auto');
    }
}
