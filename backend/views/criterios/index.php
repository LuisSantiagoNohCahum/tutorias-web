<?php

use app\models\Criterios;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\CriteriosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Criterios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="criterios-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            'heading' => '<h6 class="panel-title mb-0">CRITERIOS DE EVALUACIÓN</h6>',
            'headingOptions'=>[
                'style'=>'font-size: small !important; margin:0; padding: 0.5rem 1.25rem;'
            ],
            'footer' => false,
        ],
        'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'],
        'toolbar' =>  [
            'content' =>
                Html::a('<i class="fas fa-plus"></i> Añadir', ['/criterios/create'], [
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
                'attribute'=>'nombre',
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
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Criterios $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
