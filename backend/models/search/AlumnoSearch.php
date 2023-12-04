<?php

namespace backend\models\search;

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
            [['id', 'nombres', 'apellidop', 'apellidom', 'matricula', 'correo', 'telefono', 'fecha_nac', 'ciudad', 'genero', 'created_at', 'updated_at', 'id_grupo'], 'integer'],
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
            'nombres' => $this->nombres,
            'apellidop' => $this->apellidop,
            'apellidom' => $this->apellidom,
            'matricula' => $this->matricula,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'fecha_nac' => $this->fecha_nac,
            'ciudad' => $this->ciudad,
            'genero' => $this->genero,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id_grupo' => $this->id_grupo,
        ]);

        return $dataProvider;
    }
}
