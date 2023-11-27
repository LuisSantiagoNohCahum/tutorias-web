<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semana".
 *
 * @property int $id
 * @property int $num_semana
 * @property string $nombre
 * @property int $tipo_tutoria
 * @property string $tematica
 * @property string $objetivos
 * @property string $justificacion
 * @property string $estrategias_tutor
 * @property string $acciones
 * @property string|null $estrategias_tutorado
 * @property int $id_pat
 *
 * @property Pat $pat
 * @property SemanaReal[] $semanaReals
 */
class Semana extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'semana';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_semana', 'nombre', 'tipo_tutoria', 'tematica', 'objetivos', 'justificacion', 'estrategias_tutor', 'acciones', 'id_pat'], 'required'],
            [['num_semana', 'tipo_tutoria', 'id_pat'], 'integer'],
            [['tematica', 'objetivos', 'justificacion', 'estrategias_tutor', 'acciones', 'estrategias_tutorado'], 'string'],
            [['nombre'], 'string', 'max' => 100],
            [['id_pat'], 'exist', 'skipOnError' => true, 'targetClass' => Pat::class, 'targetAttribute' => ['id_pat' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num_semana' => 'Num Semana',
            'nombre' => 'Nombre',
            'tipo_tutoria' => 'Tipo Tutoria',
            'tematica' => 'Tematica',
            'objetivos' => 'Objetivos',
            'justificacion' => 'Justificacion',
            'estrategias_tutor' => 'Estrategias Tutor',
            'acciones' => 'Acciones',
            'estrategias_tutorado' => 'Estrategias Tutorado',
            'id_pat' => 'Id Pat',
        ];
    }

    /**
     * Gets query for [[Pat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPat()
    {
        return $this->hasOne(Pat::class, ['id' => 'id_pat']);
    }

    /**
     * Gets query for [[SemanaReals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSemanaReals()
    {
        return $this->hasMany(SemanaReal::class, ['id_semana' => 'id']);
    }

    public function getTipoTutoriaList(){
        return [
            '0'=> "GRUPAL",
            '1'=> "INDIVIDUAL",
        ];
    }
}
