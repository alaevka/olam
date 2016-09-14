<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `work_schedule`.
 */
class m160914_061925_create_work_schedule_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%work_schedule}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('work_schedule');
    }
}
