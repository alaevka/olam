<?php

use yii\db\Migration;

class m161102_063948_add_type_and_some_fields_to_news_table extends Migration
{
    public function up()
    {
        $this->addColumn('news', 'type', $this->integer());
        $this->addColumn('news', 'youtube_link', $this->text());
    }

    public function down()
    {
        echo "m161102_063948_add_type_and_some_fields_to_news_table cannot be reverted.\n";

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
