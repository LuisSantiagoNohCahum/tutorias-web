<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\Query;
use yii\helpers\VarDumper;

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
            'id_periodo' => 'Periodo Escolar',
            'id_carrera' => 'Carrera',
            'id_semestre' => 'Semestre',
            'id_grupoLetra' => 'Grupo',
            'id_tutor' => 'Tutor Asignado',
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

    //CAMBIAR NOMBRE DE VARIABLE ESTATUS - ARRAY
    //MOSTRAR NOMBRE, APELLIDO EN TUTOR
    public static function getPeriodosList(){
        $arrayRecords = PeriodoEscolar::find()->where(['id_estatus'=>'1'])->all();
        return ArrayHelper::map($arrayRecords, 'id','nombre');
    }

    public static function getCarreraList(){
        $arrayRecords = Carreras::find()->all();
        return ArrayHelper::map($arrayRecords, 'id','nombre');
    }

    public static function getSemestreList(){
        $arrayRecords = Semestre::find()->all();
        return ArrayHelper::map($arrayRecords, 'id','nombre');
    }

    public static function getGrupoLetraList(){
        $arrayRecords = GrupoLetra::find()->all();
        return ArrayHelper::map($arrayRecords, 'id','letra_key');
    }

    //ponerle al tutor activo o inactivo igual . aparte a su cuenta para filtrar solo los tutores activos en la lista
    public static function getTutorList($id){
        //$arrayRecords = Tutor::find()->addSelect(["*", "CONCAT(nombre, ' ', apellido) AS full_name"])->all();
        
        //solo tutores no asignados - corregir para que muestre todos si ya se ha asignado y solo los que no en caso de estar asignando aun, esto por el tema de la actualizacion
        $param = null;
        //$arrayRecords = Tutor::find()->where([['NOT IN','id',GrupoMaster::find()->select('id_tutor')->all()]]);
        if ($id!=null) {
            $arrayRecords = Tutor::find()->where(['NOT IN','id',(new Query())->select(['IFNULL(id_tutor, 0)'])->from('grupo_master')->where(['!=','id_tutor',$id])])->all();
        }else{
            $arrayRecords = Tutor::find()->where(['NOT IN','id',(new Query())->select(['IFNULL(id_tutor, 0)'])->from('grupo_master')])->all();
        }
        //$arrayRecords = Tutor::find()->all();

        
        foreach ($arrayRecords as $tutor) $tutor->nombre = $tutor->nombre . ' ' . $tutor->apellido;
        return ArrayHelper::map($arrayRecords, 'id','nombre');
    }
}
