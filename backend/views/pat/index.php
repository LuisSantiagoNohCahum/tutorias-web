<?php

use app\models\Pat;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\PatSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'SEGUIMIENTO DE PLAN DE ACCIÓN TUTORIAL (PAT)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pat-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if (Yii::$app->session->hasFlash('err')) { ?>
        <div class="alert alert-danger" role="alert">
            <b><?= Yii::$app->session->getFlash('err') ?></b>
        </div>
    <?php } ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
            'heading' => '<h6 class="panel-title mb-0">FORMATOS DEL PAT (SEGUIMIENTO DE PLAN DE ACCIÓN TUTORIAL)</h6>',
            'headingOptions'=>[
                'style'=>'font-size: small !important; margin:0; padding: 0.5rem 1.25rem;'
            ],
            'footer' => false,
        ],
        'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'],
        'toolbar' =>  [
            'content' =>
                Html::a('<i class="fas fa-plus"></i> Añadir', ['/pat/create'], [
                    'class' => 'btn-export btn-sm-export btn-action-basics mr-2',
                    ])
        ],
        'headerRowOptions'=>[
            'class'=>'cell-data-tittle-nowidth p-2'
        ],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'filterOptions' =>[
                    'class'=>'cell-data-tittle-nowidth'
                ],
            ],
            [
                'attribute'=> 'id_semestre',
                'format'=>'html',
                'content' => function ($model) {
                    return Html::tag('span', $model->semestre->nombre);
                },
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                'filterOptions' =>[
                    'class'=>'cell-data-tittle-nowidth'
                ],
            ],
            [
                'attribute'=> 'nombre',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                'filterOptions' =>[
                    'class'=>'cell-data-tittle-nowidth'
                ],
            ],
            [
                'attribute'=> 'descripcion',
                'format'=>'html',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                'filterOptions' =>[
                    'class'=>'cell-data-tittle-nowidth'
                ],
            ],
            [
                'attribute'=> 'estatus',
                'format'=>'html',
                'content' => function ($model) {
                    return ($model->estatus != 0) ? Html::tag('span', 'ACTIVO', ['class'=>'font-weight-bold text-success text-uppercase p-2 w-75']) : Html::tag('span', 'INACTIVO', ['class'=>'font-weight-bold text-danger text-uppercase p-2']);
                },
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                'filterOptions' =>[
                    'class'=>'cell-data-tittle-nowidth'
                ],
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pat $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

<!-- Si ya existe un pat activo en ese semestre 
buscar con find y el semestre y estatus 1, si es diferente a null el res entonces lanzar una exepcion o simplemente redireccionar al index y poner el set flash, has flash y get flash con el nombre que establecimos para indicar que ya existe un registro  -->

</div>
