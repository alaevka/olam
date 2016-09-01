<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "model".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property integer $marka_id
 * @property string $name
 * @property integer $model_id
 */
class AutoModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'model';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'marka_id', 'name', 'model_id'], 'required'],
            [['cat_id', 'marka_id', 'model_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Cat ID',
            'marka_id' => 'Marka ID',
            'name' => 'Name',
            'model_id' => 'Model ID',
        ];
    }

    public static function getList($tech_category_id, $tech_marka_id) {
        return self::find()->where(['cat_id' => $tech_category_id, 'marka_id' => $tech_marka_id])->asArray()->all();
    }
}
