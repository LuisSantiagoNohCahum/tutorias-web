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
<div class="ciclo-escolar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

    <?php if( strtoupper($model->estatus->nombre) == strtoupper("Activo") and count($model->periodoEscolars) < 2) : ?>
        <?= Html::a('<b>Crear periodo</b>', ['periodo-escolar/create', 'id_ciclo' => $model->id], ['class' => 'btn btn-success text-white']) ?>
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

    <h3 class="text-uppercase text-black-50"><?= Html::encode("Periodos escolares") ?></h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //'filterPosition'=>  GridView::FILTER_POS_HEADER,
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
            ],
            [
                'attribute' => 'letra_periodo',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
            ],
            [
                'attribute' => 'date_start',
                'format'=> ['date'],
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
            ],
            [
                'attribute' => 'date_end',
                'format'=> ['date'],
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
            ],
            [
                //'class' => 'yii\grid\ActionColumn',
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, PeriodoEscolar $model, $key, $index, $column) {
                    return Url::toRoute(['periodo-escolar/'.$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

<!-- mostrar grid view de los periodos creados -->
</div>
