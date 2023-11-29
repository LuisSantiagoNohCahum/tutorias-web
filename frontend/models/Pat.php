<?php

namespace app\models;

use Yii;

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
            'id_semestre' => 'Id Semestre',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'estatus' => 'Estatus',
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
}
