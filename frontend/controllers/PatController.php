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

        $modelGrupo = $modelPat = $searchModelSemanas = $dataProviderSemanas = $reportParciales = null;
        /* Modelo con los datos del grupo actual */
        $modelGrupo = GrupoMaster::find()->where(['id'=>$id_grupo])->one();

        /* Verificar que modelo pat no sea null - para buscar semanas con su id*/
        /* Solo filtrar el Pat activo que sea de ese semestre - validar en form si es null */
        /* lanzar exeption si es null en algunos de ellos y setFlash recibir en index */

        /* Podria ser un operador ternario igual para devolver el null */
        if ($modelGrupo != null) $modelPat = Pat::find()->where(['id_semestre' => $modelGrupo->semestre->id, 'estatus'=> 1])->one();

        /* Buscar semanas, devolver dataprovider de semanas */
        if ($modelPat != null){
            $searchModelSemanas = new SemanaSearch();
            $dataProviderSemanas = $searchModelSemanas->search($this->request->queryParams, $modelPat->id);

            $reportParciales=[];
            $reportParciales[]= $modelPat->getReportParcial($modelPat->id, $modelGrupo->id, [1, 6]);
            $reportParciales[]= $modelPat->getReportParcial($modelPat->id, $modelGrupo->id, [7, 11]);
            //hacer un count de semanas -get models para el ultimo
            $reportParciales[]= $modelPat->getReportParcial($modelPat->id, $modelGrupo->id, [12, 16]);
        }
        
        return $this->render('index', [
            'modelGrupo' => $modelGrupo,
            'modelPat' => $modelPat,
            'searchModelSemanas' => $searchModelSemanas,
            'dataProviderSemanas' => $dataProviderSemanas,
            'reportParciales' => $reportParciales
        ]);
    }

    public function actionExportPdf($id_grupo){
        $id_grupo = Yii::$app->session->get('id_grupo');

        $modelGrupo = $modelPat = $reportParciales = null;

        $modelGrupo = GrupoMaster::find()->where(['id'=>$id_grupo])->one();

        if ($modelGrupo != null) $modelPat = Pat::find()->where(['id_semestre' => $modelGrupo->semestre->id, 'estatus'=> 1])->one();

        if ($modelPat != null){
            $reportParciales=[];
            $reportParciales[]= $modelPat->getReportParcial($modelPat->id, $modelGrupo->id, [1, 6]);
            $reportParciales[]= $modelPat->getReportParcial($modelPat->id, $modelGrupo->id, [7, 11]);
            //hacer un count de semanas -get models para el ultimo
            $reportParciales[]= $modelPat->getReportParcial($modelPat->id, $modelGrupo->id, [12, 16]);
        }

        $pdf = Yii::$app->pdf;
        $content = $this->renderPartial('_reportv1', [
            'modelGrupo' => $modelGrupo,
            'modelPat' => $modelPat,
            'reportParciales' => $reportParciales
        ]);
        $pdf->content = $content;
        return $pdf->render();
    }

    public function actionExportExcel($id_grupo){
        $id_grupo = Yii::$app->session->get('id_grupo');
        
        $modelGrupo = $modelPat = $reportParciales = null;
        $modelGrupo = GrupoMaster::find()->where(['id'=>$id_grupo])->one();
        if ($modelGrupo != null) $modelPat = Pat::find()->where(['id_semestre' => $modelGrupo->semestre->id, 'estatus'=> 1])->one();
        if ($modelPat != null){
            $reportParciales=[];
            $reportParciales[]= $modelPat->getReportParcial($modelPat->id, $modelGrupo->id, [1, 6]);
            $reportParciales[]= $modelPat->getReportParcial($modelPat->id, $modelGrupo->id, [7, 11]);
            //hacer un count de semanas -get models para el ultimo
            $reportParciales[]= $modelPat->getReportParcial($modelPat->id, $modelGrupo->id, [12, 16]);
        }
        //$data = ArrayHelper::toArray($dataProvider->getModels());
        
        $filename =  time() . ".xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        
        echo $this->renderPartial('_reportv1', [
            'modelGrupo' => $modelGrupo,
            'modelPat' => $modelPat,
            'reportParciales' => $reportParciales,
            'rExcel'=>true
        ]);

        exit;
    }

}
