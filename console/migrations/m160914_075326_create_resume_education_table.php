<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `resume_education`.
 */
class m160914_075326_create_resume_education_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%resume_education}}', [
            'id' => Schema::TYPE_PK,
            'education_stage' => Schema::TYPE_TEXT,
            'education_stage_from' => Schema::TYPE_TEXT,
            'education_stage_to' => Schema::TYPE_TEXT,
            'education_stage_city' => Schema::TYPE_TEXT,
            'education_stage_form' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('resume_education');
    }
}
