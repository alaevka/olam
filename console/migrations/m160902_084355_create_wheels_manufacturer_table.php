<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `wheels_manufacturer`.
 */
class m160902_084355_create_wheels_manufacturer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%wheels_manufacturer}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('wheels_manufacturer');
    }
}
