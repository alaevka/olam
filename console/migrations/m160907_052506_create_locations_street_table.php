<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `locations_street`.
 */
class m160907_052506_create_locations_street_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%locations_street}}', [
            'id' => Schema::TYPE_PK,
            'location_id' => Schema::TYPE_INTEGER,
            'raion_id' => Schema::TYPE_INTEGER,
            'street' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('locations_street');
    }
}
