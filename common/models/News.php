<?php

namespace common\models;

use Yii;
use romi45\seoContent\components\SeoBehavior;

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
                'seo' => [
                    'class' => SeoBehavior::className(),
                    'titleAttribute' => 'seoTitle',
                    'keywordsAttribute' => 'seoKeywords',
                    'descriptionAttribute' => 'seoDescription'
                ],
                'slug' => [
                    'class' => 'Zelenin\yii\behaviors\Slug',
                    'slugAttribute' => 'slug',
                    'attribute' => 'name',
                    // optional params
                    'ensureUnique' => true,
                    'replacement' => '-',
                    'lowercase' => true,
                    'immutable' => false,
                    // If intl extension is enabled, see http://userguide.icu-project.org/transforms/general. 
                    'transliterateOptions' => 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;'
                ]
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
            [['title'], 'required'],
            [['category_id', 'created_at', 'updated_at'], 'integer'],
            [['title', 'image_name'], 'string', 'max' => 255],
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
            'slug' => 'Slug',
            'title' => 'Title',
            'image_name' => 'Image Name',
            'content' => 'Content',
            'category_id' => 'Category ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }
}
