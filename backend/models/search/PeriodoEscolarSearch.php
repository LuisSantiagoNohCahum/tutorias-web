<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PeriodoEscolar;

/**
 * PeriodoEscolarSearch represents the model behind the search form of `app\models\PeriodoEscolar`.
 */
class PeriodoEscolarSearch extends PeriodoEscolar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_estatus', 'id_ciclo'], 'integer'],
            [['nombre', 'letra_periodo', 'date_start', 'date_end', 'created_at', 'updated_at'], 'safe'],
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
    public function search($params, $id_ciclo = null)
    {
        if ($id_ciclo != null) 
            $query = PeriodoEscolar::find()->where(['id_ciclo'=> $id_ciclo]);
        else 
            $query = PeriodoEscolar::find();

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
            'id_estatus' => $this->id_estatus,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'id_ciclo' => $this->id_ciclo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'letra_periodo', $this->letra_periodo]);

        return $dataProvider;
    }
}
