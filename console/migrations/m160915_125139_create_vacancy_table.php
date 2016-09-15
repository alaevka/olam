<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `vacancy`.
 */
class m160915_125139_create_vacancy_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('vacancy', [
            'id' => Schema::TYPE_PK,
            'company_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_TEXT,
            'vacancy_description' => Schema::TYPE_TEXT,
            'duties' => Schema::TYPE_TEXT,
            'requirements' => Schema::TYPE_TEXT,
            'conditions' => Schema::TYPE_TEXT,
            'wage_level' => Schema::TYPE_INTEGER,
            'experience_years' => Schema::TYPE_TEXT,
            'experience_tags' => Schema::TYPE_TEXT,
            'suggestion_employment' => Schema::TYPE_TEXT,
            'user_id' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('vacancy');
    }
}
