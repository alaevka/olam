<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `autogallery`.
 */
class m160901_124217_create_autogallery_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%autogallery}}', [
            'id' => Schema::TYPE_PK,
            'image_name' => Schema::TYPE_TEXT,
            'auto_id' => Schema::TYPE_INTEGER,
            'created_at'    => Schema::TYPE_INTEGER,
            'updated_at'    => Schema::TYPE_INTEGER,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('autogallery');
    }
}
