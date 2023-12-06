<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diagnostico".
 *
 * @property int $id
 * @property int $id_alumno
 * @property int $motivo
 * @property string $asignaturas
 * @property string $otro
 * @property string $especifique
 *
 * @property Alumno $alumno
 */
class Diagnostico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diagnostico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alumno', 'motivo', 'asignaturas', 'otro', 'especifique'], 'required'],
            [['id_alumno', 'motivo'], 'integer'],
            [['asignaturas', 'otro', 'especifique'], 'string'],
            [['id_alumno'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::class, 'targetAttribute' => ['id_alumno' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_alumno' => 'Id Alumno',
            'motivo' => 'Motivo',
            'asignaturas' => 'Asignaturas',
            'otro' => 'Otro',
            'especifique' => 'Especifique',
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
}
