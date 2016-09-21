<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Adsother;

class SearchAdsother extends Adsother
{
    public $text_query;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'text_query'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Adsother::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->orFilterWhere(['like', 'title', $this->text_query])->orFilterWhere(['like', 'description', $this->text_query]);

        return $dataProvider;
    }
}
