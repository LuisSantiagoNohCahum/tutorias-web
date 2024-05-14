<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SemanaReal;

/**
 * SemanaRealSearch represents the model behind the search form of `app\models\SemanaReal`.
 */
class SemanaRealSearch extends SemanaReal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_grupomaster', 'id_semana', 'semana_atendida', 'alumnos_atendidos', 'alumnos_faltantes', 'total_alumnos', 'atendidos_hombres', 'atendidos_mujeres', 'total_gatendidos'], 'integer'],
            [['evidencias', 'observaciones', 'alumnos'], 'safe'],
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
        $query = SemanaReal::find();

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
            'id_grupomaster' => $this->id_grupomaster,
            'id_semana' => $this->id_semana,
            'semana_atendida' => $this->semana_atendida,
            'alumnos_atendidos' => $this->alumnos_atendidos,
            'alumnos_faltantes' => $this->alumnos_faltantes,
            'total_alumnos' => $this->total_alumnos,
            'atendidos_hombres' => $this->atendidos_hombres,
            'atendidos_mujeres' => $this->atendidos_mujeres,
            'total_gatendidos' => $this->total_gatendidos,
        ]);

        $query->andFilterWhere(['like', 'evidencias', $this->evidencias])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'alumnos', $this->alumnos]);

        return $dataProvider;
    }
}
