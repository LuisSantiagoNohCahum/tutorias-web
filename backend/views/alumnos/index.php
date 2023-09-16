<?php

use app\models\Alumnos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
/* use yii\grid\GridView; */
use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\AlumnosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Alumnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumnos-index">



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            /* expand column */
            [
                'attribute' => 'matricula',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                
            ],
            [
                'attribute' => 'nombres',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                
            ],
            [
                'attribute' => 'apellidop',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                
            ],
            [
                'attribute' => 'apellidom',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                
            ],

            //'curp',
            //'fecha_nac',
            //'telefono',
            //'email:email',
            //'estado',
            //'ciudad',
            //'colonia',
            //'codigop',
            //'domicilio',
            //'id_user',

            [
                'class' => 'yii\grid\ActionColumn'
                /*                 
                'class' => 'kartik\grid\ActionColumn',
                'viewOptions' => ['label' => '<i class="bi bi-person-exclamation"></i>'],
                'deleteOptions' => ['label' => '<i class="bi bi-person-fill-dash"></i>'],
                'updateOptions' => ['label' => '<i class="bi bi-person-fill-up"></i>'] */
            ],
        ],
        'panel' => [
            'after' => '',
            'heading' => '<i class="fas fa-book"></i>  Alumnos',
            'type' => 'primary',
            'before' => '<div style="padding-top: 7px;"><em>* Lista de alumnos del grupo actual.</em></div>',
        ],
        // set your toolbar
        'toolbar' =>  [
            [
                'content' =>
                    Html::a('<i class="bi bi-plus-square"></i>',['alumnos/create'], [
                        'class' => 'btn btn-outline-info',/* border-white */
                        'title' => Yii::t('kvgrid', 'Agregar alumno'),
                        /* 'onclick' => 'alert("This should launch the book creation form.\n\nDisabled for this demo!");' */
                    ]) . ' '.
                    Html::a('<i class="bi bi-cloud-arrow-up-fill"></i>', ['alumnos/import-data-from-excel'], [
                        'class' => 'btn btn-outline-success',/* border-white */
                        'title'=>Yii::t('kvgrid', 'Importar datos de excel'),
                        'data-pjax' => 0, 
                    ]) . ' ' .
                    Html::a('<i class="bi bi-arrow-clockwise"></i>', ['alumnos/index'], [
                        'class' => 'btn btn-outline-secondary',
                        'title'=>Yii::t('kvgrid', 'Actualizar Grid'),
                        'data-pjax' => 0, 
                    ]), 
                'options' => ['class' => 'btn-group mr-2 me-2']
            ],
            /* NO FUNCIONA EL MOSTRAR TODO POR QUE ESTA LIMITADO LA CANTIDAD DE REGISTROS QUE SE DEVUELVE EN EL SEARCH DE ALUMNOS POR EL PAGINATION SIZE */
            '{toggleData}',
        ],
        'toggleDataContainer' => ['class' => 'btn-group mr-2 me-2'],
        'persistResize' => false,
        'toggleDataOptions' => ['minCount' => 10],
        'itemLabelSingle' => 'alumno',
        'itemLabelPlural' => 'alumnos',

        'pageSummaryContainer' => ['class' => 'kv-page-summary-container'],
        
        'responsive' => false,
        'bordered' => true,
        'striped' => true,
        'condensed' => false,
        'hover' => true,

    ]); ?>
</div>
