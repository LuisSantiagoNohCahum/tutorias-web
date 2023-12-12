<?php

namespace app\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "tutor".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $correo
 * @property string $telefono
 * @property int $genero
 * @property int $id_user
 *
 * @property GrupoMaster[] $grupoMasters
 * @property User $user
 */
class Tutor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tutor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'correo', 'telefono', 'genero', 'id_user'], 'required'],
            [['genero', 'id_user'], 'integer'],
            [['nombre', 'correo'], 'string', 'max' => 100],
            [['apellido'], 'string', 'max' => 45],
            [['telefono'], 'string', 'max' => 20],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombres',
            'apellido' => 'Apellidos',
            'correo' => 'Correo',
            'telefono' => 'Telefono',
            'genero' => 'Genero',
            'id_user' => 'Usuario',
        ];
    }

    /**
     * Gets query for [[GrupoMasters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoMasters()
    {
        return $this->hasMany(GrupoMaster::class, ['id_tutor' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }

    public function getGenero(){
        return [
            '0'=> "MASCULINO",
            '1'=> "FEMENINO",
        ];
    }
}
