<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Predmeti;

/**
 * PredmetiSearch represents the model behind the search form about `app\models\Predmeti`.
 */
class PredmetiSearch extends Predmeti
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['predmet', 'prepod1', 'prepod2', 'group'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Predmeti::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'predmet', $this->predmet])
				->andFilterWhere(['like', 'prepod1', $this->prepod1])
				->andFilterWhere(['like', 'prepod2', $this->prepod2])
				->andFilterWhere(['like', 'group', $this->group]);

        return $dataProvider;
    }
}
