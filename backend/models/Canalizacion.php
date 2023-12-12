<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;

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

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estatus', 'asunto', 'cuerpo', 'id_alumno'], 'required'],
            [['estatus', 'id_alumno'], 'integer'],
            [['asunto', 'cuerpo'], 'string'],
            //[['created_at', 'updated_at'], 'safe'],
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
            'estatus' => 'Estado',
            'asunto' => 'Asunto',
            'cuerpo' => 'Cuerpo',
            'id_alumno' => 'Id Alumno',
            'created_at' => 'Fecha de creación',
            'updated_at' => 'Fecha de actualización',
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

    public function getStatusCanalizados(){
        return [
            '0'=>'NO CANALIZADO',
            '1'=>'CANALIZADO'
        ];
    }
}
