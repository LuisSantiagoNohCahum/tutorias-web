<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Pat $model */
/** @var backend\models\search\SemanaSearch $searchModelSemanas */
/** @var yii\data\ActiveDataProvider $dataProviderSemanas */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Fomatos Del PAT', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="border rounded">
    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Información del formato del PAT</p>
    </div>
    <div class="pat-view m-3">

        <p>
            <?= Html::a('<i class="bi bi-calendar-week"></i> Añadir semana', ['/semana/create', 'id_pat'=>$model->id], ['class' => 'btn-export btn-sm-export btn-action-basics']) ?>
        </p>
        <!-- <hr class="dropdown-divider"> -->
        <!--     <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Esta seguro de eliminar este elemento??',
                    'method' => 'post',
                ],
        ]) ?>
        </p> -->

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'attribute'=>'id_semestre',
                    'format'=>'html',
                    'value'=> $model->semestre->nombre
                ],
                'nombre',
                'descripcion:html',
                [
                    'attribute'=>'estatus',
                    'format'=>'html',
                    'value'=> ($model->estatus!=0)? 'ACTIVO': 'INACTIVO'
                ],
            ],
        ]) ?>

        <!-- Si su estatus es inactivo no mostrar boton de añadir semanas -->
        
        
        <hr class="dropdown-divider">

        <?php if (count($dataProviderSemanas->getModels())>0) {?>
            <?= GridView::widget([
            'dataProvider' => $dataProviderSemanas,
            'filterModel' => $searchModelSemanas,
            'bordered'=>false,
            'striped'=>false,
            'condensed'=>false,
            'hover'=>true,
            'tableOptions' => [
                'class'=>'table-custom table-md'
            ],
            'panel' => [
                'type' => GridView::TYPE_LIGHT,
                'heading' => '<h6 class="panel-title mb-0">SEMANAS PROGRAMADAS DEL PAT</h6>',
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
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'filterOptions' =>[
                        'class'=>'cell-data-tittle-nowidth'
                    ],
                ],
                [
                    'class' => 'kartik\grid\ExpandRowColumn',
                    'width' => '50px',
                    'value' => function ($model, $key, $index, $column) {
                        return GridView::ROW_COLLAPSED;
                    },
                    'detailUrl' => Url::to(['/semana/semana-detail']),
                    'headerOptions' => ['class' => 'kartik-sheet-style'] ,
                    'expandOneOnly' => true,
                    'expandIcon' => '<i class="bi bi-plus-square"></i>',
                    'collapseIcon'=> '<i class="bi bi-dash-square"></i>',
                    'defaultHeaderState' => GridView::ROW_COLLAPSED,
                    'detailRowCssClass' => GridView::TYPE_LIGHT
                ],
                [
                    'attribute'=> 'nombre',
                    'format'=>'html',
                    'vAlign'=>'middle',
                    'hAlign'=>'center',
                    'content' => function($model){
                        return Html::tag('b',$model->nombre );
                    },
                    'filterInputOptions' => [
                        'class' => 'form-control form-control-sm',
                        'placeholder' => 'Buscar...',
                    ],
                    'filterOptions' =>[
                        'class'=>'cell-data-tittle-nowidth'
                    ],
                ],
                /* [
                    'attribute'=> 'tipo_tutoria',
                    'content' => function($model){
                        return ($model->tipo_tutoria != 0) ? 'INDIVIDUAL' : 'GRUPAL';
                    }
                ], */
                //'tematica:html',
                //'objetivos:html',
                //'justificacion:ntext',
                //'estrategias_tutor:ntext',
                //'acciones:ntext',
                //'estrategias_tutorado:ntext',
                //'id_pat',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, $model, $key, $index, $column) {
                        return Url::toRoute(['/semana/'.$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
        <?php } else {?>
            <div class="alert alert-danger" role="alert">
                <b>NO SE HA REGISTRADO NINGUNA SEMANA EN ESTE FORMATO PAT!</b>
            </div>
        <?php }?>


    </div>
</div>
