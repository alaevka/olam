<?php

use yii\db\Migration;

/**
 * Handles adding suggestions_city to table `resume`.
 */
class m160914_103245_add_suggestions_city_column_to_resume_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('resume', 'suggestions_city', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('resume', 'suggestions_city');
    }
}
