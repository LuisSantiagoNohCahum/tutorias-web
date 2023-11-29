<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semestre".
 *
 * @property int $id
 * @property string $nombre
 * @property int $num_semestre
 *
 * @property GrupoMaster[] $grupoMasters
 * @property Pat[] $pats
 */
class Semestre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'semestre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'num_semestre'], 'required'],
            [['num_semestre'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
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
            'num_semestre' => 'Num Semestre',
        ];
    }

    /**
     * Gets query for [[GrupoMasters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoMasters()
    {
        return $this->hasMany(GrupoMaster::class, ['id_semestre' => 'id']);
    }

    /**
     * Gets query for [[Pats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPats()
    {
        return $this->hasMany(Pat::class, ['id_semestre' => 'id']);
    }
}
