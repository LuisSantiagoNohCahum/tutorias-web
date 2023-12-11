<?php

namespace backend\controllers;

use app\models\Semana;
use app\models\SemanaReal;
use backend\models\search\SemanaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SemanaController implements the CRUD actions for Semana model.
 */
class SemanaController extends Controller
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
     * Lists all Semana models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SemanaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Semana model.
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

    public function actionViewAddSemana($id, $id_grupo)
    {
        $model = $this->findModel($id);

        $modelSemanaReal = SemanaReal::find()->where(['id_semana' => $model->id, 'id_grupomaster' => $id_grupo])->one();

        return $this->render('_viewAddSemana', [
            'model' => $model,
            'modelSemanaReal' => $modelSemanaReal
        ]);
    }

    /**
     * Creates a new Semana model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id_pat)
    {
        $model = new Semana();

        $model->id_pat = $id_pat;

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

    public function actionSemanaDetail() {
        if (isset($_POST['expandRowKey'])) {
            $model = Semana::findOne($_POST['expandRowKey']);
            $modelSemanaReal = SemanaReal::findOne($model->id);
            return $this->renderPartial('_details', [
                'model'=>$model,
                'modelSemanaReal'=>$modelSemanaReal
            ]);

        } else {
            return '<div class="alert alert-danger">No se encontro la semana que desea visualizar</div>';
        }
    }

    public function actionDetailAddSemanaReal($id_grupo) {
        if (isset($_POST['expandRowKey'])) {
            $model = Semana::findOne($_POST['expandRowKey']);
            $modelSemanaReal = SemanaReal::findOne(['id_semana'=>$model->id, 'id_grupomaster'=>$id_grupo]);
            return $this->renderPartial('_detailsAddSemanaReal', [
                'model'=>$model,
                'id_grupo'=> $id_grupo,
                'modelSemanaReal'=>$modelSemanaReal
            ]);

        } else {
            return '<div class="alert alert-danger">No se encontro la semana que desea visualizar</div>';
        }
    }

    /**
     * Updates an existing Semana model.
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
     * Deletes an existing Semana model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        
        $id_pat = $model->id_pat;

        $model->delete();

        return $this->redirect(['pat/view', 'id'=>$id_pat]);
    }

    /**
     * Finds the Semana model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Semana the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Semana::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
