<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `work_spheres`.
 */
class m160914_055744_create_work_spheres_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%work_spheres}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('work_spheres');
    }
}
