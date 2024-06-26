<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Canalizacion;

/**
 * CanalizacionSearch represents the model behind the search form of `app\models\Canalizacion`.
 */
class CanalizacionSearch extends Canalizacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'estatus', 'id_alumno'], 'integer'],
            [['asunto', 'cuerpo', 'created_at', 'updated_at'], 'safe'],
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
            $query = Canalizacion::find()->alias('C')->innerJoin('alumno A', 'C.id_alumno = A.id')->where(['A.id_grupo'=>$id_grupo])->orderBy('A.apellidop ASC, A.apellidom ASC, A.nombres');
        }else{
            $query = Canalizacion::find();
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
            'estatus' => $this->estatus,
            'id_alumno' => $this->id_alumno,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'asunto', $this->asunto])
            ->andFilterWhere(['like', 'cuerpo', $this->cuerpo]);

        return $dataProvider;
    }
}
