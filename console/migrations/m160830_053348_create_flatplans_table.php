<?php

use yii\db\Migration;

/**
 * Handles the creation for table `flatplans`.
 */
class m160830_053348_create_flatplans_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('flatplans', [
            'id' => $this->primaryKey(),
            'title' => \yii\db\Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('flatplans');
    }
}
