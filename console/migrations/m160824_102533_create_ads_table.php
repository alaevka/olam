<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `ads`.
 */
class m160824_102533_create_ads_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%ads}}', [
            'id' => Schema::TYPE_PK,
            'slug' => Schema::TYPE_TEXT,
            'rlty_type' => Schema::TYPE_INTEGER,
            'rlty_action' => Schema::TYPE_INTEGER,
            'location_city' => Schema::TYPE_INTEGER,
            'location_street' => Schema::TYPE_TEXT,
            'location_house' => Schema::TYPE_TEXT,
            'location_raion' => Schema::TYPE_TEXT,
            'rooms_count' => Schema::TYPE_INTEGER,
            'area_total' => Schema::TYPE_TEXT,
            'area_for_living' => Schema::TYPE_TEXT,
            'area_kitchen' => Schema::TYPE_TEXT,
            'level' => Schema::TYPE_TEXT,
            'total_levels' => Schema::TYPE_TEXT,
            'flat_type' => Schema::TYPE_INTEGER,
            'flat_plan' => Schema::TYPE_INTEGER,
            'flat_repairs' => Schema::TYPE_INTEGER,
            'loggias_count' => Schema::TYPE_TEXT,
            'balconies_count' => Schema::TYPE_TEXT,
            'price' => Schema::TYPE_FLOAT,
            'price_conditions' => Schema::TYPE_TEXT,
            'type_of_ownership' => Schema::TYPE_INTEGER,
            'year_of_construction' => Schema::TYPE_TEXT,
            'house_type' => Schema::TYPE_INTEGER,
            'house_material' => Schema::TYPE_INTEGER,
            'additional_info' => Schema::TYPE_TEXT,
            'contacts_username' => Schema::TYPE_TEXT,
            'contacts_phone' => Schema::TYPE_TEXT,
            'contacts_email' => Schema::TYPE_TEXT,
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
        $this->dropTable('ads');
    }
}
