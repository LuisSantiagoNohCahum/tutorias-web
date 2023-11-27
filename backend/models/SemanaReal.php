<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semana_real".
 *
 * @property int $id
 * @property int $id_grupomaster
 * @property int $id_semana
 * @property int $semana_atendida
 * @property int $alumnos_atendidos
 * @property int $alumnos_faltantes
 * @property int $total_alumnos
 * @property int $atendidos_hombres
 * @property int $atendidos_mujeres
 * @property int $total_gatendidos
 * @property string $evidencias
 * @property string $observaciones
 * @property string|null $alumnos
 *
 * @property GrupoMaster $grupomaster
 * @property Semana $semana
 */
class SemanaReal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'semana_real';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_grupomaster', 'id_semana', 'semana_atendida', 'alumnos_atendidos', 'alumnos_faltantes', 'total_alumnos', 'atendidos_hombres', 'atendidos_mujeres', 'total_gatendidos', 'evidencias', 'observaciones'], 'required'],
            [['id_grupomaster', 'id_semana', 'semana_atendida', 'alumnos_atendidos', 'alumnos_faltantes', 'total_alumnos', 'atendidos_hombres', 'atendidos_mujeres', 'total_gatendidos'], 'integer'],
            [['evidencias', 'observaciones', 'alumnos'], 'string'],
            [['id_grupomaster'], 'exist', 'skipOnError' => true, 'targetClass' => GrupoMaster::class, 'targetAttribute' => ['id_grupomaster' => 'id']],
            [['id_semana'], 'exist', 'skipOnError' => true, 'targetClass' => Semana::class, 'targetAttribute' => ['id_semana' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_grupomaster' => 'Id Grupomaster',
            'id_semana' => 'Id Semana',
            'semana_atendida' => 'Semana Atendida',
            'alumnos_atendidos' => 'Alumnos Atendidos',
            'alumnos_faltantes' => 'Alumnos Faltantes',
            'total_alumnos' => 'Total Alumnos',
            'atendidos_hombres' => 'Atendidos Hombres',
            'atendidos_mujeres' => 'Atendidos Mujeres',
            'total_gatendidos' => 'Total Gatendidos',
            'evidencias' => 'Evidencias',
            'observaciones' => 'Observaciones',
            'alumnos' => 'Alumnos',
        ];
    }

    /**
     * Gets query for [[Grupomaster]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupomaster()
    {
        return $this->hasOne(GrupoMaster::class, ['id' => 'id_grupomaster']);
    }

    /**
     * Gets query for [[Semana]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSemana()
    {
        return $this->hasOne(Semana::class, ['id' => 'id_semana']);
    }

    public function getSemanaAtendidaList(){
        return [
            '0'=> "NO",
            '1'=> "SI",
        ];
    }
}
