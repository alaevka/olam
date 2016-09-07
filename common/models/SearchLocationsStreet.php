<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LocationsStreet;

class SearchLocationsStreet extends LocationsStreet
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['street'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = LocationsStreet::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'street', $this->street]);

        return $dataProvider;
    }
}
