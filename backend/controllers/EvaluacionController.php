<?php

namespace backend\controllers;

use app\models\Evaluacion;
use backend\models\search\EvaluacionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\GrupoMaster;
use backend\models\search\CriteriosSearch;
use backend\models\search\AlumnoSearch;
/**
 * EvaluacionController implements the CRUD actions for Evaluacion model.
 */
class EvaluacionController extends Controller
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
     * Lists all Evaluacion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EvaluacionsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Evaluacion model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Evaluacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Evaluacion();

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

    public function actionAdminEvaluacion($id_grupo)
    {
        $modelGrupo = GrupoMaster::find()->where(['id'=>$id_grupo])->one();

        $searchModelCriterios = new CriteriosSearch();
        $dataProviderCriterios = $searchModelCriterios->search($this->request->queryParams);

        $searchModelAlumnos = new AlumnoSearch();
        $dataProviderAlumnos = $searchModelAlumnos->search($this->request->queryParams, $id_grupo);

        return $this->render('_adminevaluacion', [
            'modelGrupo' => $modelGrupo,
            'dataProviderCriterios' => $dataProviderCriterios,
            'dataProviderAlumnos' => $dataProviderAlumnos,
        ]);
    }

    public function actionBulkEvaluar($id_grupo)
    {
        if ($this->request->isPost) {
            $totalCriterios = $_POST["totalCriterios"];
            $totalTutorados = $_POST["totalTutorados"];

            for($i = 0; $i < $totalTutorados; $i++ ){
                for($j = 0; $j< $totalCriterios; $j++){
                    $calificacion = $_POST['al'.$i.'cal'.$j];
                    $idTutorado = $_POST['tutorado'.$i];
                    $idCriterio = $_POST['criterio'.$j];
                    $model = new Evaluacion();
                    $model->calificacion = $calificacion;
                    $model->id_alumno = $idTutorado;
                    $model->id_criterio = $idCriterio;
                    $id_calificacion = (isset($_POST['Cal'.$i.'Id'.$j])) ? intval($_POST['Cal'.$i.'Id'.$j]) : 0;
                    if ($id_calificacion != 0) {
                        $model = $this->findModel($id_calificacion);
                        $model->calificacion = intval($calificacion);
                        $model->save();
                    }else{
                        $model->save();
                    }
                }
            }
        }
        return $this->redirect(['admin-evaluacion', 
            'id_grupo' => $id_grupo
        ]);
    }

    /**
     * Updates an existing Evaluacion model.
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
     * Deletes an existing Evaluacion model.
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
     * Finds the Evaluacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Evaluacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Evaluacion::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
