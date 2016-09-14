<?php

use yii\db\Migration;

/**
 * Handles adding resume_id to table `resume_education`.
 */
class m160914_112416_add_resume_id_column_to_resume_education_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('resume_education', 'resume_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('resume_education', 'resume_id');
    }
}
