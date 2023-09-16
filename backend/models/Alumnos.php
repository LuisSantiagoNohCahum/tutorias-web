<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumnos".
 *
 * @property int $id
 * @property string $matricula
 * @property string $nombres
 * @property string $apellidop
 * @property string $apellidom
 * @property string $correo
 * @property string $telefono
 * @property string $curp
 * @property string $fecha_nac
 * @property string $ciudad
 */
class Alumnos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alumnos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matricula', 'nombres', 'apellidop', 'apellidom', 'correo', 'telefono', 'curp', 'fecha_nac', 'ciudad'], 'required'],
            [['fecha_nac'], 'safe'],
            [['matricula', 'telefono', 'curp'], 'string', 'max' => 20],
            [['nombres', 'apellidop', 'apellidom', 'ciudad'], 'string', 'max' => 50],
            [['correo'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'matricula' => 'Matricula',
            'nombres' => 'Nombres',
            'apellidop' => 'Apellidop',
            'apellidom' => 'Apellidom',
            'correo' => 'Correo',
            'telefono' => 'Telefono',
            'curp' => 'Curp',
            'fecha_nac' => 'Fecha Nac',
            'ciudad' => 'Ciudad',
        ];
    }
}
