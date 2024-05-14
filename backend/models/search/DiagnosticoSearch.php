<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Diagnostico;

/**
 * DiagnosticoSearch represents the model behind the search form of `app\models\Diagnostico`.
 */
class DiagnosticoSearch extends Diagnostico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_alumno', 'motivo'], 'integer'],
            [['asignaturas', 'otro', 'especifique'], 'safe'],
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
    public function search($params, $id_grupo = null)
    {
        if($id_grupo != null){
            $query = Diagnostico::find()->alias('D')->innerJoin('alumno A', 'D.id_alumno = A.id')->where(['A.id_grupo'=>$id_grupo])->orderBy('A.apellidop ASC, A.apellidom ASC, A.nombres');
        }else{
            $query = Diagnostico::find();
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
            'id_alumno' => $this->id_alumno,
            'motivo' => $this->motivo,
        ]);

        $query->andFilterWhere(['like', 'asignaturas', $this->asignaturas])
            ->andFilterWhere(['like', 'otro', $this->otro])
            ->andFilterWhere(['like', 'especifique', $this->especifique]);

        return $dataProvider;
    }
}
