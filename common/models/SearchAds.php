<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ads;

class SearchAds extends Ads
{
    public $area_from;
    public $area_to;
    public $price_from;
    public $price_to;
    public $level_from;
    public $level_to;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['location_city', 'rlty_action', 'rooms_count', 'area_from', 'area_to', 'price_from', 'price_to', 'level_from', 'level_to', 'location_raion', 'location_street', 'house_type', 'house_material', 'build_type'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Ads::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->andFilterWhere(['rlty_action' => $this->rlty_action]);
        $query->andFilterWhere(['rooms_count' => $this->rooms_count]);
        $query->andFilterWhere(['>=', 'area_total', $this->area_from])->andFilterWhere(['<=', 'area_total', $this->area_to]);
        $query->andFilterWhere(['>=', 'price', $this->price_from])->andFilterWhere(['<=', 'price', $this->price_to]);
        $query->andFilterWhere(['>=', 'level', $this->level_from])->andFilterWhere(['<=', 'level', $this->level_to]);

        $query->andFilterWhere(['location_city' => $this->location_city]);
        $query->andFilterWhere(['location_raion' => $this->location_raion]);
        $query->andFilterWhere(['location_street' => $this->location_street]);
        $query->andFilterWhere(['house_type' => $this->house_type]);
        $query->andFilterWhere(['house_material' => $this->house_material]);
        $query->andFilterWhere(['build_type' => $this->build_type]);


        return $dataProvider;
    }
}
