<?php

use yii\db\Migration;

/**
 * Handles the creation for table `ownership`.
 */
class m160830_053419_create_ownership_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('ownership', [
            'id' => $this->primaryKey(),
            'title' => \yii\db\Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('ownership');
    }
}
