<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `news_category`.
 */
class m160803_105316_create_news_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%news_category}}', [
            'id'            => Schema::TYPE_PK,
            'slug'          => Schema::TYPE_TEXT,
            'title'         => Schema::TYPE_STRING . ' NOT NULL',
            'created_at'    => Schema::TYPE_INTEGER,
            'updated_at'    => Schema::TYPE_INTEGER,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%news_category}}');
    }
}
