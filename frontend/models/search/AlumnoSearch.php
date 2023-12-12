<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Alumno;

/**
 * AlumnoSearch represents the model behind the search form of `app\models\Alumno`.
 */
class AlumnoSearch extends Alumno
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'genero', 'id_grupo'], 'integer'],
            [['nombres', 'apellidop', 'apellidom', 'matricula', 'correo', 'telefono', 'fecha_nac', 'ciudad', 'created_at', 'updated_at'], 'safe'],
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
    public function search($params, $id_grupo=null)
    {
        if ($id_grupo != null) {
            $query = Alumno::find()->alias('A')->where(['A.id_grupo'=>$id_grupo])->orderBy('A.apellidop ASC, A.apellidom ASC, A.nombres');
        }else{
            $query = Alumno::find();
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
            'fecha_nac' => $this->fecha_nac,
            'genero' => $this->genero,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id_grupo' => $this->id_grupo,
        ]);

        $query->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellidop', $this->apellidop])
            ->andFilterWhere(['like', 'apellidom', $this->apellidom])
            ->andFilterWhere(['like', 'matricula', $this->matricula])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'ciudad', $this->ciudad]);

        return $dataProvider;
    }
}
