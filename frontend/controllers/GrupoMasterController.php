<?php

namespace frontend\controllers;

use app\models\GrupoMaster;
use frontend\models\search\AlumnoSearch;
use Yii;

class GrupoMasterController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $id_grupo = Yii::$app->session->get('id_grupo');

        $model = GrupoMaster::find()->where(['id'=>$id_grupo])->one();

        $searchModelAlumnos = new AlumnoSearch();
        $dataProviderAlumnos = $searchModelAlumnos->search($this->request->queryParams, $id_grupo);

        return $this->render('index', [
            'model' => $model,
            'searchModelAlumnos' => $searchModelAlumnos,
            'dataProviderAlumnos' => $dataProviderAlumnos,
        ]);
        
    }

}
