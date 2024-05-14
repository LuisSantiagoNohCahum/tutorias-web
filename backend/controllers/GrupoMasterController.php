<?php

namespace backend\controllers;


use backend\models\search\AlumnoSearch;
use app\models\GrupoMaster;
use app\models\PeriodoEscolar;
use app\models\Semestre;
use app\models\Alumno;
use backend\models\search\GrupoMasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GrupoMasterController implements the CRUD actions for GrupoMaster model.
 */
class GrupoMasterController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all GrupoMaster models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GrupoMasterSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GrupoMaster model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModelAlumnos = new AlumnoSearch();
        $dataProviderAlumnos = $searchModelAlumnos->search($this->request->queryParams, $id);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModelAlumnos' => $searchModelAlumnos,
            'dataProviderAlumnos' => $dataProviderAlumnos,
        ]);
    }

    /**
     * Creates a new GrupoMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new GrupoMaster();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    //crear una vista de filtros
    //porv defecto solo cargar los filtros - al darle click al bopton de buscar nos debe buscar los grupos activos y con tutores

    //ahi añadimos lo botones de ver pat, diagnostico y liberacion

    //mandar los paramteros o inicializarlos en null, si es null returnar darta provider en null y no pintar nada , solo mensaje de que no hay grupos

    //añadir boton de cargar alumnos

    //tambien si abajo de detalles muestro la listab de alumnos cargados

    //añadir ne el grid un boton para añadir alumnos a grupo o eso lo hacemos en el view igual con un boton, y solo si hay alumnos y tutor ues mostramos los botones de pot

    //añadir los botones de control de los alumnos en el grid igual - modificar o crear nuevas acciones de eleiminar y actualizar
    

    public function actionMigrarGrupo($id_grupo){
        $transaction = GrupoMaster::getDb()->beginTransaction();
        try {
            
            $modelGrupo = $this->findModel($id_grupo);
            
            $pAnio = intval(substr($modelGrupo->periodo->nombre, 0, 4));
            $pLetra = substr($modelGrupo->periodo->nombre, -1, 1);

            if ($pLetra == 'A') {
                $pLetra = 'B';
            }else{
                $pAnio += 1;
                $pLetra = 'A';
            }
            $pFullname = $pAnio . $pLetra;

            /* Opcional: Validar que este activo */
            $modelPeriodo = PeriodoEscolar::find()->where(['nombre'=>$pFullname])->one();

            if($modelPeriodo != null){

                $numSemestre = $modelGrupo->semestre->num_semestre + 1;
                $modelSemestre = Semestre::find()->where(['num_semestre'=>$numSemestre])->one();
                
                $modelNewGrupo = GrupoMaster::find()->where(['id_carrera'=>$modelGrupo->id_carrera,'id_grupoLetra'=>$modelGrupo->id_grupoLetra,'id_periodo'=>$modelPeriodo->id,'id_semestre'=>$modelSemestre->id,])->one();
                
                if ($modelNewGrupo == null) {
                    $modelNewGrupo = new GrupoMaster();
                    $modelNewGrupo->id_carrera = $modelGrupo->id_carrera;
                    $modelNewGrupo->id_grupoLetra = $modelGrupo->id_grupoLetra;
                    $modelNewGrupo->id_periodo = $modelPeriodo->id;
                    $modelNewGrupo->id_semestre = $modelSemestre->id;
                    $modelNewGrupo->id_tutor = null;

                    /* Verificar si dio true al guardar */
                    $modelNewGrupo->save();
                }
                
                $idNewGrupo = $modelNewGrupo->id;

                /* OBTENER ALUMNOS, ACTUALIZAR ID_GRUPO Y REINSERTAR [ISNEWRECORD]*/
                $searchModelAlumnos = new AlumnoSearch();
                $dataProviderAlumnos = $searchModelAlumnos->search($this->request->queryParams, $id_grupo);
                /* O usar array de alumno que tiene el modelo de grupo */
                $dataAlumnos = $dataProviderAlumnos->getModels();

                /* Verificar si el nuevo grupo tiene alumnos, si es asi eliminarlos y volver a importar o simplemente no hacer nada*/
                if (!empty($dataAlumnos) and empty($modelNewGrupo->alumnos)) {
                    foreach ($dataAlumnos as $alumno) {

                        $modelNewAlumno = new Alumno();
                        $modelNewAlumno->nombres = $alumno->nombres;
                        $modelNewAlumno->apellidop = $alumno->apellidop;
                        $modelNewAlumno->apellidom = $alumno->apellidom;
                        $modelNewAlumno->matricula = $alumno->matricula;
                        $modelNewAlumno->correo = $alumno->correo;
                        $modelNewAlumno->telefono = $alumno->telefono;
                        $modelNewAlumno->fecha_nac = $alumno->fecha_nac;
                        $modelNewAlumno->ciudad = $alumno->ciudad;
                        $modelNewAlumno->genero = $alumno->genero;
                        $modelNewAlumno->id_grupo = $idNewGrupo;

                        $modelNewAlumno->save();
                        
                        
                    }
                }
                

                $modelGrupo->id_tutor = null;
                $modelGrupo->save();
                
            }

            $transaction->commit();

            if($modelPeriodo != null){
                return $this->redirect(['view', 'id'=>$modelNewGrupo->id]);
                /* Al finalizar redirigir al nuevo grupo */
            }else{
                return $this->redirect(['view', 'id'=>$modelGrupo->id]);
            }
            
        } catch(\Exception $e) {
            $transaction->rollBack();
            throw $e->getMessage();
        } catch(\Throwable $e) {
            $transaction->rollBack();
            throw $e->getMessage();
        }
        /* Finally */
    }
    /**
     * Updates an existing GrupoMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GrupoMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GrupoMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return GrupoMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GrupoMaster::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
