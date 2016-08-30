<?php

use yii\db\Migration;

/**
 * Handles the creation for table `flattypes`.
 */
class m160830_053336_create_flattypes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('flattypes', [
            'id' => $this->primaryKey(),
            'title' => \yii\db\Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('flattypes');
    }
}
