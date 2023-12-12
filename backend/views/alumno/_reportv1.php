<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use app\models\Alumno;
use kartik\detail\DetailView;

/** @var yii\web\View $this */
/** @var app\models\GrupoMaster $modelGrupo */
/** @var backend\models\search\AlumnoSearch $searchModelAlumnos */
/** @var yii\data\ActiveDataProvider $dataProviderAlumnos */
?>

<?php if(!isset($rExcel)){?>
    <?= Html::img('@web/images/itsva.png', ['alt'=>'Itsva', 'class'=>'mb-2 mt-2 border-0', 'width'=>'75%']);?>
    <div class="text-center">
        <h4><b>LISTA DE ALUMNOS</b></h4>
    </div>
<?php }?>

<hr class="dropdown-divider">
<?php if(!isset($rExcel)){?>
    <p>Detalles del grupo</p>
<?php }?>
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
<?php if(!isset($rExcel)){?>
    <p>Listado de alumnos pertenecientes al grupo</p>
<?php }?>
<?= GridView::widget([
                'dataProvider' => $dataProviderAlumnos,
                'bordered'=>true,
                'striped'=>false,
                'condensed'=>true,
                'hover'=>false,
                'options' => [
                    'class'=>'table table-sm'
                ],
                'layout' => '{items}',//tamplate grid - summary - tabla de datos - paginador [adicional {sorter}{errors}]
                //'summary'=>'Mostrando <b>{begin}</b> - <b>{end}</b> de <b>{totalCount}</b> alumnos', //summaryOptions to add css class
                'itemLabelSingle' => 'alumno',
                'itemLabelPlural' => 'alumnos',
                
                'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'],
                'toolbar' =>  [
                ],
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;'],
                        'filterOptions'=>[
                            'class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;'
                        ],
                    ],
                    
                    [
                        'attribute' => 'matricula',
                        'hAlign' => 'center',
                        'vAlign' => 'middle',
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<b>' . $model->matricula . '</b>';
                        },
                        'filterOptions'=>[
                            'class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;'
                        ],
                        'filterInputOptions' => [
                            'class' => 'form-control form-control-sm',
                            'placeholder' => 'Buscar...',
                        ],
                        'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;'],
                    ],
                    [
                        'attribute' => 'apellidop',
                        'filterOptions'=>[
                            'class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;'
                        ],
                        'filterInputOptions' => [
                            'class' => 'form-control form-control-sm',
                            'placeholder' => 'Buscar...',
                        ],
                        'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;text-align:center;'],
                    ],
                    [
                        'attribute' => 'apellidom',
                        'filterOptions'=>[
                            'class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;'
                        ],
                        'filterInputOptions' => [
                            'class' => 'form-control form-control-sm',
                            'placeholder' => 'Buscar...',
                        ],
                        'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;text-align:center;'],
                    ],
                    [
                        'attribute' => 'nombres',
                        'filterOptions'=>[
                            'class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;text-align:center;'
                        ],
                        'filterInputOptions' => [
                            'class' => 'form-control form-control-sm',
                            'placeholder' => 'Buscar...',
                        ],
                        'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;text-align:center;'],
                    ],

                    'correo',
                    'telefono',
                    //'fecha_nac',
                    //'ciudad',
                    [
                        'attribute' => 'genero',
                        'value' => function ($model) {
                            return ($model->genero != 0) ? 'FEMENINO' : 'MASCULINO';
                        },
                        'filterOptions'=>[
                            'class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;'
                        ],
                        'filterInputOptions' => [
                            'class' => 'form-control form-control-sm',
                            'placeholder' => 'Buscar...',
                        ],
                        'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;text-align:center;'],
                    ],
                    //'created_at',
                    //'updated_at',
                    //'id_grupo',
                    
                ],
            ]); ?>
