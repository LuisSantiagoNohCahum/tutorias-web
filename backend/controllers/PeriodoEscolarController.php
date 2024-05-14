<?php

namespace backend\controllers;

use app\models\CicloEscolar;
use app\models\PeriodoEscolar;
use backend\models\search\PeriodoEscolarSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * PeriodoEscolarController implements the CRUD actions for PeriodoEscolar model.
 */
class PeriodoEscolarController extends Controller
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
     * Lists all PeriodoEscolar models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PeriodoEscolarSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PeriodoEscolar model.
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
     * Creates a new PeriodoEscolar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param int $id_ciclo ID_CICLO
     * @return string|\yii\web\Response
     */
    public function actionCreate($id_ciclo)
    {
        $model = new PeriodoEscolar();

        //agregar esta validacion en el update
        
        $cicloModel = new CicloEscolar();
        $cicloModel = CicloEscolar::find()->where(['id'=> $id_ciclo])->one();

        //agregar validacion para no poder actualizar ni crear periodos como activos si hay un periodo activo antes

        //agregar un disparador que se ejecute para actualizar el estatus a inactivo una vez se pasa la fecha del periodo
        $model->id_ciclo = $id_ciclo;

        if ($this->request->isPost) {

            if (
                count($cicloModel->periodoEscolars)>=2 
                || !(strtotime($cicloModel->fecha_inicial) < strtotime($_POST['PeriodoEscolar']['date_start'])) 
                || !(strtotime($cicloModel->fecha_final) > strtotime($_POST['PeriodoEscolar']['date_end']))
                ) 
            {
                throw new NotFoundHttpException(Yii::t('app','Hubo un error con los datos que intento ingresar. Verifique nuevamente'));
            }

            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['ciclo-escolar/view', 'id' => $id_ciclo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PeriodoEscolar model.
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
     * Deletes an existing PeriodoEscolar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $id_ciclo = $model->id_ciclo;

        $model->delete();

        return $this->redirect(['ciclo-escolar/view', 'id'=>$id_ciclo]);
    }

    /**
     * Finds the PeriodoEscolar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PeriodoEscolar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PeriodoEscolar::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
