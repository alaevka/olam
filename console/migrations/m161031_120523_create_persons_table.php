<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `persons`.
 */
class m161031_120523_create_persons_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%persons}}', [
            'id'            => Schema::TYPE_PK,
            'slug'          => Schema::TYPE_TEXT,
            'title'         => Schema::TYPE_STRING . ' NOT NULL',
            'subtitle'         => Schema::TYPE_TEXT,
            'image_name'    => Schema::TYPE_STRING,
            'content'       => Schema::TYPE_TEXT,
            'tags'          => Schema::TYPE_TEXT,
            'created_at'    => Schema::TYPE_INTEGER,
            'updated_at'    => Schema::TYPE_INTEGER,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('persons');
    }
}
