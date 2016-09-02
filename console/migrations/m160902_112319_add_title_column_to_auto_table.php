<?php

use yii\db\Migration;

/**
 * Handles adding title to table `auto`.
 */
class m160902_112319_add_title_column_to_auto_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('auto', 'title', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('auto', 'title');
    }
}
