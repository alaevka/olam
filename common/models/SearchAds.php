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
            [['location_city'], 'safe'],
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
            //'sort'=> ['defaultOrder' => ['order'=>SORT_ASC]]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        return $dataProvider;
    }
}
