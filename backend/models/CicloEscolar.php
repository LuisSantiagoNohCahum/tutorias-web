<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;    

use Yii;

/**
 * This is the model class for table "ciclo_escolar".
 *
 * @property int $id
 * @property string $nombre
 * @property string $created_at
 * @property string $updated_at
 * @property string $fecha_inicial
 * @property string $fecha_final
 * @property int $id_estatus
 *
 * @property Estatus $estatus
 * @property PeriodoEscolar[] $periodoEscolars
 */
class CicloEscolar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ciclo_escolar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'fecha_inicial', 'fecha_final', 'id_estatus'], 'required'],
            [['fecha_inicial', 'fecha_final'], 'safe'],
            [['id_estatus'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
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
            'created_at' => 'Creado',
            'updated_at' => 'Ultima Actualización',
            'fecha_inicial' => 'Fecha Inicio',
            'fecha_final' => 'Fecha Final',
            'id_estatus' => 'Estatus',
        ];
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

    /**
     * Gets query for [[PeriodoEscolars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodoEscolars()
    {
        return $this->hasMany(PeriodoEscolar::class, ['id_ciclo' => 'id']);
    }

    public static function getEstatusList(){
        $estatus = Estatus::find()->all();
        return ArrayHelper::map($estatus, 'id','nombre');
    }
}
