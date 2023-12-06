<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\detail\DetailView;
use yii\helpers\BaseUrl;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use app\models\Alumno;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\GrupoMaster $model */
/** @var backend\models\search\AlumnoSearch $searchModelAlumnos */
/** @var yii\data\ActiveDataProvider $dataProviderAlumnos */

$this->title = $model->carrera->nombre . ' - ' . $model->semestre->nombre . ' - ' . $model->grupoLetra->letra_key;
$this->params['breadcrumbs'][] = ['label' => 'Grupo Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="grupo-master-view">

    <!-- cell-data-tittle-nowidth -->
    <div class="bg-light pt-2 pb-2 text-center rounded border">
        <h4 class="text-black-50 m-0"><?= Html::encode($this->title) ?></h4>
    </div>
    

    <hr class="dropdown-divider">

    <!-- Ocultar mientras estos botones -->
    <!--     
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p> 
-->

    <b></b>
    <?= DetailView::widget([
        'model' => $model,
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
                'value' => '<b>' . $model->periodo->nombre . '</b>',
            ],
            [
                //cambiar el widget al de kartik
                'attribute' => 'id_carrera',
                'format' => 'html',
                'value' => '<b>' . $model->carrera->nombre . '</b>',
            ],
            [
                //cambiar el widget al de kartik
                'attribute' => 'id_semestre',
                'format' => 'html',
                'value' => '<b>' . $model->semestre->nombre . '</b>',
            ],
            [
                //cambiar el widget al de kartik
                'attribute' => 'id_grupoLetra',
                'format' => 'html',
                'value' => '<b>' . $model->grupoLetra->letra_key . '</b>',
            ],
            [
                //cambiar el widget al de kartik
                'attribute' => 'id_tutor',
                'format' => 'html',
                'value' => ($model->id_tutor != null) ? Html::tag('span', $model->tutor->nombre . ' ' . $model->tutor->apellido, ['class' => 'text-bold']) : Html::tag('span', "SIN ASIGNAR", ['class' => 'text-danger font-weight-bold'])

            ],
        ],
    ]) ?>

<!--     <h4 class="text-black-50"><i class="bi bi-people-fill"></i> Administrar Grupo</h4> -->
    <hr class="dropdown-divider">

    <div class="card border">
        <div class="card-header ">
            <h6 class="m-0 text-uppercase"><i class="fas fa-mouse-pointer"></i> Acciones</h6>
            <div class="clearfix"></div>
        </div>
        <div class="card-body" style="padding: 0 !important;">
            <div class="float-right">
                <table class="table-light"><!--class = 'mb-2' style="border: 1px solid #d3d3d3 !important;" -->
                    <tbody>
                        <tr>
                            <td style="width: min-content; border-right:1px solid #d3d3d3; padding: 5px;" class="text-black-50">Alumnos </td>
                            <td style="padding: 5px;">
                                <?= Html::a("<i class='bi bi-person-fill-add'></i> Añadir", Url::toRoute(['alumno/create', 'id_grupo' => $model->id]), ['class' => 'btn-export btn-sm-export btn-action-basics']) ?>
                            </td>
                            <td style="padding: 5px;">
                                <?= Html::a("<i class='bi bi-file-earmark-spreadsheet-fill'></i> Importar", Url::toRoute(['alumno/import-data-from-excel', 'id_grupo' => $model->id]), ['class' => 'btn-export btn-sm-export btn-export-excel']) ?>
                            </td>
                            <?php if ($model->id_tutor != null) { ?>
                                <td style="width: min-content; border-right:1px solid #d3d3d3; padding: 5px;" class="text-black-50">Tutoria </td>
                                <td style="padding: 5px;">
                                    <?= Html::a("<i class='bi bi-card-checklist'></i> PAT", Url::toRoute(['pat/admin-pat', 'id_grupo' => $model->id]), ['class' => 'btn-export btn-sm-export btn-action-basics']) ?>
                                </td>
                                <td style="padding: 5px;">
                                    <?= Html::a("<i class='bi bi-file-bar-graph-fill'></i> Diagnostico", Url::toRoute(['alumno/import', 'id_grupo' => $model->id]), ['class' => 'btn-export btn-sm-export btn-action-basics']) ?>
                                </td>
                                <td style="padding: 5px;">
                                    <?= Html::a("<i class='bi bi-person-check-fill'></i> Liberacion", Url::toRoute(['evaluacion/admin-evaluacion', 'id_grupo' => $model->id]), ['class' => 'btn-export btn-sm-export btn-action-basics']) ?>
                                </td>
                            <?php }?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <!-- Agregar alumnos - importar alumnos - ver pat - ver diagnostico - ver liberacion -->
        <!-- Verificar que no se dupliquen alumnos en el controlador al importar -->
        <!-- pONER BOTON PARA ELIMINAR TODOS LOS ALUMNOS DE ESTA TABLA CON UN BULK -->
        
        <?php if ($model->id_tutor == null) { ?>
            <div class="alert alert-danger mt-2" role="alert">
                <b>ESTE GRUPO NO TIENE ASIGNADO NINGÚN TUTOR!.</b> Asigne un tutor para poder ver los botones correspondientes.
            </div>
        <?php } ?>

