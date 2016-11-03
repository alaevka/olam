<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\News;

class SearchNews extends News
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'slug', 'category_id', 'type'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = News::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            //'sort'=> ['defaultOrder' => ['order'=>SORT_ASC]]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->andFilterWhere(['like', 'slug', $this->slug]);
        $query->andFilterWhere(['category_id' => $this->category_id]);
        $query->andFilterWhere(['type' => $this->type]);

        return $dataProvider;
    }

    public function searchext($params, $category_id)
    {
        $query = News::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);
       
        
        $query->andFilterWhere(['category_id' => $category_id]);
        if(isset($params['type'])) {
            $query->andFilterWhere(['type' => $params['type']]);
        }





        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->andFilterWhere(['like', 'slug', $this->slug]);
        $query->andFilterWhere(['category_id' => $this->category_id]);

        return $dataProvider;
    }
}
