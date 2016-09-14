<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `work_employment`.
 */
class m160914_062124_create_work_employment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%work_employment}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('work_employment');
    }
}
