<?php

namespace backend\controllers;

use app\models\Diagnostico;
use backend\models\search\DiagnosticoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\GrupoMaster;
use app\models\Performance;
use yii\helpers\ArrayHelper;
use kartik\mpdf\Pdf;
use Yii;

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
     * Lists all Diagnostico models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DiagnosticoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
        $model = new Diagnostico();
        
        $model->id_alumno = (isset($_POST['selection'])) ? $_POST['selection'][0] : 0;

        if ($model->id_alumno != 0) {
            if ($this->verifyExistDiagnostic($model->id_alumno)) {
                Yii::$app->getSession()->setFlash('err', 'Este alumno ya ha sido agregado al diagnostico');
                return $this->redirect(['grupo-master/view', 'id' => $id_grupo]);
            }
        }
        /* if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $model->refresh();
                Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    
                ];
            } else {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]); */

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['grupo-master/view', 'id' => $id_grupo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'id_grupo'=>$id_grupo,
            'model' => $model,
        ]);
    }


    public function actionAdminDiagnostico($id_grupo){

        $modelGrupo = GrupoMaster::find()->where(['id'=>$id_grupo])->one();

        $searchModelDiagnostico = new DiagnosticoSearch();
        $dataProviderDiagnostico = $searchModelDiagnostico->search($this->request->queryParams, $id_grupo);

        $modelPerformance = Performance::find()->where(['id_grupo'=>$id_grupo])->one();

        return $this->render('_admindiagnostico', [
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

    public function actionExportExcel(){
        $data = array(
            '0' => array('Name'=> 'Parvez', 'Status' =>'complete', 'Priority'=>'Low', 'Salary'=>'001'),
            '1' => array('Name'=> 'Alam', 'Status' =>'inprogress', 'Priority'=>'Low', 'Salary'=>'111'),
            '2' => array('Name'=> 'Sunnay', 'Status' =>'hold', 'Priority'=>'Low', 'Salary'=>'333'),
            '3' => array('Name'=> 'Amir', 'Status' =>'pending', 'Priority'=>'Low', 'Salary'=>'444'),
            '4' => array('Name'=> 'Amir1', 'Status' =>'pending', 'Priority'=>'Low', 'Salary'=>'777'),
            '5' => array('Name'=> 'Amir2', 'Status' =>'pending', 'Priority'=>'Low', 'Salary'=>'777')
        );

        $searchModel = new DiagnosticoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $data = ArrayHelper::toArray($dataProvider->getModels());
        
        $filename =  time() . ".xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");

        $this->ExportFile($data);
        
    }

    protected function ExportFile($records) {
        $heading = false;
        /* htmlspecialchars
        htmlspecialchars_decode
        htmlentities
        trim 
        nl
        nl-lang*/
        
        if(!empty($records))
            foreach($records as $row) {
                if(!$heading) {
                    echo strip_tags(iconv('utf-8', 'latin1',(implode("\t", array_keys($row))))) . "\n";
                    $heading = true;
                }
            echo strip_tags(iconv('utf-8', 'latin1',implode("\t", array_values($row)))) . "\n";
        }
            
        exit;
    }
}
