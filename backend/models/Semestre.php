<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semestre".
 *
 * @property int $id
 * @property string $nombre
 * @property int $num_semestre
 */
class Semestre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'semestre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'num_semestre'], 'required'],
            [['num_semestre'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'num_semestre' => 'Num. de Semestre',
        ];
    }

    public function getNumSemestre(){
        //ORDEN
        return [
            '1'=> 'PRIMERO',
            '2'=> 'SEGUNDO',
            '3'=> 'TERCERO',
            '4'=> 'CUARTO',
            '5'=> 'QUINTO',
            '6'=> 'SEXTO',  
            '7'=> 'SEPTIMO',
            '8'=> 'OCTAVO',
            '9'=> 'NOVENO',
            '10'=> 'DECIMO',
            '11'=> 'ONCEAVO',
            '12'=> 'DOCEAVO',
        ];
    }
}
