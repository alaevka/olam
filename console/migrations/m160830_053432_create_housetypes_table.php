<?php

use yii\db\Migration;

/**
 * Handles the creation for table `housetypes`.
 */
class m160830_053432_create_housetypes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('housetypes', [
            'id' => $this->primaryKey(),
            'title' => \yii\db\Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('housetypes');
    }
}
