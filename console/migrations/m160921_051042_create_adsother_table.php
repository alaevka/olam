<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `adsother`.
 */
class m160921_051042_create_adsother_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('adsother', [
            'id' => Schema::TYPE_PK,
            'type' => Schema::TYPE_TEXT,
            'title' => Schema::TYPE_TEXT,
            'description' => Schema::TYPE_TEXT,
            'category_id' => Schema::TYPE_INTEGER, 
            'price' => Schema::TYPE_FLOAT,
            'contacts_username' => Schema::TYPE_TEXT,
            'contacts_phone' => Schema::TYPE_TEXT,
            'contacts_email' => Schema::TYPE_TEXT,
            'period' => Schema::TYPE_INTEGER,
            'location_city' => Schema::TYPE_INTEGER,
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
        $this->dropTable('adsother');
    }
}
