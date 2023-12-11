<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use Yii\db\Query;
/**
 * This is the model class for table "pat".
 *
 * @property int $id
 * @property int $id_semestre
 * @property string $nombre
 * @property string|null $descripcion
 * @property int $estatus
 *
 * @property Semana[] $semanas
 * @property Semestre $semestre
 */
class Pat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_semestre', 'nombre', 'estatus'], 'required'],
            [['id_semestre', 'estatus'], 'integer'],
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 100],
            [['id_semestre'], 'exist', 'skipOnError' => true, 'targetClass' => Semestre::class, 'targetAttribute' => ['id_semestre' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_semestre' => 'Semestre',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'estatus' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Semanas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSemanas()
    {
        return $this->hasMany(Semana::class, ['id_pat' => 'id']);
    }

    /**
     * Gets query for [[Semestre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSemestre()
    {
        return $this->hasOne(Semestre::class, ['id' => 'id_semestre']);
    }

    public static function getSemestreList(){
        $arrayRecords = Semestre::find()->all();
        return ArrayHelper::map($arrayRecords, 'id','nombre');
    }

    public function getEstatusList(){
        return [
            '0'=> "INACTIVO",
            '1'=> "ACTIVO",
        ];
    }

    public function getReportParcial($id_pat, $id_grupo, $rangeSemanas = [0, 1]){
        $report = (new Query())                 
        ->select([
            'IFNULL(SUM(CASE WHEN S.tipo_tutoria = 0 AND SR.semana_atendida = 1 THEN 1 ELSE 0 END), 0) as TGrupal',
            'IFNULL(SUM(CASE WHEN S.tipo_tutoria = 1 AND SR.semana_atendida = 1 THEN 1 ELSE 0 END), 0) as TIndividual',
            'IFNULL(SUM(CASE WHEN SR.semana_atendida = 0 THEN 1 ELSE 0 END), 0) as TNAtendida',
            'IFNULL(SUM(SR.alumnos_atendidos), 0) as AAtendidos',
            'IFNULL(SUM(SR.alumnos_faltantes), 0) as AFaltantes',
            'IFNULL(SUM(SR.atendidos_hombres), 0) as AHombress',
            'IFNULL(SUM(SR.atendidos_mujeres), 0) as AMujeres',
        ])
        ->from('semana S')
        ->innerJoin('semana_real SR', 'S.id = SR.id_semana')
        ->where([
            'and',
            ['between', 'S.num_semana', $rangeSemanas[0], $rangeSemanas[1]],
            ['S.id_pat' => $this->id],
            ['SR.id_grupomaster' => $id_grupo],
        ])
        ->one();

        return $report;
    }

    /* 
    query para traer resumen parcial

    (SELECT
        #Total Horas Impartidas Tutoria grupal e individual
        IFNULL(SUM(CASE WHEN S.tipo_tutoria = 0 AND SR.semana_atendida = 1 THEN 1 ELSE 0 END), 0) as TGrupal,
        IFNULL(SUM(CASE WHEN S.tipo_tutoria = 1 AND SR.semana_atendida = 1 THEN 1 ELSE 0 END), 0) as TIndividual,
        #Total horas no impartidas
        IFNULL(SUM(CASE WHEN SR.semana_atendida = 0 THEN 1 ELSE 0 END), 0) as TNAtendida,
        IFNULL(SUM(SR.alumnos_atendidos), 0) as AAtendidos,
        IFNULL(SUM(SR.alumnos_faltantes), 0) as AFaltantes,
        IFNULL(SUM(SR.atendidos_hombres), 0) as AHombres,
        IFNULL(SUM(SR.atendidos_mujeres), 0) as AMujeres
    FROM semana S
    INNER JOIN semana_real SR
        ON S.id = SR.id_semana
    WHERE
        (S.num_semana BETWEEN 13 AND 17) AND
        S.id_pat = 1 AND
        SR.id_grupomaster = 1)
     */
}
