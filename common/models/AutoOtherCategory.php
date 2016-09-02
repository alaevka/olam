<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "auto_other_category".
 *
 * @property integer $id
 * @property string $title
 */
class AutoOtherCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auto_other_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название категории',
        ];
    }
}
