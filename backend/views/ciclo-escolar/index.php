<?php

use app\models\CicloEscolar;
use app\models\Estatus;
use PhpOffice\PhpSpreadsheet\Calculation\Information\Value;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
/** @var yii\web\View $this */
/** @var backend\models\search\CicloEscolarSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ciclo Escolar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciclo-escolar-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Ciclo Escolar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'nombre',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-md',
                    'placeholder' => 'Buscar...',
                ],
                
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
                
                'format' => 'raw'
                
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CicloEscolar $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
