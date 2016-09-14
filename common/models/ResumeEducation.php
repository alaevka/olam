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
            [['education_stage', 'education_stage_from', 'education_stage_to', 'education_stage_city', 'education_stage_form'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'education_stage' => 'Education Stage',
            'education_stage_from' => 'Education Stage From',
            'education_stage_to' => 'Education Stage To',
            'education_stage_city' => 'Education Stage City',
            'education_stage_form' => 'Education Stage Form',
        ];
    }
}
