<?php

use yii\db\Migration;

/**
 * Handles the creation for table `flatrepairs`.
 */
class m160830_053402_create_flatrepairs_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('flatrepairs', [
            'id' => $this->primaryKey(),
            'title' => \yii\db\Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('flatrepairs');
    }
}
