<?php

use yii\db\Migration;

/**
 * Handles adding some to table `resume`.
 */
class m160914_103611_add_some_columns_to_resume_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('resume', 'business_trip', $this->integer());
        $this->addColumn('resume', 'languages', $this->text());
        $this->addColumn('resume', 'drivers_license', $this->string());
        $this->addColumn('resume', 'smoking', $this->integer());
        $this->addColumn('resume', 'personal_qualities', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
