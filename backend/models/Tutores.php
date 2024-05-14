<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "tutores".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $correo
 * @property string $telefono
 * @property string $fecha_nac
 * @property string $update_date
 * @property string $created_date
 * @property string $genero
 */
class Tutores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tutores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'correo', 'telefono', 'fecha_nac', 'genero'], 'required'],
            [['nombre', 'apellido', 'correo', 'fecha_nac', 'genero'], 'string', 'max' => 75],
            [['telefono'], 'string', 'max' => 20],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_date',
                'updatedAtAttribute' => 'update_date',
                'value' => new Expression('NOW()'),
            ],
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
            'apellido' => 'Apellido',
            'correo' => 'Correo',
            'telefono' => 'Telefono',
            'fecha_nac' => 'Fecha Nac',
            'update_date' => 'Update Date',
            'created_date' => 'Created Date',
            'genero' => 'Genero',
        ];
    }
}
