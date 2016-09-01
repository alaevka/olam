<?php

use yii\db\Migration;

class m160901_071529_import_cars_data extends Migration
{
    public function up()
    {
        $this->execute(file_get_contents(__DIR__ . '/auto_baza.sql')); 
    }

    public function down()
    {
        echo "m160901_071529_import_cars_data cannot be reverted.\n";

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
