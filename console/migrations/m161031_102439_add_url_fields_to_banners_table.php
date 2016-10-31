<?php

use yii\db\Migration;

class m161031_102439_add_url_fields_to_banners_table extends Migration
{
    public function up()
    {
        $this->addColumn('banners', 'main_page1_image_url', $this->text());
        $this->addColumn('banners', 'main_page2_image_url', $this->text());
        $this->addColumn('banners', 'main_page3_image_url', $this->text());
        $this->addColumn('banners', 'main_page4_image_url', $this->text());

        $this->addColumn('banners', 'news1_image_url', $this->text());
        $this->addColumn('banners', 'news2_image_url', $this->text());
        $this->addColumn('banners', 'news3_image_url', $this->text());
        $this->addColumn('banners', 'news4_image_url', $this->text());

        $this->addColumn('banners', 'auto1_image_url', $this->text());
        $this->addColumn('banners', 'auto2_image_url', $this->text());
        $this->addColumn('banners', 'auto3_image_url', $this->text());
        $this->addColumn('banners', 'auto4_image_url', $this->text());

        $this->addColumn('banners', 'realty1_image_url', $this->text());
        $this->addColumn('banners', 'realty2_image_url', $this->text());
        $this->addColumn('banners', 'realty3_image_url', $this->text());
        $this->addColumn('banners', 'realty4_image_url', $this->text());

        $this->addColumn('banners', 'work1_image_url', $this->text());
        $this->addColumn('banners', 'work2_image_url', $this->text());
        $this->addColumn('banners', 'work3_image_url', $this->text());
        $this->addColumn('banners', 'work4_image_url', $this->text());

        $this->addColumn('banners', 'ads1_image_url', $this->text());
        $this->addColumn('banners', 'ads2_image_url', $this->text());
        $this->addColumn('banners', 'ads3_image_url', $this->text());
        $this->addColumn('banners', 'ads4_image_url', $this->text());

        $this->addColumn('banners', 'afisha1_image_url', $this->text());
        $this->addColumn('banners', 'afisha2_image_url', $this->text());
        $this->addColumn('banners', 'afisha3_image_url', $this->text());
        $this->addColumn('banners', 'afisha4_image_url', $this->text());

        $this->addColumn('banners', 'tv1_image_url', $this->text());
        $this->addColumn('banners', 'tv2_image_url', $this->text());
        $this->addColumn('banners', 'tv3_image_url', $this->text());
        $this->addColumn('banners', 'tv4_image_url', $this->text());
    }

    public function down()
    {
        echo "m161031_102439_add_url_fields_to_banners_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
