<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `tires_manufacturer`.
 */
class m160902_084508_create_tires_manufacturer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%tires_manufacturer}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tires_manufacturer');
    }
}
