<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `auto_other_category`.
 */
class m160902_112656_create_auto_other_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%auto_other_category}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('auto_other_category');
    }
}
