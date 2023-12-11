<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "performance".
 *
 * @property int $id
 * @property int $id_grupo
 * @property int $eDesempeño
 * @property int $bDesempeño
 * @property int $arDesempeño
 *
 * @property GrupoMaster $grupo
 */
class Performance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'performance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_grupo', 'eDesempeño', 'bDesempeño', 'arDesempeño'], 'required'],
            [['id_grupo', 'eDesempeño', 'bDesempeño', 'arDesempeño'], 'integer'],
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
            'id_grupo' => 'Grupo',
            'eDesempeño' => 'Exelente Desempeño',
            'bDesempeño' => 'Buen Desempeño',
            'arDesempeño' => 'Alumnos en alto riesgo',
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
