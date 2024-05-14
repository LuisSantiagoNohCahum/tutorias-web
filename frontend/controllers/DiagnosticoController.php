<?php

namespace frontend\controllers;

use app\models\Diagnostico;
use frontend\models\search\DiagnosticoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use app\models\GrupoMaster;
use app\models\Performance;

/**
 * DiagnosticoController implements the CRUD actions for Diagnostico model.
 */
class DiagnosticoController extends Controller
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
     * Displays a single Diagnostico model.
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
     * Creates a new Diagnostico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id_grupo, $submit = false)
    {
        $id_grupo = Yii::$app->session->get('id_grupo');

        $model = new Diagnostico();
        
        $model->id_alumno = (isset($_POST['selection'])) ? $_POST['selection'][0] : 0;

        if ($model->id_alumno != 0) {
            if ($this->verifyExistDiagnostic($model->id_alumno)) {
                Yii::$app->getSession()->setFlash('err', 'Este alumno ya ha sido agregado al diagnostico');
                return $this->redirect(['grupo-master/index', 'id' => $id_grupo]);
            }
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['grupo-master/index', 'id_grupo' => $id_grupo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'id_grupo'=>$id_grupo,
            'model' => $model,
        ]);
    }


    public function actionIndex(){

        $id_grupo = Yii::$app->session->get('id_grupo');

        $modelGrupo = GrupoMaster::find()->where(['id'=>$id_grupo])->one();

        $searchModelDiagnostico = new DiagnosticoSearch();
        $dataProviderDiagnostico = $searchModelDiagnostico->search($this->request->queryParams, $id_grupo);

        $modelPerformance = Performance::find()->where(['id_grupo'=>$id_grupo])->one();

        return $this->render('index', [
            'modelGrupo' => $modelGrupo,
            'modelPerformance' => $modelPerformance,
            'searchModelDiagnostico' => $searchModelDiagnostico,
            'dataProviderDiagnostico' => $dataProviderDiagnostico,
        ]);
    }

    /**
     * Updates an existing Diagnostico model.
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
     * Deletes an existing Diagnostico model.
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
     * Finds the Diagnostico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Diagnostico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Diagnostico::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function verifyExistDiagnostic($id_alumno){

        $res = Diagnostico::find()->where(['id_alumno' => $id_alumno])->one();

        if ($res != null) return true;

        return false;
    }

    public function actionExportPdf($id_grupo){

        $modelGrupo = GrupoMaster::find()->where(['id'=>$id_grupo])->one();

        $searchModelDiagnostico = new DiagnosticoSearch();
        $dataProviderDiagnostico = $searchModelDiagnostico->search($this->request->queryParams, $id_grupo);

        $modelPerformance = Performance::find()->where(['id_grupo'=>$id_grupo])->one();

        $pdf = Yii::$app->pdf;
        $content = $this->renderPartial('_reportv1', [
            'modelGrupo' => $modelGrupo,
            'modelPerformance' => $modelPerformance,
            'searchModelDiagnostico' => $searchModelDiagnostico,
            'dataProviderDiagnostico' => $dataProviderDiagnostico,
        ]);
        $pdf->content = $content;
        return $pdf->render();
    }
}
