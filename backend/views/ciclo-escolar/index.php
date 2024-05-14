<?php

use app\models\CicloEscolar;
use app\models\Estatus;
use PhpOffice\PhpSpreadsheet\Calculation\Information\Value;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\models\search\CicloEscolarSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ciclo Escolar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciclo-escolar-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'bordered'=>false,
        'striped'=>false,
        'condensed'=>false,
        'hover'=>true,
        'options' => [
            'class'=>'table table-md'
        ],
        'panel' => [
            'type' => GridView::TYPE_LIGHT,
            'heading' => '<h6 class="panel-title mb-0">CICLOS ESCOLARES</h6>',
            'headingOptions'=>[
                'style'=>'font-size: small !important; margin:0; padding: 0.5rem 1.25rem;'
            ],
            'footer' => '',
        ],
        'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'],
        'toolbar' =>  [
            'content' =>
                Html::a('<i class="fas fa-plus"></i> Añadir', ['/ciclo-escolar/create'], [
                    'class' => 'btn-export btn-sm-export btn-action-basics mr-2',
                    ])
        ],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'filterOptions'=>[
                    'class' => 'cell-data-tittle-nowidth p-2', 'style' => 'font-size:small !important;'
                ],
                'headerOptions' => ['class' => 'cell-data-tittle-nowidth p-2', 'style' => 'font-size:small !important;'],
            ],

            //'id',
            [
                'attribute' => 'nombre',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-md',
                    'placeholder' => 'Buscar...',
                ],
                'filterOptions'=>[
                    'class' => 'cell-data-tittle-nowidth p-2', 'style' => 'font-size:small !important;'
                ],
                'headerOptions' => ['class' => 'cell-data-tittle-nowidth p-2', 'style' => 'font-size:small !important;'],
                
            ],
            [
                'attribute' => 'fecha_inicial',
                //'format' => ['date'],
                //'value'=> solo para el valor real final con tipo de dato que se va a mostrar en le celda
                //'content' => contenido que podemos darle formato para mostrar en la celda
                'content'=> function ($model) {
                    date_default_timezone_set(date_default_timezone_get());
                    setlocale(LC_TIME, 'es_MXN.UTF-8','esp');
                    $date = strtotime($model->fecha_inicial);
                    return '<i class="bi bi-calendar2-check-fill"></i> ' . strftime('%e de %B de %Y', $date);
                },
                'filterInputOptions' => [
                    'class' => 'form-control form-control-md',
                    'placeholder' => 'Buscar...',
                ],
                'filterOptions'=>[
                    'class' => 'cell-data-tittle-nowidth p-2', 'style' => 'font-size:small !important;'
                ],
                'headerOptions' => ['class' => 'cell-data-tittle-nowidth p-2', 'style' => 'font-size:small !important;'],
                
            ],
            [
                'attribute' => 'fecha_final',
                //'format' => ['date'],
                //'value'=> solo para el valor real final con tipo de dato que se va a mostrar en le celda
                //'content' => contenido que podemos darle formato para mostrar en la celda

                'content'=> function ($model) {
                    date_default_timezone_set(date_default_timezone_get());
                    setlocale(LC_TIME, 'es_MXN.UTF-8','esp');
                    $date = strtotime($model->fecha_final);
                    return '<i class="bi bi-calendar2-x-fill"></i> ' . strftime('%e de %B de %Y', $date);
                },
                'filterInputOptions' => [
                    'class' => 'form-control form-control-md',
                    'placeholder' => 'Buscar...',
                ],
                'filterOptions'=>[
                    'class' => 'cell-data-tittle-nowidth p-2', 'style' => 'font-size:small !important;'
                ],
                'headerOptions' => ['class' => 'cell-data-tittle-nowidth p-2', 'style' => 'font-size:small !important;'],
                
            ],
            [
                'attribute' => 'id_estatus',
                'width'  => '15%',
                'content'=> function ($model){
                    return Html::tag('span', $model->estatus->nombre, ['class'=> str_contains($model->estatus->nombre, "Act") ? 'badge badge-success text-uppercase p-2' : 'badge badge-danger text-uppercase p-2']) ;
                },
                'vAlign' => 'middle',
                /* 'value'=> function ($model){
                    return $model->estatus->nombre;
                }, */
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(Estatus::find()->orderBy('nombre')->asArray()->all(), 'id', 'nombre'), 
                'filterInputOptions' => [
                    //'value'=> '1',
                    'class' => 'form-control form-control-md',
                    'placeholder' => 'Buscar...',
                ],
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterOptions'=>[
                    'class' => 'cell-data-tittle-nowidth p-2', 'style' => 'font-size:small !important;'
                ],
                'headerOptions' => ['class' => 'cell-data-tittle-nowidth p-2', 'style' => 'font-size:small !important;'],
                'format' => 'raw'
                
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CicloEscolar $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'headerOptions' => ['class' => 'cell-data-tittle-nowidth p-2', 'style' => 'font-size:small !important;'],
            ],
        ],
    ]); ?>


</div>
