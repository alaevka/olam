<?php

use yii\db\Migration;

/**
 * Handles adding is_hot to table `auto`.
 */
class m160901_130642_add_is_hot_column_to_auto_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('auto', 'is_hot', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('auto', 'is_hot');
    }
}
