<?php

use yii\db\Migration;

/**
 * Handles adding education_title to table `resume_education`.
 */
class m160914_102433_add_education_title_column_to_resume_education_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('resume_education', 'education_title', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('resume_education', 'education_title');
    }
}
