<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\GrupoMaster $modelGrupo */
/** @var app\models\Pat $modelPat */
/** @var backend\models\search\SemanaSearch $searchModelSemanas */
/** @var yii\data\ActiveDataProvider $dataProviderSemanas */

$this->title = ($modelPat != null) ? $modelPat->nombre : 'ADMINISTRAR PAT';
$this->params['breadcrumbs'][] = ['label' => 'Grupos Activos', 'url' => ['/grupo-master/index']];
$this->params['breadcrumbs'][] = ['label' => 'VER GRUPO', 'url' => ['/grupo-master/view', 'id'=>$modelGrupo->id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pat-view">

    <h4><?= Html::encode($this->title) ?></h4>

    <hr class="dropdown-divider">

    <?= DetailView::widget([
        'model' => $modelGrupo,
        'bootstrap'=>true,
        'bordered'=>false,
        'striped'=>false,
        'options'=>[
            'class'=>'table table-sm table-light border table-hover table-bordered table-borderless table-condensed mt-2', //mb-2 
        ],
        'labelColOptions'=>[
            'class'=>'bg-ligth text-left text-uppercase',
            'style'=>'background-color: #e9e9e9; font-size: smaller;'
        ],
        'mode' => 'view',
        'enableEditMode' => false,
        'container' => ['id' => 'kv-demo'],
        'panel' => [
            'type' => DetailView::TYPE_LIGHT,
            'heading' => '<h6 class="panel-title mb-0"><i class="fas fa-users"></i> INFORMACIÓN DEL GRUPO</h6>',
            'headingOptions'=>[
                'style'=>'font-size: small !important; margin:0; padding: 0.5rem 1.25rem;'
            ],
            'before'=>false
        ],
        'attributes' => [
            [
                //cambiar el widget al de kartik
                'attribute' => 'id_periodo',
                'format' => 'html',
                'value' => '<b>'.$modelGrupo->periodo->nombre.'</b>',
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
                'value' => '<b>'.$modelGrupo->carrera->nombre.'</b>',
            ],
            [
                //cambiar el widget al de kartik
                'attribute' => 'id_semestre',
                'format' => 'html',
                'value' => '<b>'.$modelGrupo->semestre->nombre.'</b>',
            ],
            [
                //cambiar el widget al de kartik
                'attribute' => 'id_grupoLetra',
                'format' => 'html',
                'value' => '<b>'.$modelGrupo->grupoLetra->letra_key.'</b>',
            ],
            
        ],
    ]) ?>

    <hr class="dropdown-divider">
<!-- Espacio para descriocion que viene del pat - si no es null el campo y si model pat no es null igual -->

    <?php if ($modelPat == null) { ?>
        <div class="alert alert-danger" role="alert">
            <b>El administrador no ha configurado un PAT para este semestre!</b>
        </div>
    <?php } else {?>
        <?php if (count($dataProviderSemanas->getModels())>0) {?>
            <?= GridView::widget([
                'dataProvider' => $dataProviderSemanas,
                'bordered'=>true,
                'striped'=>false,
                'condensed'=>true,
                'hover'=>false,
                'options' => [
                    'class'=>'table table-sm'
                ],
                'layout' => '{summary}{items}{pager}',//tamplate grid - summary - tabla de datos - paginador [adicional {sorter}{errors}]
                'summary'=>'Mostrando <b>{begin}</b> - <b>{end}</b> de <b>{totalCount}</b> semanas', //summaryOptions to add css class
                'itemLabelSingle' => 'semana',
                'itemLabelPlural' => 'semanas',
                'panel' => [
                    'type' => GridView::TYPE_LIGHT,
                    'heading' => '<h6 class="panel-title mb-0"><i class="fas fa-calendar-check"></i> SEMANAS DEL PAT</h6>',
                    'headingOptions'=>[
                        'style'=>'font-size: small !important; margin:0; padding: 0.5rem 1.25rem;'
                    ],
                    'footer' => false,
                ],
                'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'],
                'toolbar' =>  [
                    //'{toggleData}',
                    //'toggleDataOptions' va afuera de toolbar
                ],
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],
                    [
                        'class' => 'kartik\grid\ExpandRowColumn',
                        'width' => '50px',
                        'value' => function ($model, $key, $index, $column) {
                            return GridView::ROW_COLLAPSED;
                        },
                        'detailUrl' => Url::to(['/semana/detail-add-semana-real', 'id_grupo'=>$modelGrupo->id]),
                        'headerOptions' => ['class' => 'kartik-sheet-style'] ,
                        'expandOneOnly' => true,
                        'expandIcon' => '<i class="bi bi-plus-square"></i>',
                        'collapseIcon'=> '<i class="bi bi-dash-square"></i>',
                        'defaultHeaderState' => GridView::ROW_COLLAPSED,
                        'detailRowCssClass' => 'detail-row-grid',
                        //'detailRowCssClass' => GridView::TYPE_LIGHT,
                        'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:1.35em !important;'],
                        'contentOptions' => ['style' => 'font-size:1.35em;']
                    ],
                    [
                        'attribute'=> 'nombre',
                        'format'=>'html',
                        'vAlign'=>'middle',
                        'hAlign'=>'center',
                        'content' => function($model){
                            return Html::tag('b',$model->nombre );
                        },
                        'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;'],
                        'contentOptions' => ['style' => 'font-size:small;']
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'header'=>'Acciones',
                        'template' => '{view}',
                        'urlCreator' => function ($action, $model, $key, $index, $column) {
                            /* Modificar boton de view en este grid para que nos mande a otra accion */
                            /* Se uso request get para obtener el parametro directo de la url por que no se reconoce el objeto modelGrupo en el contexto del callbak urlCreator */
                            if ($action=='view') return Url::toRoute(['/semana/view-add-semana', 'id' => $model->id, 'id_grupo' => Yii::$app->request->get('id_grupo')]);

                            return Url::toRoute(['/semana/'.$action, 'id' => $model->id]);
                        },
                        'viewOptions'=>[
                            'class'=> 'btn-show-action'
                        ],
                        'headerOptions' => ['class' => 'cell-data-tittle-nowidth']
                    ],
                ],
            ]); ?>

