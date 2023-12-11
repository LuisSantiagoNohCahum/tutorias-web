<?php

use app\models\Carreras;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\CarrerasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Carreras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carreras-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class'=>'table-custom table-md'
        ],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'filterOptions'=>[
                    'class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;'
                ],
                'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;'],
            ],

            [
                'attribute' => 'nombre',
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
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Carreras $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;'],
            ],
        ],
        'panel' => [
            'type' => GridView::TYPE_LIGHT,
            'heading' => '<h6 class="panel-title mb-0">CARRERAS</h6>',
            'headingOptions'=>[
                'style'=>'font-size: small !important; margin:0; padding: 0.5rem 1.25rem;'
            ],
            'footer' => false,
        ],
        'toolbar' =>  [
            [
                'content' =>
                    Html::a('<i class="fas fa-plus"></i> Añadir',['carreras/create'], [
                        'class' => 'btn-export btn-sm-export btn-action-basics mr-2',/* border-white */
                        //'title' => Yii::t('kvgrid', 'Agregar Carrera'),
                        'title' => 'Agregar Carrera',
                    ]),
                //'options' => ['class' => 'btn-group mr-2 me-2']
            ],
            /* NO FUNCIONA EL MOSTRAR TODO POR QUE ESTA LIMITADO LA CANTIDAD DE REGISTROS QUE SE DEVUELVE EN EL SEARCH DE ALUMNOS POR EL PAGINATION SIZE */
            /* '{toggleData}', */
        ],
        'toggleDataContainer' => ['class' => 'btn-group mr-2 me-2'],
        'persistResize' => false,
        'toggleDataOptions' => ['minCount' => 10],
        'itemLabelSingle' => 'carrera',
        'itemLabelPlural' => 'carreras',
        'pageSummaryContainer' => ['class' => 'kv-page-summary-container'],
        'responsive' => false,
        'bordered' => false,
        'striped' => false,
        'condensed' => false,
        'hover' => true,
    ]); ?>


</div>
