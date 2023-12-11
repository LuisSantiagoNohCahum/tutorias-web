<?php

use app\models\PeriodoEscolar;
use PhpOffice\PhpSpreadsheet\Calculation\Information\Value;
use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\CicloEscolar $model */
/** @var backend\models\search\PeriodoEscolarSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Ciclos Escolares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="border rounded">
    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Información del ciclo escolar</p>
    </div>
    <div class="ciclo-escolar-view m-3">

        <p>
            <?php if( strtoupper($model->estatus->nombre) == strtoupper("Activo") and count($model->periodoEscolars) < 2) : ?>
                <?= Html::a('<b><i class="fas fa-plus"></i> Añadir periodo escolar</b>', ['periodo-escolar/create', 'id_ciclo' => $model->id], ['class' => 'btn-export btn-sm-export btn-action-basics']) ?>
            <?php endif?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nombre',
                'fecha_inicial',
                'fecha_final',
                [
                    'attribute'=> 'id_estatus',
                    'value' => $model->estatus->nombre
                ]
            ],
        ]) ?>

        <hr class="dropdown-divider">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'bordered'=>false,
            'striped'=>false,
            'condensed'=>false,
            'hover'=>true,
            'tableOptions' => [
                'class'=>'table-custom table-md'
            ],
            'panel' => [
                'type' => GridView::TYPE_LIGHT,
                'heading' => '<h6 class="panel-title mb-0">PERIODOS ESCOLARES</h6>',
                'headingOptions'=>[
                    'style'=>'font-size: small !important; margin:0; padding: 0.5rem 1.25rem;'
                ],
                'footer' => false,
            ],
            'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'],
            'toolbar' =>  [
                
            ],
            'headerRowOptions'=>[
                'class'=>'cell-data-tittle-nowidth p-2'
            ],
            //'filterPosition'=>  GridView::FILTER_POS_HEADER,
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'filterOptions' =>[
                        'class'=>'cell-data-tittle-nowidth'
                    ],
                ],
                [
                    'attribute' => 'nombre',
                    'filterInputOptions' => [
                        'class' => 'form-control form-control-sm',
                        'placeholder' => 'Buscar...',
                    ],
                    'filterOptions' =>[
                        'class'=>'cell-data-tittle-nowidth'
                    ],
                ],
                [
                    'attribute' => 'id_estatus',
                    'width'  => '15%',
                    'content'=> function ($model){
                        return Html::tag('span', $model->estatus->nombre, ['class'=> str_contains($model->estatus->nombre, "Act") ? 'badge badge-success text-uppercase p-2' : 'badge badge-danger text-uppercase p-2']) ;
                    },
                    'vAlign' => 'middle',
                    'filterInputOptions' => [
                        'class' => 'form-control form-control-sm',
                        'placeholder' => 'Buscar...',
                    ],
                    'filterOptions' =>[
                        'class'=>'cell-data-tittle-nowidth'
                    ],
                ],
                [
                    'attribute' => 'letra_periodo',
                    'filterInputOptions' => [
                        'class' => 'form-control form-control-sm',
                        'placeholder' => 'Buscar...',
                    ],
                    'filterOptions' =>[
                        'class'=>'cell-data-tittle-nowidth'
                    ],
                ],
                [
                    'attribute' => 'date_start',
                    'format'=> ['date'],
                    'filterInputOptions' => [
                        'class' => 'form-control form-control-sm',
                        'placeholder' => 'Buscar...',
                    ],
                    'filterOptions' =>[
                        'class'=>'cell-data-tittle-nowidth'
                    ],
                ],
                [
                    'attribute' => 'date_end',
                    'format'=> ['date'],
                    'filterInputOptions' => [
                        'class' => 'form-control form-control-sm',
                        'placeholder' => 'Buscar...',
                    ],
                    'filterOptions' =>[
                        'class'=>'cell-data-tittle-nowidth'
                    ],
                ],
                [
                    //'class' => 'yii\grid\ActionColumn',
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, PeriodoEscolar $model, $key, $index, $column) {
                        return Url::toRoute(['periodo-escolar/'.$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

    <!-- mostrar grid view de los periodos creados -->
    </div>
</div>