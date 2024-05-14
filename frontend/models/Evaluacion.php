<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evaluacion".
 *
 * @property int $id
 * @property int $calificacion
 * @property int $id_alumno
 * @property int $id_criterio
 *
 * @property Alumno $alumno
 * @property Criterios $criterio
 */
class Evaluacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calificacion', 'id_alumno', 'id_criterio'], 'required'],
            [['calificacion', 'id_alumno', 'id_criterio'], 'integer'],
            [['id_alumno'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::class, 'targetAttribute' => ['id_alumno' => 'id']],
            [['id_criterio'], 'exist', 'skipOnError' => true, 'targetClass' => Criterios::class, 'targetAttribute' => ['id_criterio' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'calificacion' => 'Calificacion',
            'id_alumno' => 'Id Alumno',
            'id_criterio' => 'Id Criterio',
        ];
    }

    /**
     * Gets query for [[Alumno]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::class, ['id' => 'id_alumno']);
    }

    /**
     * Gets query for [[Criterio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCriterio()
    {
        return $this->hasOne(Criterios::class, ['id' => 'id_criterio']);
    }
}
