<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "marka".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property string $name
 * @property integer $marka_id
 */
class AutoMarka extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'marka';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'name', 'marka_id'], 'required'],
            [['cat_id', 'marka_id'], 'integer'],
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
            'name' => 'Name',
            'marka_id' => 'Marka ID',
        ];
    }

    public static function getList($tech_category_id) {
        return self::find()->select(['marka_id as id', 'name'])->where(['cat_id' => $tech_category_id])->asArray()->all();
    }
}
