<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banners".
 *
 * @property integer $id
 * @property string $main_page1_text
 * @property string $main_page1_image
 * @property string $main_page2_text
 * @property string $main_page2_image
 * @property string $main_page3_text
 * @property string $main_page3_image
 * @property string $main_page4_text
 * @property string $main_page4_image
 * @property string $news1_text
 * @property string $news1_image
 * @property string $news2_text
 * @property string $news2_image
 * @property string $news3_text
 * @property string $news3_image
 * @property string $news4_text
 * @property string $news4_image
 * @property string $realty1_text
 * @property string $realty1_image
 * @property string $realty2_text
 * @property string $realty2_image
 * @property string $realty3_text
 * @property string $realty3_image
 * @property string $realty4_text
 * @property string $realty4_image
 * @property string $auto1_text
 * @property string $auto1_image
 * @property string $auto2_text
 * @property string $auto2_image
 * @property string $auto3_text
 * @property string $auto3_image
 * @property string $auto4_text
 * @property string $auto4_image
 * @property string $work1_text
 * @property string $work1_image
 * @property string $work2_text
 * @property string $work2_image
 * @property string $work3_text
 * @property string $work3_image
 * @property string $work4_text
 * @property string $work4_image
 * @property string $ads1_text
 * @property string $ads1_image
 * @property string $ads2_text
 * @property string $ads2_image
 * @property string $ads3_text
 * @property string $ads3_image
 * @property string $ads4_text
 * @property string $ads4_image
 * @property string $afisha1_text
 * @property string $afisha1_image
 * @property string $afisha2_text
 * @property string $afisha2_image
 * @property string $afisha3_text
 * @property string $afisha3_image
 * @property string $afisha4_text
 * @property string $afisha4_image
 * @property string $tv1_text
 * @property string $tv1_image
 * @property string $tv2_text
 * @property string $tv2_image
 * @property string $tv3_text
 * @property string $tv3_image
 * @property string $tv4_text
 * @property string $tv4_image
 */
