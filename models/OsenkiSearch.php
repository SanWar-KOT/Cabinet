<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Osenki;

/**
 * OsenkiSearch represents the model behind the search form about `app\models\Osenki`.
 */
class OsenkiSearch extends Osenki
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'semestr'], 'integer'],
            [['login', 'predmet', 'resultat'], 'safe'],
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
        $query = Osenki::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'semestr' => $this->semestr,
        ]);

        $query->andFilterWhere(['like', 'login', $this->login])
            ->andFilterWhere(['like', 'predmet', $this->predmet])
            ->andFilterWhere(['like', 'resultat', $this->resultat]);

        return $dataProvider;
    }
}
