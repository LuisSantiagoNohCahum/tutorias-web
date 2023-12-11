<?php

use app\models\Semestre;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\SemestreSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Semestres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semestre-index">

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
            'heading' => '<h6 class="panel-title mb-0">SEMESTRES</h6>',
            'headingOptions'=>[
                'style'=>'font-size: small !important; margin:0; padding: 0.5rem 1.25rem;'
            ],
            'footer' => false,
        ],
        'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'],
        'toolbar' =>  [
            'content' =>
                Html::a('<i class="fas fa-plus"></i> Añadir', ['/semestre/create'], [
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
                'filterOptions' =>[
                    'class'=>'cell-data-tittle-nowidth'
                ],
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
            ],
            [
                'attribute'=>'num_semestre',
                'filterOptions' =>[
                    'class'=>'cell-data-tittle-nowidth'
                ],
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Semestre $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
