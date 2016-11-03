<?php

use yii\db\Migration;

class m161102_104439_add_some_fields_to_afisha_table extends Migration
{
    public function up()
    {
        $this->addColumn('afisha', 'address', $this->text());
        $this->addColumn('afisha', 'work_time', $this->text());
        $this->addColumn('afisha', 'phone', $this->text());
        $this->addColumn('afisha', 'pay_type', $this->text());
        $this->addColumn('afisha', 'tags', $this->text());
    }

    public function down()
    {
        echo "m161102_104439_add_some_fields_to_afisha_table cannot be reverted.\n";

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
