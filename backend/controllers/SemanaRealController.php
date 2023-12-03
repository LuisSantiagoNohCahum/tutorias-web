<?php

namespace backend\controllers;

use app\models\SemanaReal;
use backend\models\search\SemanaRealSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SemanaRealController implements the CRUD actions for SemanaReal model.
 */
class SemanaRealController extends Controller
{
    public const UPLOAD_FOLDER = '../../uploads/';
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
     * Lists all SemanaReal models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SemanaRealSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SemanaReal model.
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

    public function actionDeleteImage(){
        //\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        //$pathsUpdate = str_replace($imgPath, '', $paths); 
        
        return json_encode(true);
    }
    /**
     * Creates a new SemanaReal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id_semana, $id_grupo, $es_grupal)
    {
        $model = new SemanaReal();

        $model->id_semana = $id_semana;

        $model->id_grupomaster = $id_grupo;

        /* Inicializar con empty */
        //$model->evidencias = '';

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $EvidenciasFullPath = '';

                $evidencias = UploadedFile::getInstances($model, 'evidencias');
                foreach ($evidencias as $img) {
                    $imgName = 'Evidencia_'.$img->baseName.'_'.time()  .'.'.$img->extension;
                    $imagePathSave = $this::UPLOAD_FOLDER . $imgName;
                    if($img->saveAs($imagePathSave)) $EvidenciasFullPath .= $imagePathSave.';';
                }

                $EvidenciasFullPath = ltrim(rtrim($EvidenciasFullPath, ';'), ';');
                $model->evidencias = $EvidenciasFullPath;

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'es_grupal' => $es_grupal,
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SemanaReal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $es_grupal)
    {
        $model = $this->findModel($id);

        /* Verificar imagenes antiguas antes de asignar valores de post y reformar cadena de imagenes */
        /* Por cada imagen de aca verificar si existe con str_contains en la nueva ruta */
        $strOldImages = $model->evidencias;

        $oldImages = explode(';', $model->evidencias);

        if ($this->request->isPost && $model->load($this->request->post()) ) {
            $strOldImages = (isset($_POST['oldPathsImages'])) ? $_POST['oldPathsImages']:'';
            $evidencias = UploadedFile::getInstances($model, 'evidencias');

            if (count($evidencias)>0) {
                foreach ($evidencias as $img) {
                    $imgName = 'Evidencia_'.$img->baseName.'_'.time()  .'.'.$img->extension;
                    $imagePathSave = $this::UPLOAD_FOLDER . $imgName;
                    if($img->saveAs($imagePathSave)) $strOldImages .= ';' . $imagePathSave;
                }
                $EvidenciasFullPath = ltrim(rtrim($strOldImages, ';'), ';');
                $model->evidencias = $EvidenciasFullPath;
                
                //colocar issets
                //if ($_POST['oldPathsImages'] != $strOldImages) {
                    
                //}

            }else{
                $model->evidencias = $strOldImages;
            }

            /* Unlink anyware img */
            if (count($oldImages)>0) {
                foreach ($oldImages as $uImg) {
                    if (!str_contains($model->evidencias, $uImg)) {
                        unlink($uImg);
                    }
                }
            }
            
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
        }

        $model->evidencias = $strOldImages;

        return $this->render('update', [
            'es_grupal'=>$es_grupal,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SemanaReal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
    
        $oldModel = $this->findModel($id);

        if (!empty($oldModel->evidencias)) {
            $imagesUnlink = explode(';', $oldModel->evidencias);
            foreach ($imagesUnlink as $uImg) unlink($uImg);
        }
        
        $oldModel->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SemanaReal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SemanaReal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SemanaReal::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
