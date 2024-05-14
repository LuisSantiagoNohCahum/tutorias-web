<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumno".
 *
 * @property int $id
 * @property string $nombres
 * @property string $apellidop
 * @property string $apellidom
 * @property string $matricula
 * @property string $correo
 * @property string $telefono
 * @property string $fecha_nac
 * @property string $ciudad
 * @property int $genero
 * @property string $created_at
 * @property string $updated_at
 * @property int $id_grupo
 *
 * @property Canalizacion[] $canalizacions
 * @property Diagnostico[] $diagnosticos
 * @property Evaluacion[] $evaluacions
 * @property GrupoMaster $grupo
 */
class Alumno extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alumno';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombres', 'apellidop', 'apellidom', 'matricula', 'correo', 'telefono', 'fecha_nac', 'ciudad', 'genero', 'created_at', 'updated_at', 'id_grupo'], 'required'],
            [['fecha_nac', 'created_at', 'updated_at'], 'safe'],
            [['genero', 'id_grupo'], 'integer'],
            [['nombres'], 'string', 'max' => 100],
            [['apellidop', 'apellidom', 'matricula', 'correo', 'ciudad'], 'string', 'max' => 50],
            [['telefono'], 'string', 'max' => 20],
            [['id_grupo'], 'exist', 'skipOnError' => true, 'targetClass' => GrupoMaster::class, 'targetAttribute' => ['id_grupo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombres' => 'Nombres',
            'apellidop' => 'Apellido paterno',
            'apellidom' => 'Apellido materno',
            'matricula' => 'Matricula',
            'correo' => 'Correo',
            'telefono' => 'Telefono',
            'fecha_nac' => 'Fecha de nacimiento',
            'ciudad' => 'Ciudad',
            'genero' => 'Genero',
            'created_at' => 'Fecha de creación',
            'updated_at' => 'Fecha de actualización',
            'id_grupo' => 'Grupo',
        ];
    }

    /**
     * Gets query for [[Canalizacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCanalizacions()
    {
        return $this->hasMany(Canalizacion::class, ['id_alumno' => 'id']);
    }

    /**
     * Gets query for [[Diagnosticos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnosticos()
    {
        return $this->hasMany(Diagnostico::class, ['id_alumno' => 'id']);
    }

    /**
     * Gets query for [[Evaluacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacions()
    {
        return $this->hasMany(Evaluacion::class, ['id_alumno' => 'id']);
    }

    /**
     * Gets query for [[Grupo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupo()
    {
        return $this->hasOne(GrupoMaster::class, ['id' => 'id_grupo']);
    }
}
