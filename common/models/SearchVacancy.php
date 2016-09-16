<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vacancy;

class SearchVacancy extends Vacancy
{
    public $text_query;
    public $suggestion_sphere;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'text_query', 'wage_level', 'suggestion_sphere', 'suggestion_employment'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Vacancy::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->andFilterWhere(['>=', 'wage_level', $this->wage_level]);

        $query->joinWith('company'); 
        $query->andFilterWhere(['like', 'companies.company_spheres', $this->suggestion_sphere]);

        $query->orFilterWhere(['like', 'title', $this->text_query])->orFilterWhere(['like', 'vacancy_description', $this->text_query])->orFilterWhere(['like', 'duties', $this->text_query])->orFilterWhere(['like', 'requirements', $this->text_query])->orFilterWhere(['like', 'conditions', $this->text_query]);

        $query->andFilterWhere(['like', 'suggestion_employment', $this->suggestion_employment]);

        return $dataProvider;
    }
}
