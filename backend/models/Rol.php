<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rol".
 *
 * @property int $id
 * @property string|null $rol_nombre
 * @property int|null $rol_valor
 */
class Rol extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rol';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rol_valor'], 'integer'],
            [['rol_nombre'], 'required', 'message' => 'Falto capturar el nombre del Rol'],
            [['rol_nombre'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rol_nombre' => 'Nombre Rol',
            'rol_valor' => 'Valor rol',
        ];
    }

    public  function  getUsers()
    {
    return  $this->hasMany(User::className(),  ['rol_id'  =>  'id']);
    }
}
