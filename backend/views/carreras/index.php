<?php

use app\models\Carreras;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
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
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Carreras $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
        'panel' => [
            'after' => '',
            'heading' => '<i class="fas fa-book"></i>  Carreras',
            'type' => 'primary',
            'before' => '<div style="padding-top: 7px;"><em>* Lista de carreras.</em></div>',
        ],
        'toolbar' =>  [
            [
                'content' =>
                    Html::a('<i class="bi bi-plus-square"></i>',['carrera/create'], [
                        'class' => 'btn btn-outline-info',/* border-white */
                        'title' => Yii::t('kvgrid', 'Agregar Carrera'),
                        /* 'onclick' => 'alert("This should launch the book creation form.\n\nDisabled for this demo!");' */
                    ]) . ' '.
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
        'itemLabelSingle' => 'carrera',
        'itemLabelPlural' => 'carreras',

        'pageSummaryContainer' => ['class' => 'kv-page-summary-container'],
        
        'responsive' => false,
        'bordered' => true,
        'striped' => true,
        'condensed' => false,
        'hover' => true,
    ]); ?>


</div>
