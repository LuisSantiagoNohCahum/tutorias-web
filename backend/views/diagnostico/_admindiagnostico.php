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

$this->title = 'DIAGNÓSTICO INICIAL DEL GRUPO';
$this->params['breadcrumbs'][] = ['label' => 'Grupos Activos', 'url' => ['/grupo-master/index']];
$this->params['breadcrumbs'][] = ['label' => 'VER GRUPO', 'url' => ['/grupo-master/view', 'id' => $modelGrupo->id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<h4><?= Html::encode($this->title) ?></h4>
<hr class="dropdown-divider">

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
        'style' => 'background-color: #e9e9e9; font-size: smaller;'
    ],
    'mode' => 'view',
    'enableEditMode' => false,
    'container' => ['id' => 'kv-demo'],
    'panel' => [
        'type' => DetailView::TYPE_LIGHT,
        'heading' => '<h6 class="panel-title mb-0"><i class="fas fa-users"></i> INFORMACIÓN DEL GRUPO</h6>',
        'headingOptions' => [
            'style' => 'font-size: small !important; margin:0; padding: 0.5rem 1.25rem;'
        ],
        'before' => false
    ],
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
<?php Pjax::begin() ?>
<?= GridView::widget([
    'dataProvider' => $dataProviderDiagnostico,
    'id' => 'diagnostico-grid',
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'hover' => true,
    'options' => [
        'class' => 'table table-sm'
    ],
    'layout' => '{summary}{items}{pager}', //tamplate grid - summary - tabla de datos - paginador [adicional {sorter}{errors}]
    'summary' => 'Mostrando <b>{begin}</b> - <b>{end}</b> de <b>{totalCount}</b> alumnos', //summaryOptions to add css class
    'itemLabelSingle' => 'alumno',
    'itemLabelPlural' => 'alumnos',
    'panel' => [
        'type' => GridView::TYPE_LIGHT,
        'heading' => '<h6 class="panel-title mb-0"><i class="fas fa-user-friends"></i> ALUMNOS EN DIAGNOSTICO</h6>',
        'headingOptions' => [
            'style' => 'font-size: small !important; margin:0; padding: 0.5rem 1.25rem;'
        ],
        'footer' => false,
    ],
    'toolbar' =>  [],
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;;text-align:center;'],
        ],
        [
            'attribute' => 'matricula',
            'hAlign' => 'center',
            'vAlign' => 'middle',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;;text-align:center;'],
            'content' => function ($model) {
                return '<b>' . $model->alumno->matricula . '</b>';
            }
        ],
        [
            'attribute' => 'id_alumno',
            'vAlign' => 'middle',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;;text-align:center;'],
            'content' => function ($model) {
                return $model->alumno->apellidop . ' ' . $model->alumno->apellidom . ' ' . $model->alumno->nombres;
            }
        ],
        [
            'attribute' => 'motivo',
            'hAlign' => 'center',
            'vAlign' => 'middle',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;;text-align:center;'],
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
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;;text-align:center;'],
        ],
        [
            'attribute' => 'otro',
            'format' => 'html',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;;text-align:center;'],
        ],
        //'asignaturas:html',
        //'otro:html',
        /* 'especifique:html', */
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id, 'id_grupo' => Yii::$app->request->get('id_grupo')]);
            },
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;;text-align:center;'],
        ],
    ],
]); ?>
<?php Pjax::end() ?>
<hr class="dropdown-divider">

