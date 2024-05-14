<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carreras".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property GrupoMaster[] $grupoMasters
 */
class Carreras extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carreras';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 150],
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
        ];
    }

    /**
     * Gets query for [[GrupoMasters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoMasters()
    {
        return $this->hasMany(GrupoMaster::class, ['id_carrera' => 'id']);
    }
}
