<?php

use yii\db\Migration;

class m160902_095424_insert_wheels_manufacturer_data extends Migration
{
    public function up()
    {
        $this->execute(file_get_contents(__DIR__ . '/wheels_baza.sql')); 
    }

    public function down()
    {
        echo "m160902_095424_insert_wheels_manufacturer_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
