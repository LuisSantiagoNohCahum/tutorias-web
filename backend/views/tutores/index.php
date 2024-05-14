<?php

use app\models\Tutores;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;

use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\TutoresSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tutores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutores-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'nombre',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                
            ],
            [
                'attribute' => 'apellido',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                
            ],
            [
                'attribute' => 'correo',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                
            ],
            [
                'attribute' => 'telefono',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                
            ],
            [
                'attribute' => 'genero',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tutores $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
        'panel' => [
            'after' => '',
            'heading' => '<i class="fas fa-book"></i>  Tutores',
            'type' => 'primary',
            'before' => '<div style="padding-top: 7px;"><em>* Lista de alumnos del grupo actual.</em></div>',
        ],
        // set your toolbar
        'toolbar' =>  [
            [
                'content' =>
                    Html::a('<i class="bi bi-plus-square"></i>',['tutores/create'], [
                        'class' => 'btn btn-outline-info',/* border-white */
                        'title' => Yii::t('kvgrid', 'Agregar alumno'),
                        /* 'onclick' => 'alert("This should launch the book creation form.\n\nDisabled for this demo!");' */
                    ]) . ' '.
                    Html::a('<i class="bi bi-arrow-clockwise"></i>', ['tutores/index'], [
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
