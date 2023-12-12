<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Semana;

/**
 * SemanaSearch represents the model behind the search form of `app\models\Semana`.
 */
class SemanaSearch extends Semana
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'num_semana', 'tipo_tutoria', 'id_pat'], 'integer'],
            [['nombre', 'tematica', 'objetivos', 'justificacion', 'estrategias_tutor', 'acciones', 'estrategias_tutorado'], 'safe'],
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
    public function search($params, $id_pat = null)
    {
        if ($id_pat != null) {
            $query = Semana::find()->where(['id_pat'=>$id_pat])->orderBy('num_semana');
        }else{
            $query = Semana::find();
        }

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
            'num_semana' => $this->num_semana,
            'tipo_tutoria' => $this->tipo_tutoria,
            'id_pat' => $this->id_pat,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'tematica', $this->tematica])
            ->andFilterWhere(['like', 'objetivos', $this->objetivos])
            ->andFilterWhere(['like', 'justificacion', $this->justificacion])
            ->andFilterWhere(['like', 'estrategias_tutor', $this->estrategias_tutor])
            ->andFilterWhere(['like', 'acciones', $this->acciones])
            ->andFilterWhere(['like', 'estrategias_tutorado', $this->estrategias_tutorado]);

        return $dataProvider;
    }
}
