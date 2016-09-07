<?php

use yii\db\Migration;

/**
 * Handles dropping location_raion from table `ads`.
 */
class m160907_061350_drop_location_raion_column_from_ads_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('ads', 'location_raion');
        $this->dropColumn('ads', 'location_street');

        $this->addColumn('ads', 'location_raion', $this->integer());
        $this->addColumn('ads', 'location_street', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        echo "m160907_061350_drop_location_raion_column_from_ads_table cannot be reverted.\n";
        return false;
    }
}
