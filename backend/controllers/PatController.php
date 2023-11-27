<?php

namespace backend\controllers;

use app\models\Pat;
use backend\models\search\SemanaSearch;
use backend\models\search\PatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\GrupoMaster;
use Yii;

/**
 * PatController implements the CRUD actions for Pat model.
 */
class PatController extends Controller
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
     * Lists all Pat models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PatSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pat model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        /* Buscar semanas, devolver dataprovider de semanas */
        $searchModelSemanas = new SemanaSearch();
        $dataProviderSemanas = $searchModelSemanas->search($this->request->queryParams, $id);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModelSemanas' => $searchModelSemanas,
            'dataProviderSemanas' => $dataProviderSemanas,

        ]);
    }

    /**
     * Creates a new Pat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pat();


        /* Como cuando se llama esta accion no esta haciendo post ni nada pues no entra al if y se va al render */
        /* Cuando se manda un post desde el form carga lo mismo pero como ahora si mando post si carga el redirect */

        if ($this->request->isPost) {
            /* Si se envia algo del form */
            /* Yii::$app->request() */
            $id_semestre = (isset($_POST['Pat']['id_semestre'])) ? intval($_POST['Pat']['id_semestre']) : 0;
            $estatus = (isset($_POST['Pat']['estatus'])) ? intval($_POST['Pat']['estatus']) : 0;

            if ($id_semestre != 0 && $estatus != 0) {
                if ($estatus != 0) {
                    if ($this->ExistActivePat($id_semestre)) {
                        Yii::$app->getSession()->setFlash('err', 'Ya existe un PAT con estatus ACTIVO en el Semestre con ID ' . $id_semestre);
                        return $this->redirect(['index']);
                    }
                }
            }

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


    public function actionAdminPat($id_grupo){
        /* Modelo con los datos del grupo actual */
        $modelGrupo = GrupoMaster::find()->where(['id'=>$id_grupo])->one();

        /* Verificar que modelo pat no sea null - para buscar semanas con su id*/
        /* Solo filtrar el Pat activo que sea de ese semestre - validar en form si es null */
        $modelPat = Pat::find()->where(['id_semestre' => $modelGrupo->semestre->id, 'estatus'=> 1])->one();

        /* Buscar semanas, devolver dataprovider de semanas */
        $searchModelSemanas = new SemanaSearch();
        $dataProviderSemanas = $searchModelSemanas->search($this->request->queryParams, $modelPat->id);

        return $this->render('_adminpat', [
            'modelGrupo' => $modelGrupo,
            'modelPat' => $modelPat,
            'searchModelSemanas' => $searchModelSemanas,
            'dataProviderSemanas' => $dataProviderSemanas
        ]);
    }
    /**
     * Updates an existing Pat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $id_semestre = (isset($_POST['Pat']['id_semestre'])) ? intval($_POST['Pat']['id_semestre']) : 0;
        $estatus = (isset($_POST['Pat']['estatus'])) ? intval($_POST['Pat']['estatus']) : 0;

        /* VALIDAR QUE NO SE ACTULIZE A ESTATUS ACTIVO SI YA EXISTE UNO PREVIAMENTE EN ACTIVO EN EL MISMO SEMESTRE */
        if ($id_semestre != 0 && $estatus != 0) {
            if ($estatus != 0) {
                if ($this->ExistActivePat($id_semestre)) {
                    Yii::$app->getSession()->setFlash('err', 'Ya existe un PAT con estatus ACTIVO en el Semestre con ID ' . $id_semestre);
                    return $this->redirect(['index']);
                }
            }
        }
            
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pat model.
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
     * Finds the Pat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Pat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pat::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    /* Mover a record helpers las validaciones en bd */

    /* Verificar si existe al menos un pat en ese semestre que este activo */

    public function ExistActivePat($id_semestre){

        $model = Pat::find()->where(['id_semestre'=>$id_semestre, 'estatus' => 1])->one();

        if ($model != null) return true;

        return false;
    }
}