<!--detail row class background-color: #f7f7f7; [add bg-white to detail.php view table]-->
<!-- O Colocar un rowoptions o collocar un background en el content cell de cada columna -->
<!-- box-shadow: 5px 5px 8px 0px lightgrey; -->

<!-- #c7535e; btn-pdf #6ea77b; btn-excel - copiar el code de btn y btn-success-outline -->
            <div class="card border">
                <div class="card-header ">
                    <div class="float-right float-end pull-right"><span class="kv-buttons-1"> Mostrando <b>1</b> - <b>3</b> de <b>3</b> parciales</span></div>
                    <h6 class="m-0 text-uppercase"><i class="fas fa-chart-line"></i> Reportes parciales</h6>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body" style="padding: 0 !important;">
                    <div class="float-right">
                        <table class="table-light"><!--class = 'mb-2' style="border: 1px solid #d3d3d3 !important;" -->
                            <tbody>
                                <tr>
                                    <td style="width: min-content; border-right:1px solid #d3d3d3; padding: 5px;" class="text-black-50">Exportar </td>
                                    <td style="padding: 5px;">
                                        <?= Html::a('<i class="bi bi-file-earmark-excel-fill"></i> Excel', ['/pat/export-excel', 'id_grupo'=>$modelGrupo->id], [
                                                'class' => 'btn-export btn-sm-export btn-export-excel text-uppercase',
                                            ]) ?>
                                    </td>
                                    <td style="padding: 5px;">
                                        <?= Html::a('<i class="bi bi-file-earmark-pdf-fill"></i> PDF', ['/pat/export-pdf', 'id_grupo'=>$modelGrupo->id], [
                                                'class' => 'btn-export btn-sm-export btn-export-pdf text-uppercase',
                                            ]) ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php  
                $TotalCol1 = $TotalCol2 = $TotalCol3 = $TotalCol4 = $TotalCol5 = $TotalCol6 = 0;
                ?>
                <table class="table table-light table-sm table-striped table-hover">
                    <thead class="font-weight-bold text-center text-uppercase">
                        <tr>
                            <th class='cell-data-tittle'>PARCIALES</th>
                            <th class='cell-data-tittle'>TOTAL DE HORAS GRUPALES</th>
                            <th class='cell-data-tittle'>TOTAL DE HORAS INVIDUALES</th>
                            <th class='cell-data-tittle'>TOTAL HORAS NO IMPARTIDAS </th>
                            <th class='cell-data-tittle'>TOTAL MUJERES</th>
                            <th class='cell-data-tittle'>TOTAL HOMBRES</th>
                            <th class='cell-data-tittle'>NÚMERO DE ALUMNOS QUE FALTARON EN LAS SESIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reportParciales as $key => $rParcial) {
                            if($key==0) $parcialNombre = 'Primera'; elseif($key==1) $parcialNombre = 'Segunda'; else $parcialNombre = 'Tercera';
                                $TotalCol1 += intval($rParcial['TGrupal']);
                                $TotalCol2 += intval($rParcial['TIndividual']);
                                $TotalCol3 += intval($rParcial['TNAtendida']);
                                $TotalCol4 += intval($rParcial['AMujeres']);
                                $TotalCol5 += intval($rParcial['AHombress']);
                                $TotalCol6 += intval($rParcial['AFaltantes']);
                            ?>
                            <tr class="text-center text-uppercase">
                                <td style="vertical-align: middle !important;font-size:smaller; padding: 0.2rem;;" class="font-weight-bold"><?= $parcialNombre . ' ENTREGA PARCIAL' ?></td>
                                <td style="vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['TGrupal'] ?></td>
                                <td style="vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['TIndividual'] ?></td>
                                <td style="vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['TNAtendida'] ?></td>
                                <td style="vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['AMujeres'] ?></td>
                                <td style="vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['AHombress'] ?></td>
                                <td style="vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['AFaltantes'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr class="text-center text-uppercase">
                            <th style="vertical-align: middle !important;font-size:smaller" class="font-weight-bold">TOTAL</th>
                            <th><?= $TotalCol1 ?></th>
                            <th><?= $TotalCol2 ?></th>
                            <th><?= $TotalCol3 ?> </th>
                            <th><?= $TotalCol4 ?></th>
                            <th><?= $TotalCol5 ?></th>
                            <th><?= $TotalCol6 ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        <?php } else {?>
            <div class="alert alert-danger" role="alert">
                <b>NO SE HA REGISTRADO NINGUNA SEMANA EN ESTE FORMATO PAT!</b>
            </div>
        <?php }?>
    <?php }?>
</div>
