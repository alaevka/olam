<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation for table `banners`.
 */
class m161031_083115_create_banners_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%banners}}', [
            'id'            => Schema::TYPE_PK,
            'main_page1_text'       => Schema::TYPE_TEXT,
            'main_page1_image'       => Schema::TYPE_STRING,
            'main_page2_text'       => Schema::TYPE_TEXT,
            'main_page2_image'       => Schema::TYPE_STRING,
            'main_page3_text'       => Schema::TYPE_TEXT,
            'main_page3_image'       => Schema::TYPE_STRING,
            'main_page4_text'       => Schema::TYPE_TEXT,
            'main_page4_image'       => Schema::TYPE_STRING,

            'news1_text'       => Schema::TYPE_TEXT,
            'news1_image'       => Schema::TYPE_STRING,
            'news2_text'       => Schema::TYPE_TEXT,
            'news2_image'       => Schema::TYPE_STRING,
            'news3_text'       => Schema::TYPE_TEXT,
            'news3_image'       => Schema::TYPE_STRING,
            'news4_text'       => Schema::TYPE_TEXT,
            'news4_image'       => Schema::TYPE_STRING,

            'realty1_text'       => Schema::TYPE_TEXT,
            'realty1_image'       => Schema::TYPE_STRING,
            'realty2_text'       => Schema::TYPE_TEXT,
            'realty2_image'       => Schema::TYPE_STRING,
            'realty3_text'       => Schema::TYPE_TEXT,
            'realty3_image'       => Schema::TYPE_STRING,
            'realty4_text'       => Schema::TYPE_TEXT,
            'realty4_image'       => Schema::TYPE_STRING,

            'auto1_text'       => Schema::TYPE_TEXT,
            'auto1_image'       => Schema::TYPE_STRING,
            'auto2_text'       => Schema::TYPE_TEXT,
            'auto2_image'       => Schema::TYPE_STRING,
            'auto3_text'       => Schema::TYPE_TEXT,
            'auto3_image'       => Schema::TYPE_STRING,
            'auto4_text'       => Schema::TYPE_TEXT,
            'auto4_image'       => Schema::TYPE_STRING,

            'work1_text'       => Schema::TYPE_TEXT,
            'work1_image'       => Schema::TYPE_STRING,
            'work2_text'       => Schema::TYPE_TEXT,
            'work2_image'       => Schema::TYPE_STRING,
            'work3_text'       => Schema::TYPE_TEXT,
            'work3_image'       => Schema::TYPE_STRING,
            'work4_text'       => Schema::TYPE_TEXT,
            'work4_image'       => Schema::TYPE_STRING,

            'ads1_text'       => Schema::TYPE_TEXT,
            'ads1_image'       => Schema::TYPE_STRING,
            'ads2_text'       => Schema::TYPE_TEXT,
            'ads2_image'       => Schema::TYPE_STRING,
            'ads3_text'       => Schema::TYPE_TEXT,
            'ads3_image'       => Schema::TYPE_STRING,
            'ads4_text'       => Schema::TYPE_TEXT,
            'ads4_image'       => Schema::TYPE_STRING,

            'afisha1_text'       => Schema::TYPE_TEXT,
            'afisha1_image'       => Schema::TYPE_STRING,
            'afisha2_text'       => Schema::TYPE_TEXT,
            'afisha2_image'       => Schema::TYPE_STRING,
            'afisha3_text'       => Schema::TYPE_TEXT,
            'afisha3_image'       => Schema::TYPE_STRING,
            'afisha4_text'       => Schema::TYPE_TEXT,
            'afisha4_image'       => Schema::TYPE_STRING,

            'tv1_text'       => Schema::TYPE_TEXT,
            'tv1_image'       => Schema::TYPE_STRING,
            'tv2_text'       => Schema::TYPE_TEXT,
            'tv2_image'       => Schema::TYPE_STRING,
            'tv3_text'       => Schema::TYPE_TEXT,
            'tv3_image'       => Schema::TYPE_STRING,
            'tv4_text'       => Schema::TYPE_TEXT,
            'tv4_image'       => Schema::TYPE_STRING,


        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('banners');
    }
}
