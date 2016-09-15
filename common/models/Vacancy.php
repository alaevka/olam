<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "vacancy".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $title
 * @property string $vacancy_description
 * @property string $duties
 * @property string $requirements
 * @property string $conditions
 * @property integer $wage_level
 * @property string $experience_years
 * @property string $experience_tags
 * @property string $suggestion_employment
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Vacancy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacancy';
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'wage_level', 'title', 'vacancy_description'], 'required'],
            [['company_id', 'wage_level', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['title', 'vacancy_description', 'duties', 'requirements', 'conditions', 'experience_years', 'suggestion_employment'], 'string'],
            [['experience_tags'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => Yii::t('app', 'works.company_name'),
            'title' => Yii::t('app', 'works.position_title'),
            'vacancy_description' => Yii::t('app', 'works.vacancy_description'),
            'duties' => Yii::t('app', 'works.duties'),
            'requirements' => Yii::t('app', 'works.requirements'),
            'conditions' => Yii::t('app', 'works.conditions'),
            'wage_level' => Yii::t('app', 'works.wage_level'),
            'experience_years' => Yii::t('app', 'works.experience_years'),
            'experience_tags' => Yii::t('app', 'works.experience_tags'),
            'suggestion_employment' => Yii::t('app', 'works.suggestion_employment'),
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function _getCount() {
        return self::find()->count();
    }
}
