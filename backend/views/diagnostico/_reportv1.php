
<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Modal;
use yii\web\View;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\GrupoMaster $modelGrupo */
/** @var backend\models\search\DiagnosticoSearch $searchModelDiagnostico */
/** @var yii\data\ActiveDataProvider $dataProviderDiagnostico */
?>

<?= Html::img('@web/images/itsva.png', ['alt'=>'Itsva', 'class'=>'mb-2 mt-2 border-0', 'width'=>'75%']);?>

<div class="text-center">
    <h4><b>REPORTE DE DIAGNÓSTICO GRUPAL</b></h4>
</div>
<hr class="dropdown-divider">
<p>Detalles del grupo</p>

<?= DetailView::widget([
    'model' => $modelGrupo,
    'bootstrap' => true,
    'bordered' => false,
    'striped' => false,
    'options' => [
        'class' => 'table table-sm table-light border table-hover table-bordered table-borderless table-condensed mt-2', //mb-2 
    ],
    'labelColOptions' => [
        'class' => 'bg-ligth text-left text-uppercase',
        'style' => 'background-color: #e9e9e9; font-size: smaller; padding-right: 0.5rem; padding-top:0.25rem; padding-bottom: 0.25rem;'
    ],
    'valueColOptions' => [
        'class' => 'bg-ligth text-left text-uppercase',
        'style' => 'font-size: smaller; padding-left: 0.5rem;'
    ],
    'mode' => 'view',
    'enableEditMode' => false,
    'container' => ['id' => 'kv-demo'],
    'attributes' => [
        [
            //cambiar el widget al de kartik
            'attribute' => 'id_periodo',
            'format' => 'html',
            'value' => '<b>' . $modelGrupo->periodo->nombre . '</b>',
        ],
        [
            //cambiar el widget al de kartik
            'attribute' => 'id_tutor',
            'format' => 'html',
            'value' => ($modelGrupo->id_tutor != null) ? Html::tag('span', $modelGrupo->tutor->nombre . ' ' . $modelGrupo->tutor->apellido, ['class' => 'text-bold']) : Html::tag('span', "SIN ASIGNAR", ['class' => 'text-danger font-weight-bold'])

        ],
        [
            //cambiar el widget al de kartik
            'attribute' => 'id_carrera',
            'format' => 'html',
            'value' => '<b>' . $modelGrupo->carrera->nombre . '</b>',
        ],
        [
            //cambiar el widget al de kartik
            'attribute' => 'id_semestre',
            'format' => 'html',
            'value' => '<b>' . $modelGrupo->semestre->nombre . '</b>',
        ],
        [
            //cambiar el widget al de kartik
            'attribute' => 'id_grupoLetra',
            'format' => 'html',
            'value' => '<b>' . $modelGrupo->grupoLetra->letra_key . '</b>',
        ],
    ],
]) ?>

<hr class="dropdown-divider">
<p>Lista de alumnos que estan en diagnóstico continúo</p>

<?= GridView::widget([
    'dataProvider' => $dataProviderDiagnostico,
    'id' => 'diagnostico-grid',
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'hover' => true,
    'options' => [
        'class' => 'table table-sm mt-0',
        'style'=>'margin:0 !important;'
    ],
    'layout' => '{summary}{items}{pager}', //tamplate grid - summary - tabla de datos - paginador [adicional {sorter}{errors}]
    'summary' => '', //summaryOptions to add css class
    'itemLabelSingle' => 'alumno',
    'itemLabelPlural' => 'alumnos',
    'toolbar' =>  [],
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:smaller !important;;text-align:center;'],
        ],
        [
            'attribute' => 'matricula',
            'hAlign' => 'center',
            'vAlign' => 'middle',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:smaller !important;;text-align:center;'],
            'content' => function ($model) {
                return '<b>' . $model->alumno->matricula . '</b>';
            }
        ],
        [
            'attribute' => 'id_alumno',
            'vAlign' => 'middle',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:smaller !important;;text-align:center;'],
            'content' => function ($model) {
                return $model->alumno->apellidop . ' ' . $model->alumno->apellidom . ' ' . $model->alumno->nombres;
            }
        ],
        [
            'attribute' => 'motivo',
            'hAlign' => 'center',
            'vAlign' => 'middle',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:smaller !important;;text-align:center;'],
            'content' => function ($model) {
                global $estatus;

                switch ($model->motivo) {
                    case 1:
                        $estatus = 'REPETICIÓN';
                        break;
                    case 2:
                        $estatus = 'ESPECIAL';
                        break;
                    case 3:
                        $estatus = 'ATRASADA';
                        break;
                    case 4:
                        $estatus = 'GLOBAL';
                        break;
                    default:
                        $estatus = 'NOT FOUND';
                        break;
                }
                return '<span class="text-danger"><b>' . $estatus . '</b></span>';
            }
        ],
        [
            'attribute' => 'asignaturas',
            'format' => 'html',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:smaller !important;;text-align:center;'],
        ],
        [
            'attribute' => 'otro',
            'format' => 'html',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:smaller !important;;text-align:center;'],
        ],
        //'asignaturas:html',
        //'otro:html',
        /* 'especifique:html', */
        
    ],
]); ?>

