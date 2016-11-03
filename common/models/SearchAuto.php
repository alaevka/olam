<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Auto;

class SearchAuto extends Auto
{
    public $year_from;
    public $year_to;
    public $price_from;
    public $price_to;
    public $mileage_from;
    public $mileage_to;
    public $horsepower_from;
    public $horsepower_to;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['location_city', 'auto_object_type', 'is_active'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Auto::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            //'sort'=> ['defaultOrder' => ['order'=>SORT_ASC]]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'auto_object_type', $this->auto_object_type]);

        return $dataProvider;
    }

    public function search_notactive($params)
    {
        $query = Auto::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            //'sort'=> ['defaultOrder' => ['order'=>SORT_ASC]]
        ]);
        $query->andFilterWhere(['is_active' => 0]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'auto_object_type', $this->auto_object_type]);

        return $dataProvider;
    }
}
