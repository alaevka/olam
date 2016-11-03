<?php

use yii\db\Migration;

class m161103_051315_add_is_active_field_to_tables extends Migration
{
    public function up()
    {
        $this->addColumn('ads', 'is_active', $this->integer());
        $this->addColumn('auto', 'is_active', $this->integer());
        $this->addColumn('resume', 'is_active', $this->integer());
        $this->addColumn('vacancy', 'is_active', $this->integer());
        $this->addColumn('adsother', 'is_active', $this->integer());
    }

    public function down()
    {
        echo "m161103_051315_add_is_active_field_to_tables cannot be reverted.\n";

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
