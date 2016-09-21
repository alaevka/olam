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
            [['title', 'text_query', 'category_id'], 'safe'],
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

       


        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->andFilterWhere(['category_id' => $this->category_id]);
        $query->orFilterWhere(['like', 'title', $this->text_query])->orFilterWhere(['like', 'description', $this->text_query]);

        return $dataProvider;
    }
}
