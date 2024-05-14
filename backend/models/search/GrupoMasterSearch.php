<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GrupoMaster;

/**
 * GrupoMasterSearch represents the model behind the search form of `app\models\GrupoMaster`.
 */
class GrupoMasterSearch extends GrupoMaster
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_periodo', 'id_carrera', 'id_semestre', 'id_grupoLetra', 'id_tutor'], 'integer'],
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
    public function search($params, $showAll = false)   
    {
        //solo se puden crear grupos segun el perido que este activo, si es A los pares, si es B, los impares
        
        //En el controlaodr mandar el parametro ver inactivos, si se recibe ese parametro se podra filtrar los inactivos igual

        //solo debe haber un ciclo y perido activo - no dejar crear o actualizar si hay mas de uno de ellos activos, desabilitar campo si se puede

        //SELECT * FROM grupo_master GM INNER JOIN periodo_escolar P ON P.id = GM.id_periodo WHERE P.id_estatus = 1
        if ($showAll) {
            $query = GrupoMaster::find();
        }else{
            $query = GrupoMaster::find()->alias('GM')->innerJoin(['P'=>'periodo_escolar'],'P.id = GM.id_periodo')->where(['P.id_estatus'=> '1']);
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
            'id_periodo' => $this->id_periodo,
            'id_carrera' => $this->id_carrera,
            'id_semestre' => $this->id_semestre,
            'id_grupoLetra' => $this->id_grupoLetra,
            'id_tutor' => $this->id_tutor,
        ]);

        return $dataProvider;
    }
}
