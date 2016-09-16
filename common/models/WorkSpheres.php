<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "work_spheres".
 *
 * @property integer $id
 * @property string $name
 */
class WorkSpheres extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_spheres';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название сферы деятельности',
        ];
    }

    public function _getCountVacancy() {
        return \common\models\Companies::find()->where(['like', 'company_spheres', $this->id])->count();
    }
}
