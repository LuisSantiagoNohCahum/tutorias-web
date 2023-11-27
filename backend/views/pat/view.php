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
$this->params['breadcrumbs'][] = ['label' => 'Pats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <hr class="dropdown-divider">
    <!--     <p>
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
            'descripcion:ntext',
            [
                'attribute'=>'estatus',
                'format'=>'html',
                'value'=> ($model->estatus!=0)? 'ACTIVO': 'INACTIVO'
            ],
        ],
    ]) ?>

    <!-- Si su estatus es inactivo no mostrar boton de añadir semanas -->
    <h3 class="text-black-50"><i class="bi bi-calendar-week"></i> Semanas</h3>
    
    <hr class="dropdown-divider">

    <?= Html::a('<i class="bi bi-calendar-week"></i> Añadir semana', ['/semana/create', 'id_pat'=>$model->id], ['class' => 'btn btn-primary mb-2']) ?>

    <?php if (count($dataProviderSemanas->getModels())>0) {?>
        <?= GridView::widget([
        'dataProvider' => $dataProviderSemanas,
        'filterModel' => $searchModelSemanas,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
                }
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
