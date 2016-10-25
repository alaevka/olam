<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `afisha`.
 */
class m161025_114458_create_afisha_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%afisha}}', [
            'id'            => Schema::TYPE_PK,
            'slug'          => Schema::TYPE_TEXT,
            'title'         => Schema::TYPE_STRING . ' NOT NULL',
            'image_name'    => Schema::TYPE_STRING,
            'content'       => Schema::TYPE_TEXT,
            'category_id'   => Schema::TYPE_INTEGER,
            'created_at'    => Schema::TYPE_INTEGER,
            'updated_at'    => Schema::TYPE_INTEGER,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('afisha');
    }
}
