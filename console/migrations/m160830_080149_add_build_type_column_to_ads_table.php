<?php

use yii\db\Migration;

/**
 * Handles adding build_type to table `ads`.
 */
class m160830_080149_add_build_type_column_to_ads_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('ads', 'build_type', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('ads', 'build_type');
    }
}
