<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo_master".
 *
 * @property int $id
 * @property int $id_periodo
 * @property int $id_carrera
 * @property int $id_semestre
 * @property int $id_grupoLetra
 * @property int|null $id_tutor
 *
 * @property Alumno[] $alumnos
 * @property Carreras $carrera
 * @property GrupoLetra $grupoLetra
 * @property PeriodoEscolar $periodo
 * @property SemanaReal[] $semanaReals
 * @property Semestre $semestre
 * @property Tutor $tutor
 */
class GrupoMaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grupo_master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_periodo', 'id_carrera', 'id_semestre', 'id_grupoLetra'], 'required'],
            [['id_periodo', 'id_carrera', 'id_semestre', 'id_grupoLetra', 'id_tutor'], 'integer'],
            [['id_carrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carreras::class, 'targetAttribute' => ['id_carrera' => 'id']],
            [['id_grupoLetra'], 'exist', 'skipOnError' => true, 'targetClass' => GrupoLetra::class, 'targetAttribute' => ['id_grupoLetra' => 'id']],
            [['id_periodo'], 'exist', 'skipOnError' => true, 'targetClass' => PeriodoEscolar::class, 'targetAttribute' => ['id_periodo' => 'id']],
            [['id_semestre'], 'exist', 'skipOnError' => true, 'targetClass' => Semestre::class, 'targetAttribute' => ['id_semestre' => 'id']],
            [['id_tutor'], 'exist', 'skipOnError' => true, 'targetClass' => Tutor::class, 'targetAttribute' => ['id_tutor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_periodo' => 'Periodo',
            'id_carrera' => 'Carrera',
            'id_semestre' => 'Semestre',
            'id_grupoLetra' => 'Grupo',
            'id_tutor' => 'Tutor',
        ];
    }

    /**
     * Gets query for [[Alumnos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumno::class, ['id_grupo' => 'id']);
    }

    /**
     * Gets query for [[Carrera]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarrera()
    {
        return $this->hasOne(Carreras::class, ['id' => 'id_carrera']);
    }

    /**
     * Gets query for [[GrupoLetra]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoLetra()
    {
        return $this->hasOne(GrupoLetra::class, ['id' => 'id_grupoLetra']);
    }

    /**
     * Gets query for [[Periodo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodo()
    {
        return $this->hasOne(PeriodoEscolar::class, ['id' => 'id_periodo']);
    }

    /**
     * Gets query for [[SemanaReals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSemanaReals()
    {
        return $this->hasMany(SemanaReal::class, ['id_grupomaster' => 'id']);
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

    /**
     * Gets query for [[Tutor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTutor()
    {
        return $this->hasOne(Tutor::class, ['id' => 'id_tutor']);
    }
}
