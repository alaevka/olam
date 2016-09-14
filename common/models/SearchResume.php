<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Resume;

class SearchResume extends Resume
{

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [[''], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Resume::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            //'sort'=> ['defaultOrder' => ['order'=>SORT_ASC]]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        //$query->andFilterWhere(['like', 'auto_object_type', $this->auto_object_type]);

        return $dataProvider;
    }
}
