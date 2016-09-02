<?php

use yii\db\Migration;

/**
 * Handles adding wheels to table `auto`.
 */
class m160902_075654_add_wheels_columns_to_auto_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('auto', 'wheel_tire_category', $this->integer());
        $this->addColumn('auto', 'wheel_tyre_radius', $this->float());
        $this->addColumn('auto', 'wheel_manufacturer', $this->integer());
        $this->addColumn('auto', 'wheel_dia', $this->float());
        $this->addColumn('auto', 'wheel_pcd', $this->string());
        $this->addColumn('auto', 'wheel_width', $this->float());
        $this->addColumn('auto', 'wheel_et', $this->float());
        $this->addColumn('auto', 'wheel_type', $this->integer());
        $this->addColumn('auto', 'tire_manufacturer', $this->integer());
        $this->addColumn('auto', 'tire_season', $this->integer());
        $this->addColumn('auto', 'tire_type', $this->integer());
        $this->addColumn('auto', 'tire_speed_index', $this->string());
        $this->addColumn('auto', 'tire_width', $this->integer());
        $this->addColumn('auto', 'tire_height', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('auto', 'wheel_category');
        $this->dropColumn('auto', 'wheel_tire_category');
        $this->dropColumn('auto', 'wheel_tyre_radius');
        $this->dropColumn('auto', 'wheel_manufacturer');
        $this->dropColumn('auto', 'wheel_dia');
        $this->dropColumn('auto', 'wheel_pcd');
        $this->dropColumn('auto', 'wheel_width');
        $this->dropColumn('auto', 'wheel_et');
        $this->dropColumn('auto', 'wheel_type');
        $this->dropColumn('auto', 'tire_manufacturer');
        $this->dropColumn('auto', 'tire_season');
        $this->dropColumn('auto', 'tire_type');
        $this->dropColumn('auto', 'tire_speed_index');
        $this->dropColumn('auto', 'tire_width');
        $this->dropColumn('auto', 'tire_height');
    }
}
