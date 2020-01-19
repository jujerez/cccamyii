<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clines;

/**
 * ClinesSearch represents the model behind the search form of `app\models\Clines`.
 */
class ClinesSearch extends Clines
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cliente_id'], 'integer'],
            [['servidor', 'usuario', 'password', 'fecha_alta'], 'safe'],
            [['puerto'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Clines::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'puerto' => $this->puerto,
            'fecha_alta' => $this->fecha_alta,
            'cliente_id' => $this->cliente_id,
        ]);

        $query->andFilterWhere(['ilike', 'servidor', $this->servidor])
            ->andFilterWhere(['ilike', 'usuario', $this->usuario])
            ->andFilterWhere(['ilike', 'password', $this->password]);

        return $dataProvider;
    }
}
