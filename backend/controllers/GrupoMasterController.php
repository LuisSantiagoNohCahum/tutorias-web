<?php

namespace backend\controllers;

use backend\models\Alumno;
use backend\models\search\AlumnoSearch;
use app\models\GrupoMaster;
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
