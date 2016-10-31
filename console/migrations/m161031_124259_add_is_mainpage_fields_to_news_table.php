<?php

use yii\db\Migration;

class m161031_124259_add_is_mainpage_fields_to_news_table extends Migration
{
    public function up()
    {
        $this->addColumn('news', 'main_big_new', $this->integer());
        $this->addColumn('news', 'right_new', $this->integer());
        $this->addColumn('news', 'second_big_new', $this->integer());
        $this->addColumn('news', 'main_page_new', $this->integer());
    }

    public function down()
    {
        echo "m161031_124259_add_is_mainpage_fields_to_news_table cannot be reverted.\n";

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
