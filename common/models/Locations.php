<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "locations".
 *
 * @property integer $id
 * @property string $location
 * @property string $district
 */
class Locations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location'], 'required'],
            [['location', 'district'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'location' => 'Населенный пункт',
            'district' => 'Регион',
        ];
    }

    public static function _getLocationsList() {
        
        $locations = self::find()->orderBy("location")->all();
        $list = '';
        foreach($locations as $id => $p) {
           $list .= '<li><a href="'.Url::to(['/work/location/', 'id' => $p->id]).'">'.$p->location.'</a></li>';
        }
        return $list;
    }

    public static function _getLocations() {
        $options = [];
         
        $parents = self::find()->groupBy("district")->all();
        foreach($parents as $id => $p) {
            $children = self::find()->where("district=:parent_id", [":parent_id"=>$p->district])->all();
            $child_options = [];
            foreach($children as $child) {
                $child_options[$child->id] = $child->location;
            }
            $options[$p->district] = $child_options;
        }
        return $options;
    }
}
