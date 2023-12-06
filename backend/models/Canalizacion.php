<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "canalizacion".
 *
 * @property int $id
 * @property int $estatus
 * @property string $asunto
 * @property string $cuerpo
 * @property int $id_alumno
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Alumno $alumno
 */
class Canalizacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'canalizacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estatus', 'asunto', 'cuerpo', 'id_alumno', 'created_at', 'updated_at'], 'required'],
            [['estatus', 'id_alumno'], 'integer'],
            [['asunto', 'cuerpo'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
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
            'estatus' => 'Estatus',
            'asunto' => 'Asunto',
            'cuerpo' => 'Cuerpo',
            'id_alumno' => 'Id Alumno',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
