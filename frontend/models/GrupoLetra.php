<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo_letra".
 *
 * @property int $id
 * @property string $letra_key
 *
 * @property GrupoMaster[] $grupoMasters
 */
class GrupoLetra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grupo_letra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['letra_key'], 'required'],
            [['letra_key'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'letra_key' => 'Letra Key',
        ];
    }

    /**
     * Gets query for [[GrupoMasters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoMasters()
    {
        return $this->hasMany(GrupoMaster::class, ['id_grupoLetra' => 'id']);
    }
}