<hr class="dropdown-divider">
<p>Desempeño del grupo</p>


<?php if ($modelPerformance != null) {
    $denominador = ($modelPerformance->eDesempeño + $modelPerformance->bDesempeño + $modelPerformance->arDesempeño) ?: 1;
    $eDesempeño = number_format(($modelPerformance->eDesempeño / $denominador) * 100, 2) . '%';
    $bDesempeño = number_format(($modelPerformance->bDesempeño / $denominador) * 100, 2) . '%';
    $arDesempeño = number_format(($modelPerformance->arDesempeño / $denominador) * 100, 2) . '%';
    $totalPorcentaje = number_format(($modelPerformance->eDesempeño + $modelPerformance->bDesempeño + $modelPerformance->arDesempeño) / $denominador * 100, 2) . '%';
?>

        <div class="table-responsive">
            <table id="report" class="table table-light table-sm table-striped table-hover text-center border-bottom">
                <tr class="font-weight-bold text-center text-uppercase">
                    <td style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;font-weight: bold;width: 15%;" class="cell-data-tittle">Alumnos</td>
                    <td style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;font-weight: bold;width: 15%;" class="cell-data-tittle"><?= ($modelPerformance->attributeLabels())['eDesempeño'] ?></td>
                    <td style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;font-weight: bold;width: 15%;" class="cell-data-tittle"><?= ($modelPerformance->attributeLabels())['bDesempeño'] ?></td>
                    <td style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;font-weight: bold;width: 15%;" class="cell-data-tittle"><?= ($modelPerformance->attributeLabels())['arDesempeño'] ?></td>
                    <td style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;font-weight: bold;width: 15%;" class="cell-data-tittle">Total</td>
                </tr>
                <tr>
                    <td style="vertical-align: middle !important;"><b>CANTIDAD</b></td>
                    <td style="white-space: pre-wrap !important;" class=""><?= $modelPerformance->eDesempeño ?></td>
                    <td style="white-space: pre-wrap !important;" class=""><?= $modelPerformance->bDesempeño ?></td>
                    <td style="white-space: pre-wrap !important;" class=""><?= $modelPerformance->arDesempeño ?></td>
                    <td style="white-space: pre-wrap !important;" class=""><?= $denominador ?></td>
                </tr>
                <tfoot>
                    <tr class="text-center" style="text-align: center !important;">
                        <td style="vertical-align: middle !important;"><b>PORCENTAJE</b></td>
                        <td style="white-space: pre-wrap !important;" class=""><b><?= $eDesempeño ?></b></td>
                        <td style="white-space: pre-wrap !important;" class=""><b><?= $bDesempeño ?></b></td>
                        <td style="white-space: pre-wrap !important;" class=""><b><?= $arDesempeño ?></b></td>
                        <td style="white-space: pre-wrap !important;" class=""><b><?= $totalPorcentaje ?></b></td>
                    </tr>
                </tfoot>
                
            </table>
        </div>
    
    <?php } else { ?>
        <div class="alert alert-info mb-2 mt-2" role="alert">
            <div class="form-row">
                <div class="col-md-11 m-auto">
                    <b>Aun no se ha registrado el desempeño del grupo!</b>
                </div>
                <div class="col-md-1 m-auto">
                    <?= Html::a('<i class="fas fa-chart-line"></i> Añadir', '#', [
                        'id' => 'create-performance',
                        'class' => 'btn-export btn-sm-export btn-action-basics',
                        'data-toggle' => 'modal',
                        'data-target' => '#modal',
                        'data-url' => Url::to(['/performance/create', 'id_grupo' => $modelGrupo->id]),
                        'data-pjax' => '0',
                    ]) ?>
                </div>
            </div>
        </div>
    <?php } ?>