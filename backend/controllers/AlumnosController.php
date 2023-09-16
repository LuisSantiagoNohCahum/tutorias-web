<?php

namespace backend\controllers;

use app\models\Alumnos;
use backend\models\search\AlumnosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PhpOffice\PhpSpreadsheet\Shared\Date;

use Yii;


/**
 * AlumnosController implements the CRUD actions for Alumnos model.
 */
class AlumnosController extends Controller
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
     * Lists all Alumnos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AlumnosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alumnos model.
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
     * Creates a new Alumnos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Alumnos();

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

    public function actionImportDataFromExcel()
    {
        $modelImport = new \yii\base\DynamicModel([
            'fileImport' => 'File Import',
        ]);
        $modelImport->addRule(['fileImport'], 'required');
        $modelImport->addRule(['fileImport'], 'file', ['extensions' => 'ods,xls,xlsx'], ['maxSize' => 1024 * 1024]);

        if ($this->request->post()) {
            $modelImport->fileImport = \yii\web\UploadedFile::getInstance($modelImport, 'fileImport');
            if ($modelImport->fileImport && $modelImport->validate()) {
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
                $reader->setReadDataOnly(TRUE);
                $spreadsheet = $reader->load($modelImport->fileImport->tempName);
                $worksheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                $baseRow = 2;
                /* La celda A tiene el id, deberia ser B donde esta el nombre pero mientras se quedara asi, solo es para validar que exista algo en cada fila */
                while (!empty($worksheet[$baseRow]['A'])) {
                    $model = new Alumnos();
                    $model->nombres = (string) $worksheet[$baseRow]['B'];
                    $model->apellidop = (string) $worksheet[$baseRow]['C'];
                    $model->apellidom = (string) $worksheet[$baseRow]['D'];
                    $model->matricula = (string) $worksheet[$baseRow]['E'];
                    $model->curp = (string) $worksheet[$baseRow]['F'];
                    $model->fecha_nac = date('Y-m-d', Date::excelToTimestamp($worksheet[$baseRow]['G'])); //o simplemente en el exel manejar las fechas como string y no date
                    $model->telefono = (string) $worksheet[$baseRow]['H'];
                    $model->correo = (string) $worksheet[$baseRow]['I'];
                    $model->ciudad = (string) $worksheet[$baseRow]['J'];
                    /* $model->estado = (string) $worksheet[$baseRow]['J'];
                    $model->ciudad = (string) $worksheet[$baseRow]['K'];
                    $model->colonia = (string) $worksheet[$baseRow]['L'];
                    $model->codigop = (string) $worksheet[$baseRow]['M'];
                    $model->domicilio = (string) $worksheet[$baseRow]['N'];
                    $model->id_user = (int) $worksheet[$baseRow]['O']; */
                    $model->save();
                    $baseRow++;
                }
                Yii::$app->getSession()->setFlash('success', 'Se han insertado ' . ($baseRow - 2) . ' nuevos registros');
                /* If model save() hace el return - mandar una variable de error o suceful para pintar un mensaje en index, verificar si existe variable con index
                return $this->render('import',[
                    'modelImport' => $modelImport,
                    'worksheet'=>$worksheet 
                ]);
                redirect(['index'])
                */
            } else {
                Yii::$app->getSession()->setFlash('error', 'Error');
            }
        }
        /* setFlash 'se importaron los datos correctamente' */
        return $this->render('import', [
            'modelImport' => $modelImport,
        ]);
    }

    /**
     * Updates an existing Alumnos model.
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
     * Deletes an existing Alumnos model.
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
     * Finds the Alumnos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Alumnos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Alumnos::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
