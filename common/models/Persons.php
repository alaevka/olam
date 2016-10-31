<?php

namespace common\models;

use Yii;
use backend\components\ExtendedSeoBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "persons".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $subtitle
 * @property string $image_name
 * @property string $content
 * @property string $tags
 * @property integer $created_at
 * @property integer $updated_at
 */
class Persons extends \yii\db\ActiveRecord
{

    public function behaviors() {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => function () { return strtotime(date('Y-m-d H:i:s')); },

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
    public static function tableName()
    {
        return 'persons';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'subtitle', 'content', 'tags'], 'string'],
            [['title'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
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
            'title' => 'Заголовок',
            'image_name' => 'Изображение',
            'content' => 'Текст новости',
            'subtitle' => 'Краткое описание',
            'tags' => 'Теги, категория',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
