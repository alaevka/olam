<?php

use yii\db\Migration;

/**
 * Handles the creation for table `housematerials`.
 */
class m160830_053442_create_housematerials_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('housematerials', [
            'id' => $this->primaryKey(),
            'title' => \yii\db\Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('housematerials');
    }
}
