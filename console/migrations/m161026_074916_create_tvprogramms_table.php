<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `tvprogramms`.
 */
class m161026_074916_create_tvprogramms_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%tvprogramms}}', [
            'id'            => Schema::TYPE_PK,
            'channel'       => Schema::TYPE_STRING . ' NOT NULL',
            'day'           => Schema::TYPE_STRING,
            'time'          => Schema::TYPE_STRING,
            'show'          => Schema::TYPE_TEXT,
            'created_at'    => Schema::TYPE_INTEGER,
            'updated_at'    => Schema::TYPE_INTEGER,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tvprogramms');
    }
}
