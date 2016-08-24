<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `locations`.
 */
class m160824_061450_create_locations_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%locations}}', [
            'id'            => Schema::TYPE_PK,
            'location'      => Schema::TYPE_STRING . ' NOT NULL',
            'district'      => Schema::TYPE_STRING,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('locations');
    }
}
