<?php

use yii\db\Migration;

/**
 * Handles adding is_hot to table `ads`.
 */
class m160830_080639_add_is_hot_column_to_ads_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('ads', 'is_hot', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('ads', 'is_hot');
    }
}
