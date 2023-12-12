<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "criterios".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property Evaluacion[] $evaluacions
 */
class Criterios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'criterios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string'],
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
     * Gets query for [[Evaluacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacions()
    {
        return $this->hasMany(Evaluacion::class, ['id_criterio' => 'id']);
    }
}
