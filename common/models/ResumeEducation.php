<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "resume_education".
 *
 * @property integer $id
 * @property string $education_stage
 * @property string $education_stage_from
 * @property string $education_stage_to
 * @property string $education_stage_city
 * @property string $education_stage_form
 */
class ResumeEducation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resume_education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resume_id'], 'integer'],
            [['education_stage', 'education_title', 'education_stage_from', 'education_stage_to', 'education_stage_city', 'education_stage_form'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'education_stage' => Yii::t('app', 'works.education_stage'),
            'education_stage_from' => Yii::t('app', 'works.education_stage_from'),
            'education_stage_to' => Yii::t('app', 'works.education_stage_to'),
            'education_stage_city' => Yii::t('app', 'works.education_stage_city'),
            'education_stage_form' => Yii::t('app', 'works.education_stage_form'),
            'education_title' => Yii::t('app', 'works.education_title'),
        ];
    }
}
