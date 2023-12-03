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
            'apellidop' => 'Apellidop',
            'apellidom' => 'Apellidom',
            'matricula' => 'Matricula',
            'correo' => 'Correo',
            'telefono' => 'Telefono',
            'fecha_nac' => 'Fecha Nac',
            'ciudad' => 'Ciudad',
            'genero' => 'Genero',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'id_grupo' => 'Id Grupo',
        ];
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