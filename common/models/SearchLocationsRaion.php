<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LocationsRaion;

class SearchLocationsRaion extends LocationsRaion
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['raion'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = LocationsRaion::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'raion', $this->raion]);

        return $dataProvider;
    }
}
