<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `adsgallery`.
 */
class m160824_131820_create_adsgallery_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%adsgallery}}', [
            'id' => Schema::TYPE_PK,
            'image_name' => Schema::TYPE_TEXT,
            'ads_id' => Schema::TYPE_INTEGER,
            'created_at'    => Schema::TYPE_INTEGER,
            'updated_at'    => Schema::TYPE_INTEGER,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('adsgallery');
    }
}
