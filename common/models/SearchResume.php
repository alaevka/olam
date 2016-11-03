<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Resume;

class SearchResume extends Resume
{
    public $text_query;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['suggestion_position', 'suggestion_pay', 'suggestion_pay', 'text_query', 'suggestion_sphere', 'suggestion_schedule', 'suggestion_employment', 'personal_gender', 'personal_marital_status', 'business_trip', 'is_active'], 'safe'],
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

        $query->andFilterWhere(['like', 'suggestion_position', $this->suggestion_position]);
        $query->andFilterWhere(['suggestion_sphere' => $this->suggestion_sphere]);
        $query->andFilterWhere(['suggestion_schedule' => $this->suggestion_schedule]);
        $query->andFilterWhere(['suggestion_employment' => $this->suggestion_employment]);
        $query->andFilterWhere(['personal_gender' => $this->personal_gender]);
        $query->andFilterWhere(['personal_marital_status' => $this->personal_marital_status]);
        $query->andFilterWhere(['business_trip' => $this->business_trip]);
        $query->andFilterWhere(['>=', 'suggestion_pay', $this->suggestion_pay]);

        $query->orFilterWhere(['like', 'suggestion_position', $this->text_query])->orFilterWhere(['like', 'experience_information', $this->text_query])->orFilterWhere(['like', 'personal_qualities', $this->text_query]);

        return $dataProvider;
    }

    public function search_notactive($params)
    {
        $query = Resume::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            //'sort'=> ['defaultOrder' => ['order'=>SORT_ASC]]
        ]);
        $query->andFilterWhere(['is_active' => 0]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'suggestion_position', $this->suggestion_position]);
        $query->andFilterWhere(['suggestion_sphere' => $this->suggestion_sphere]);
        $query->andFilterWhere(['suggestion_schedule' => $this->suggestion_schedule]);
        $query->andFilterWhere(['suggestion_employment' => $this->suggestion_employment]);
        $query->andFilterWhere(['personal_gender' => $this->personal_gender]);
        $query->andFilterWhere(['personal_marital_status' => $this->personal_marital_status]);
        $query->andFilterWhere(['business_trip' => $this->business_trip]);
        $query->andFilterWhere(['>=', 'suggestion_pay', $this->suggestion_pay]);

        $query->orFilterWhere(['like', 'suggestion_position', $this->text_query])->orFilterWhere(['like', 'experience_information', $this->text_query])->orFilterWhere(['like', 'personal_qualities', $this->text_query]);

        return $dataProvider;
    }
}
