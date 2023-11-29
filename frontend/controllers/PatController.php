<?php

namespace frontend\controllers;

use app\models\GrupoMaster;
use app\models\Semana;
use app\models\SemanaReal;
use app\models\Pat;
use frontend\models\search\SemanaRealSearch;
use frontend\models\search\SemanaSearch;

use Yii;

class PatController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $id_grupo = Yii::$app->session->get('id_grupo');

        $modelGrupo = GrupoMaster::find()->where(['id'=>$id_grupo])->one();

        /* Verificar que modelo pat no sea null - para buscar semanas con su id*/
        /* Solo filtrar el Pat activo que sea de ese semestre - validar en form si es null */
        $modelPat = Pat::find()->where(['id_semestre' => $modelGrupo->semestre->id, 'estatus'=> 1])->one();

        /* Buscar semanas, devolver dataprovider de semanas */
        $searchModelSemanas = new SemanaSearch();
        $dataProviderSemanas = $searchModelSemanas->search($this->request->queryParams, $modelPat->id);

        return $this->render('index', [
            'modelGrupo' => $modelGrupo,
            'modelPat' => $modelPat,
            'searchModelSemanas' => $searchModelSemanas,
            'dataProviderSemanas' => $dataProviderSemanas
        ]);
    }

}