<?php if ($modelPerformance != null) {
    $denominador = ($modelPerformance->eDesempeño + $modelPerformance->bDesempeño + $modelPerformance->arDesempeño) ?: 1;
    $eDesempeño = number_format(($modelPerformance->eDesempeño / $denominador) * 100, 2) . '%';
    $bDesempeño = number_format(($modelPerformance->bDesempeño / $denominador) * 100, 2) . '%';
    $arDesempeño = number_format(($modelPerformance->arDesempeño / $denominador) * 100, 2) . '%';
    $totalPorcentaje = number_format(($modelPerformance->eDesempeño + $modelPerformance->bDesempeño + $modelPerformance->arDesempeño) / $denominador * 100, 2) . '%';
?>
    <div class="card border">
        <div class="card-header ">
            <div class="float-right float-end pull-right"><span class="kv-buttons-1"> Mostrando <b>1</b> - <b>1</b> de <b>1</b> desempeño</span></div>
            <h6 class="m-0 text-uppercase"><i class="fas fa-chart-line"></i> DESEMPEÑO DEL GRUPO</h6>
            <div class="clearfix"></div>
        </div>
        <div class="card-body" style="padding: 0 !important;">
            <div class="float-right">
                <table class="table-light"><!--class = 'mb-2' style="border: 1px solid #d3d3d3 !important;" -->
                    <tbody>
                        <tr>

                            <td style="width: min-content; border-right:1px solid #d3d3d3; padding: 5px;" class="text-black-50">Exportar </td>
                            <td style="padding: 5px;">
                                <?= Html::a('<i class="bi bi-file-earmark-pdf-fill"></i> PDF', ['/diagnostico/export-pdf', 'id_grupo'=>$modelGrupo->id], [
                                    'class' => 'btn-export btn-sm-export btn-export-pdf',
                                ]) ?>
                            </td>

                            <td style="width: min-content; border-right:1px solid #d3d3d3; padding: 5px;" class="text-black-50">Acciones </td>
                            <td style="padding: 5px;">
                                <?= Html::a('<i class="fas fa-edit"></i></i> EDITAR', '#', [
                                        'id' => 'create-performance',
                                        'class' => 'btn-export btn-sm-export btn-export-excel text-uppercase',
                                        'data-toggle' => 'modal',
                                        'data-target' => '#modal',
                                        'data-url' => Url::to(['/performance/update', 'id' => $modelPerformance->id]),
                                        'data-pjax' => '0',
                                    ]) ?>
                            </td>
                            <td style="padding: 5px;">
                                <?= Html::a('<i class="fas fa-trash"></i> Eliminar', ['/performance/delete', 'id' => $modelPerformance->id], [
                                    'class' => 'btn-export btn-sm-export btn-export-pdf text-uppercase',
                                    'data' => [
                                        'confirm' => '¿Esta seguro de eliminar este elemento??',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-light table-sm table-striped table-hover text-center border-bottom">
                <tr class="font-weight-bold text-center text-uppercase">
                    <td style="vertical-align: middle !important;" class="cell-data-tittle">Alumnos</td>
                    <td style="vertical-align: middle !important;" class="cell-data-tittle"><?= ($modelPerformance->attributeLabels())['eDesempeño'] ?></td>
                    <td style="vertical-align: middle !important;" class="cell-data-tittle"><?= ($modelPerformance->attributeLabels())['bDesempeño'] ?></td>
                    <td style="vertical-align: middle !important;" class="cell-data-tittle"><?= ($modelPerformance->attributeLabels())['arDesempeño'] ?></td>
                    <td style="vertical-align: middle !important;" class="cell-data-tittle">Total</td>
                </tr>
                <tr>
                    <td style="vertical-align: middle !important;"><b>CANTIDAD</b></td>
                    <td style="white-space: pre-wrap !important;" class=""><?= $modelPerformance->eDesempeño ?></td>
                    <td style="white-space: pre-wrap !important;" class=""><?= $modelPerformance->bDesempeño ?></td>
                    <td style="white-space: pre-wrap !important;" class=""><?= $modelPerformance->arDesempeño ?></td>
                    <td style="white-space: pre-wrap !important;" class=""><?= $denominador ?></td>
                </tr>
                <tfoot>
                    <tr>
                        <th style="vertical-align: middle !important;"><b>PORCENTAJE</b></th>
                        <th style="white-space: pre-wrap !important;" class=""><?= $eDesempeño ?></th>
                        <th style="white-space: pre-wrap !important;" class=""><?= $bDesempeño ?></th>
                        <th style="white-space: pre-wrap !important;" class=""><?= $arDesempeño ?></th>
                        <th style="white-space: pre-wrap !important;" class=""><?= $totalPorcentaje ?></th>
                    </tr>
                </tfoot>
                
            </table>
        </div>
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

    <?php
    $this->registerJs(
        "$(document).on('click', '#create-performance', (function()
    {
        $.get(
            $(this).data('url'),
            function (data) {
                $('.modal-body').html(data);
                $('#modal').modal();
            }
        );
    }));",
        View::POS_READY,
        'my-button-handler'
    ); ?>

    <?php
    Modal::begin([
        'id' => 'modal',
        'title' => '<h4 class="modal-title text-black-50"><i class="fas fa-chart-line"></i> AÑADIR DESEMPEÑO</h4>',
        'size' => Modal::SIZE_LARGE,
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE],
    ]);
    echo "<div class='well'></div>";
    Modal::end();
    ?>


    <!-- 
        pjax
            establecer el boton
            establecer el modal
            establecere evento click al boton
            modificar accion para el render ajax
            agregar id al grid y pjax end para recargar el grid automaticamente
            establecer atributos al form para enviar por ajax
            agregar script en el form para mandar los datos a la accion por ajax
    -->