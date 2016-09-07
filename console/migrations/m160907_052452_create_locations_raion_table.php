<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `locations_raion`.
 */
class m160907_052452_create_locations_raion_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%locations_raion}}', [
            'id' => Schema::TYPE_PK,
            'location_id' => Schema::TYPE_INTEGER,
            'raion' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('locations_raion');
    }
}
