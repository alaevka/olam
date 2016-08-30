<?php

use yii\db\Migration;

/**
 * Handles adding title to table `ads`.
 */
class m160830_071355_add_title_column_to_ads_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('ads', 'title', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('ads', 'title');
    }
}
