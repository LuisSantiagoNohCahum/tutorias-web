<?php

namespace backend\controllers;

use app\models\Canalizacion;
use backend\models\search\CanalizacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\GrupoMaster;

/**
 * CanalizacionController implements the CRUD actions for Canalizacion model.
 */
class CanalizacionController extends Controller
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
     * Lists all Canalizacion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CanalizacionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Canalizacion model.
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
     * Creates a new Canalizacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id_grupo)
    {
        $model = new Canalizacion();

        $model->id_alumno = (isset($_POST['selection'])) ? $_POST['selection'][0] : 0;

        if ($this->request->isPost) {
            
            if ($model->load($this->request->post())) {
                
                $model->save();
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

    public function actionAdminCanalizacion($id_grupo){
        $modelGrupo = GrupoMaster::find()->where(['id'=>$id_grupo])->one();

        $searchModelCanalizacion = new CanalizacionSearch();
        $dataProviderCanalizacion = $searchModelCanalizacion->search($this->request->queryParams, $id_grupo);

        return $this->render('_admincanalizacion', [
            'modelGrupo' => $modelGrupo,
            'searchModelCanalizacion' => $searchModelCanalizacion,
            'dataProviderCanalizacion' => $dataProviderCanalizacion,
        ]);
    }
    /**
     * Updates an existing Canalizacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $id_grupo)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'id_grupo'=>$id_grupo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Canalizacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $id_grupo)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/canalizacion/admin-canalizacion', 'id_grupo'=>$id_grupo]);
    }

    /**
     * Finds the Canalizacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Canalizacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Canalizacion::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
