<?php

namespace app\models;

use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

use Yii;

/**
 * This is the model class for table "periodo_escolar".
 *
 * @property int $id
 * @property string $nombre
 * @property int $id_estatus
 * @property string $letra_periodo
 * @property string $date_start
 * @property string $date_end
 * @property int $id_ciclo
 * @property string $created_at
 * @property string $updated_at
 *
 * @property CicloEscolar $ciclo
 * @property Estatus $estatus
 */
class PeriodoEscolar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'periodo_escolar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'id_estatus', 'letra_periodo', 'date_start', 'date_end', 'id_ciclo'], 'required'],
            [['id_estatus', 'id_ciclo'], 'integer'],
            [['date_start', 'date_end'], 'safe'],
            [['nombre'], 'string', 'max' => 50],
            [['letra_periodo'], 'string', 'max' => 2],
            [['id_ciclo'], 'exist', 'skipOnError' => true, 'targetClass' => CicloEscolar::class, 'targetAttribute' => ['id_ciclo' => 'id']],
            [['id_estatus'], 'exist', 'skipOnError' => true, 'targetClass' => Estatus::class, 'targetAttribute' => ['id_estatus' => 'id']],
        ];
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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'id_estatus' => 'Estatus',
            'letra_periodo' => 'Periodo',
            'date_start' => 'Inicio',
            'date_end' => 'Fin',
            'id_ciclo' => 'Id Ciclo',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Ciclo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCiclo()
    {
        return $this->hasOne(CicloEscolar::class, ['id' => 'id_ciclo']);
    }

    /**
     * Gets query for [[Estatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstatus()
    {
        return $this->hasOne(Estatus::class, ['id' => 'id_estatus']);
    }

    public static function getEstatusList(){
        $estatus = Estatus::find()->all();
        return ArrayHelper::map($estatus, 'id','nombre');
    }

    public static function getCharPeriodList(){
        return [
            'A'=> 'PERIODO A',
            'B'=> 'PERIODO B',
        ];
    }
}