<!--     <h4 class="mt-4 text-black-50"><i class="bi bi-people-fill"></i> Lista de Alumnos</h4> -->
    <hr class="dropdown-divider">

    <?php if (count($dataProviderAlumnos->getModels()) > 0) { ?>

        <!-- Tool bar para diagnostico y canalizacion -->

        <!--     
            Modal::begin([
                'title' => 'Hello world',
                'toggleButton' => ['label' => 'click me'],
            ]);

            echo 'Say hello...';

            Modal::end();
        -->

        <!-- Mostrar modal para crear todo esto -->
        <!-- Cambiar id en los botones o dejarlo con el mismo id por que asi no duplicamos el codigo js -->
        <!-- 
        <?= Html::a('Añadir a diagnostico', ['create', 'id_grupo' => $model->id], ['id' => 'create-diagnostic', 'class' => 'btn btn-success']) ?>

        <?= Html::a('Canalizar', ['update', 'id' => $model->id], ['id' => 'create-diagnostic', 'class' => 'btn btn-success']) ?> 
        -->

        <!-- mandar a la accion de renderizar form en ambos casos, por que luego el boton save automaticamente toma l del form renderizado -->

        <?php $form = ActiveForm::begin(['id' => 'send-alumno-form']); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProviderAlumnos,
            'filterModel' => $searchModelAlumnos,
            'bordered'=>true,
            'striped'=>false,
            'condensed'=>true,
            'hover'=>false,
            'options' => [
                'class'=>'table table-sm'
            ],
            'layout' => '{summary}{items}{pager}',//tamplate grid - summary - tabla de datos - paginador [adicional {sorter}{errors}]
            'summary'=>'Mostrando <b>{begin}</b> - <b>{end}</b> de <b>{totalCount}</b> alumnos', //summaryOptions to add css class
            'itemLabelSingle' => 'alumno',
            'itemLabelPlural' => 'alumnos',
            'panel' => [
                'type' => GridView::TYPE_LIGHT,
                'heading' => '<h6 class="panel-title mb-0"><i class="fas fa-user-friends"></i></i> ALUMNOS DE ALTA</h6>',
                'headingOptions'=>[
                    'style'=>'font-size: small !important; margin:0; padding: 0.5rem 1.25rem;'
                ],
                'before'=>'<b>IMPORTANTE: </b><em>Selecione un alumno antes de realizar alguna acción</em>',
                'footer' => false,
            ],
            'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'],
            'toolbar' =>  [
                'content' =>
                    Html::a('<i class="fas fa-external-link-alt"></i> Diagnostico', ['create', 'id_grupo' => $model->id], [
                        'id' => 'create-diagnostic', 
                        'class' => 'btn-export btn-sm-export btn-action-basics mr-2 btn-disabled',
                        ]) . ' '.
                    Html::a('<i class="fas fa-external-link-alt"></i> Canalizar', ['update', 'id' => $model->id], [
                        'id' => 'create-diagnostic', 
                        'class' => 'btn-export btn-sm-export btn-action-basics mr-2 btn-disabled',
                    ]),
                    
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
                    'class' => '\kartik\grid\CheckboxColumn',
                    'multiple' => false,
                    'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;'],
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

                //'correo',
                //'telefono',
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
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, $model, $key, $index, $column) {
                        return Url::toRoute(['/alumno/' . $action, 'id' => $model->id]);
                    },
                    'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;'],
                ],
            ],
        ]); ?>

        <?php ActiveForm::end(); ?>
    <?php } else { ?>
        <div class="alert alert-info text-uppercase" role="alert">
            <b>Aun no hay alumnos dados de alta en este grupo!.</b>
        </div>
    <?php } ?>
    <!-- mostrar que no hay alumnos - mostrar que no hay tutor -->
    <!-- eb el action view mandar el id del grupo y modificar el search para buscar los alumnos con ese id de grupo, crera opcion para exportar alumnos a excel -->

    <!-- pestaña de formato de importacion de alumnos -->

    <!-- Validar que el tutor solo este asignado en un grupo, es decir que si ya se ha asignado anteriormente no se podra asignar nuevamente -->
</div>

<?php

$script = <<< JS
$(document).ready(function() {
        $("#create-diagnostic").click(function(e) {
            e.preventDefault();
            let submitUrl = $(this).attr('href');

            let form = $("#send-alumno-form").eq(0);
            form.attr('action', submitUrl);
            form.submit();
        });
    });
JS;

$this->registerJs($script);

$script = <<< JS
$(document).ready(function() {
$("input:checkbox").on('click', function() {
    var box = $(this);
    if (box.is(":checked")) {
        var group = "input:checkbox[name='" + box.attr("name") + "']";

        //obtener padre de un contenedoor hijo
        //var padreSuperior=$(this).parent().parent();
        $(group).prop("checked", false);
        $('tr.table-danger').prop('class', 'w1');

        box.prop("checked", true);

        $("a#create-diagnostic").prop('class',"btn-export btn-sm-export btn-action-basics mr-2")

    } else {
        box.prop("checked", false);

        $("a#create-diagnostic").prop('class',"btn-export btn-sm-export btn-action-basics mr-2 btn-disabled")
    }
})
});
JS;
$this->registerJs($script);
?>