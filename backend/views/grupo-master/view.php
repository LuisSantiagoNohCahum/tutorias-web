<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\helpers\BaseUrl;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use app\models\Alumno;

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

    
    <h3 class="text-black-50"><i class="bi bi-info-circle-fill"></i> <?= Html::encode($this->title) ?></h3>

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
        'attributes' => [
            'id',
            [
                //cambiar el widget al de kartik
                'attribute' => 'id_periodo',
                'format' => 'html',
                'value' => '<b>'.$model->periodo->nombre.'</b>',
            ],
            [
                //cambiar el widget al de kartik
                'attribute' => 'id_carrera',
                'format' => 'html',
                'value' => '<b>'.$model->carrera->nombre.'</b>',
            ],
            [
                //cambiar el widget al de kartik
                'attribute' => 'id_semestre',
                'format' => 'html',
                'value' => '<b>'.$model->semestre->nombre.'</b>',
            ],
            [
                //cambiar el widget al de kartik
                'attribute' => 'id_grupoLetra',
                'format' => 'html',
                'value' => '<b>'.$model->grupoLetra->letra_key.'</b>',
            ],
            [
                //cambiar el widget al de kartik
                'attribute' => 'id_tutor',
                'format' => 'html',
                'value' => ($model->id_tutor != null) ? Html::tag('span', $model->tutor->nombre . ' ' . $model->tutor->apellido, ['class' => 'text-bold']) : Html::tag('span', "SIN ASIGNAR", ['class' => 'text-danger font-weight-bold'])

            ],
        ],
    ]) ?>

    <h4 class="text-black-50"><i class="bi bi-people-fill"></i> Administrar Grupo</h4>
    <hr class="dropdown-divider">

    <!-- Agregar alumnos - importar alumnos - ver pat - ver diagnostico - ver liberacion -->
    <fieldset class="border border-top mb-2 p-1">
        <legend style="all: unset;" class="p-1 font-italic font-weight-bold text-black-50">Alumnos</legend>
        <?= Html::a("<i class='bi bi-person-fill-add'></i> Añadir alumnos", Url::toRoute(['alumno/create', 'id_grupo' => $model->id]), ['class' => 'btn btn-success']) ?>

        <!-- Verificar que no se dupliquen alumnos en el controlador al importar -->
        <!-- pONER BOTON PARA ELIMINAR TODOS LOS ALUMNOS DE ESTA TABLA CON UN BULK -->
        <?= Html::a("<i class='bi bi-file-earmark-spreadsheet-fill'></i> Importar alumnos", Url::toRoute(['alumno/import-data-from-excel', 'id_grupo' => $model->id]), ['class' => 'btn btn-success']) ?>
    </fieldset>

    <fieldset class="border border-top mb-2 p-1">
        <legend style="all: unset;" class="p-1 font-italic font-weight-bold text-black-50">Acción Tutoral</legend>

        <?php if ($model->id_tutor != null) { ?>
            <?= Html::a("<i class='bi bi-card-checklist'></i> Ver PAT", Url::toRoute(['pat/admin-pat', 'id_grupo' => $model->id]), ['class' => 'btn btn-success']) ?>

            <?= Html::a("<i class='bi bi-file-bar-graph-fill'></i> Ver Diagnostico", Url::toRoute(['alumno/import', 'id_grupo' => $model->id]), ['class' => 'btn btn-success']) ?>

            <?= Html::a("<i class='bi bi-person-check-fill'></i> Ver Liberacion", Url::toRoute(['evaluacion/admin-evaluacion', 'id_grupo' => $model->id]), ['class' => 'btn btn-success']) ?>

        <?php } else { ?>
            <div class="alert alert-danger" role="alert">
                <b>ESTE GRUPO NO TIENE ASIGNADO NINGÚN TUTOR!.</b> Asigne un tutor para poder ver los botones correspondientes.
            </div>
        <?php } ?>

    </fieldset>

    <h4 class="mt-4 text-black-50"><i class="bi bi-people-fill"></i> Lista de Alumnos</h4>
    <hr class="dropdown-divider">

    <?php if (count($dataProviderAlumnos->getModels())>0) { ?>
        <?= GridView::widget([
            'dataProvider' => $dataProviderAlumnos,
            'filterModel' => $searchModelAlumnos,
            'options'=> ['class' => 'table table-sm table-stripped'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                /* ['class' => '\kartik\grid\CheckboxColumn'], */
                [
                    'attribute'=> 'matricula',
                    'hAlign'=>'center',
                    'vAlign'=>'middle',
                    'format'=> 'html',
                    'value'=> function($model){
                        return '<b>'.$model->matricula.'</b>';
                    },
                    'filterInputOptions' => [
                        'class' => 'form-control form-control-sm',
                        'placeholder' => 'Buscar...',
                    ],
                ],
                [
                    'attribute'=> 'apellidop',
                    'filterInputOptions' => [
                        'class' => 'form-control form-control-sm',
                        'placeholder' => 'Buscar...',
                    ],
                ],
                [
                    'attribute'=> 'apellidom',
                    'filterInputOptions' => [
                        'class' => 'form-control form-control-sm',
                        'placeholder' => 'Buscar...',
                    ],
                ],
                [
                    'attribute'=> 'nombres',
                    'filterInputOptions' => [
                        'class' => 'form-control form-control-sm',
                        'placeholder' => 'Buscar...',
                    ],
                ],
                
                //'correo',
                //'telefono',
                //'fecha_nac',
                //'ciudad',
                [
                    'attribute'=> 'genero',
                    'value' => function($model) {
                        return ($model->genero != 0) ?'FEMENINO':'MASCULINO';
                    },
                    'filterInputOptions' => [
                        'class' => 'form-control form-control-sm',
                        'placeholder' => 'Buscar...',
                    ],
                ],
                //'created_at',
                //'updated_at',
                //'id_grupo',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, $model, $key, $index, $column) {
                        return Url::toRoute(['/alumnos/'.$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
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