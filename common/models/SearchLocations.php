<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Locations;

class SearchLocations extends Locations
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['location', 'district'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Locations::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'location', $this->location]);
        $query->andFilterWhere(['like', 'district', $this->district]);

        return $dataProvider;
    }
}
