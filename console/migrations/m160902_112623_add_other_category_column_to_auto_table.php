<?php

use yii\db\Migration;

/**
 * Handles adding other_category to table `auto`.
 */
class m160902_112623_add_other_category_column_to_auto_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('auto', 'other_category', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('auto', 'other_category');
    }
}
