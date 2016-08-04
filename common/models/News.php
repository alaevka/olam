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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'content'], 'string'],
            [['title', 'category_id', 'content'], 'required'],
            [['category_id', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['image_name'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['seoTitle', 'seoKeywords', 'seoDescription'], 'safe'],
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
        ];
    }

}
