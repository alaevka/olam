<?php

namespace common\models;

use Yii;
use backend\components\ExtendedSeoBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $image_name
 * @property string $content
 * @property integer $category_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            'seo' => [
                'class' => ExtendedSeoBehavior::className(),
                'titleAttribute' => 'seoTitle',
                'keywordsAttribute' => 'seoKeywords',
                'descriptionAttribute' => 'seoDescription'
            ],
            'slug' => [
                'class' => 'Zelenin\yii\behaviors\Slug',
                'slugAttribute' => 'slug',
                'attribute' => 'title',
                // optional params
                'ensureUnique' => true,
                'replacement' => '-',
                'lowercase' => true,
                'immutable' => false,
                // If intl extension is enabled, see http://userguide.icu-project.org/transforms/general. 
                'transliterateOptions' => 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;'
            ],
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(\common\models\NewsCategory::className(), ['id' => 'category_id']);
    }

    public function getTypematerial()
    {
        return $this->hasOne(\common\models\NewsMaterial::className(), ['id' => 'type']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'content'], 'string'],
            [['title', 'category_id', 'content', 'type'], 'required'],
            [['category_id', 'created_at', 'updated_at', 'type'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['image_name'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['seoTitle', 'seoKeywords', 'seoDescription', 'main_big_new', 'right_new', 'second_big_new', 'main_page_new', 'youtube_link'], 'safe'],
            [['seoTitle'], 'checkSeoTitleIsGlobalUnique'], 
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Ссылка',
            'title' => 'Заголовок новости',
            'image_name' => 'Изображение',
            'content' => 'Текст новости',
            'category_id' => 'Категория',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'seoTitle' => 'Seo тег title',
            'seoKeywords' => 'Seo тег keywords',
            'seoDescription' => 'Seo тег description',
            'main_big_new' => 'Основная новость на главной', 
            'right_new' => 'В столбец справа на главной', 
            'second_big_new' => 'Вторая основная новость на главной', 
            'main_page_new' => 'В список новостей главной (одна из 6)',
            'type' => 'Тип материала',
        ];
    }

    public function getShortText($length) {
        $text = str_replace("</p>", " </p>", $this->content);
        $text = str_replace("<p>", " <p>", $text);
        $text = str_replace("<P>", " <P>", $text);
        $text = str_replace("<br>", " <br>", $text);
        $text = str_replace("</P>", " </P>", $text);
        $text = str_replace("<br/>", " <br/>", $text);
        $text = str_replace("<BR/>", " <BR/>", $text);
        $text = str_replace("<BR>", " <BR>", $text);
        $text = strip_tags($text, "<br>");
        if(strlen($text) <= $length) {
        return $text;
        }
        $text = substr($text, 0, $length);
        $toks = explode(" ", $text);
        unset($toks[count($toks)-1]);
        return implode(" ", $toks).'..';
    }

}