class Banners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['main_page1_text', 'main_page2_text', 'main_page3_text', 'main_page4_text', 'news1_text', 'news2_text', 'news3_text', 'news4_text', 'realty1_text', 'realty2_text', 'realty3_text', 'realty4_text', 'auto1_text', 'auto2_text', 'auto3_text', 'auto4_text', 'work1_text', 'work2_text', 'work3_text', 'work4_text', 'ads1_text', 'ads2_text', 'ads3_text', 'ads4_text', 'afisha1_text', 'afisha2_text', 'afisha3_text', 'afisha4_text', 'tv1_text', 'tv2_text', 'tv3_text', 'tv4_text'], 'string'],
            [['main_page1_image', 'main_page2_image', 'main_page3_image', 'main_page4_image', 'news1_image', 'news2_image', 'news3_image', 'news4_image', 'realty1_image', 'realty2_image', 'realty3_image', 'realty4_image', 'auto1_image', 'auto2_image', 'auto3_image', 'auto4_image', 'work1_image', 'work2_image', 'work3_image', 'work4_image', 'ads1_image', 'ads2_image', 'ads3_image', 'ads4_image', 'afisha1_image', 'afisha2_image', 'afisha3_image', 'afisha4_image', 'tv1_image', 'tv2_image', 'tv3_image', 'tv4_image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [[
                'main_page1_image_url', 'main_page2_image_url', 'main_page3_image_url', 'main_page4_image_url',
                'news1_image_url', 'news2_image_url', 'news3_image_url', 'news4_image_url',
                'auto1_image_url', 'auto2_image_url', 'auto3_image_url', 'auto4_image_url',
                'realty1_image_url', 'realty2_image_url', 'realty3_image_url', 'realty4_image_url',
                'work1_image_url', 'work2_image_url', 'work3_image_url', 'work4_image_url',
                'ads1_image_url', 'ads2_image_url', 'ads3_image_url', 'ads4_image_url',
                'afisha1_image_url', 'afisha2_image_url', 'afisha3_image_url', 'afisha4_image_url',
                'tv1_image_url', 'tv2_image_url', 'tv3_image_url', 'tv4_image_url',

            ], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'main_page1_text' => 'Главная страница - в шапке (код)',
            'main_page1_image' => 'Главная страница - в шапке (изображение)',
            'main_page2_text' => 'Главная страница - слева 1 (код)',
            'main_page2_image' => 'Главная страница - слева 1 (изображение)',
            'main_page3_text' => 'Главная страница - слева 2 (код)',
            'main_page3_image' => 'Главная страница - слева 2 (изображение)',
            'main_page4_text' => 'Главная страница - нижний (код)',
            'main_page4_image' => 'Главная страница - нижний (изображение)',

            'news1_text' => 'Страница новостей - в шапке (код)',
            'news1_image' => 'Страница новостей - в шапке (изображение)',
            'news2_text' => 'Страница новостей - слева 1 (код)',
            'news2_image' => 'Страница новостей - слева 1 (изображение)',
            'news3_text' => 'Страница новостей - слева 2 (код)',
            'news3_image' => 'Страница новостей - слева 2 (изображение)',
            'news4_text' => 'Страница новостей - нижний (код)',
            'news4_image' => 'Страница новостей - нижний (изображение)',

            'realty1_text' => 'Страница недвижимость - в шапке (код)',
            'realty1_image' => 'Страница недвижимость - в шапке (изображение)',
            'realty2_text' => 'Страница недвижимость - слева 1 (код)',
            'realty2_image' => 'Страница недвижимость - слева 1 (изображение)',
            'realty3_text' => 'Страница недвижимость - слева 2 (код)',
            'realty3_image' => 'Страница недвижимость - слева 2 (изображение)',
            'realty4_text' => 'Страница недвижимость - нижний (код)',
            'realty4_image' => 'Страница недвижимость - нижний (изображение)',

            'auto1_text' => 'Страница авто - в шапке (код)',
            'auto1_image' => 'Страница авто - в шапке (изображение)',
            'auto2_text' => 'Страница авто - слева 1 (код)',
            'auto2_image' => 'Страница авто - слева 1 (изображение)',
            'auto3_text' => 'Страница авто - слева 2 (код)',
            'auto3_image' => 'Страница авто - слева 2 (изображение)',
            'auto4_text' => 'Страница авто - нижний (код)',
            'auto4_image' => 'Страница авто - нижний (изображение)',

            'work1_text' => 'Страница работа - в шапке (код)',
            'work1_image' => 'Страница работа - в шапке (изображение)',
            'work2_text' => 'Страница работа - слева 1 (код)',
            'work2_image' => 'Страница работа - слева 1 (изображение)',
            'work3_text' => 'Страница работа - слева 2 (код)',
            'work3_image' => 'Страница работа - слева 2 (изображение)',
            'work4_text' => 'Страница работа - нижний (код)',
            'work4_image' => 'Страница работа - нижний (изображение)',

            'ads1_text' => 'Страница объявления - в шапке (код)',
            'ads1_image' => 'Страница объявления - в шапке (изображение)',
            'ads2_text' => 'Страница объявления - слева 1 (код)',
            'ads2_image' => 'Страница объявления - слева 1 (изображение)',
            'ads3_text' => 'Страница объявления - слева 2 (код)',
            'ads3_image' => 'Страница объявления - слева 2 (изображение)',
            'ads4_text' => 'Страница объявления - нижний (код)',
            'ads4_image' => 'Страница объявления - нижний (изображение)',

            'afisha1_text' => 'Страница афиша - в шапке (код)',
            'afisha1_image' => 'Страница афиша - в шапке (изображение)',
            'afisha2_text' => 'Страница афиша - слева 1 (код)',
            'afisha2_image' => 'Страница афиша - слева 1 (изображение)',
            'afisha3_text' => 'Страница афиша - слева 2 (код)',
            'afisha3_image' => 'Страница афиша - слева 2 (изображение)',
            'afisha4_text' => 'Страница афиша - нижний (код)',
            'afisha4_image' => 'Страница афиша - нижний (изображение)',

            'tv1_text' => 'Страница ТВ - в шапке (код)',
            'tv1_image' => 'Страница ТВ - в шапке (изображение)',
            'tv2_text' => 'Страница ТВ - слева 1 (код)',
            'tv2_image' => 'Страница ТВ - слева 1 (изображение)',
            'tv3_text' => 'Страница ТВ - слева 2 (код)',
            'tv3_image' => 'Страница ТВ - слева 2 (изображение)',
            'tv4_text' => 'Страница ТВ - нижний (код)',
            'tv4_image' => 'Страница ТВ - нижний (изображение)',

            'main_page1_image_url' => 'Ссылка на изображение',
            'main_page2_image_url' => 'Ссылка на изображение',
            'main_page3_image_url' => 'Ссылка на изображение',
            'main_page4_image_url' => 'Ссылка на изображение',

            'news1_image_url' => 'Ссылка на изображение',
            'news2_image_url' => 'Ссылка на изображение',
            'news3_image_url' => 'Ссылка на изображение',
            'news4_image_url' => 'Ссылка на изображение',

            'auto1_image_url' => 'Ссылка на изображение',
            'auto2_image_url' => 'Ссылка на изображение',
            'auto3_image_url' => 'Ссылка на изображение',
            'auto4_image_url' => 'Ссылка на изображение',

            'realty1_image_url' => 'Ссылка на изображение',
            'realty2_image_url' => 'Ссылка на изображение',
            'realty3_image_url' => 'Ссылка на изображение',
            'realty4_image_url' => 'Ссылка на изображение',

            'work1_image_url' => 'Ссылка на изображение',
            'work2_image_url' => 'Ссылка на изображение',
            'work3_image_url' => 'Ссылка на изображение',
            'work4_image_url' => 'Ссылка на изображение',

            'ads1_image_url' => 'Ссылка на изображение',
            'ads2_image_url' => 'Ссылка на изображение',
            'ads3_image_url' => 'Ссылка на изображение',
            'ads4_image_url' => 'Ссылка на изображение',

            'afisha1_image_url' => 'Ссылка на изображение',
            'afisha2_image_url' => 'Ссылка на изображение',
            'afisha3_image_url' => 'Ссылка на изображение',
            'afisha4_image_url' => 'Ссылка на изображение',

            'tv1_image_url' => 'Ссылка на изображение',
            'tv2_image_url' => 'Ссылка на изображение',
            'tv3_image_url' => 'Ссылка на изображение',
            'tv4_image_url' => 'Ссылка на изображение',
        ];
    }
}
