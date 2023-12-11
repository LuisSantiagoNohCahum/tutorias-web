<?php

use app\models\Carreras;
use app\models\Estatus;
use app\models\GrupoLetra;
use app\models\GrupoMaster;
use app\models\PeriodoEscolar;
use app\models\Semestre;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\models\search\GrupoMasterSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Grupos Activos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupo-master-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- SOLO SE DEBEN FILTRAR Y MOSTRAR EN EL GRID LOS GRUPOS ACTIVOS DE PERIODOS ACTIVOS QUE ESTEN EN CICLOS ACTIVOS, LOS DEMAS NO - OPCIONALMENTE SE PODRIA PONER UN BOTON POARA MOSTRAR TODO O ALGO ASI -->
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
            'heading' => '<h6 class="panel-title mb-0">GRUPOS ACTIVOS</h6>',
            'headingOptions'=>[
                'style'=>'font-size: small !important; margin:0; padding: 0.5rem 1.25rem;'
            ],
            'footer' => false,
        ],
        'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'],
        'toolbar' =>  [
            'content' =>
                Html::a('<i class="fas fa-plus"></i> Añadir', ['/grupo-master/create'], [
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
                'attribute'=> 'id_periodo',
                'content' => function ($model) {
                    return Html::tag('span', $model->periodo->nombre);
                },

                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(PeriodoEscolar::find()->where(['id_estatus'=>'1'])->orderBy('nombre')->asArray()->all(), 'id', 'nombre'),
                'filterInputOptions' => [
                    //'value'=> '1', -> por defecto filtra por el id del ciclo actual 
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
            ],
            [
                'attribute'=> 'id_carrera',
                'content' => function ($model) {
                    return Html::tag('span', $model->carrera->nombre);
                },

                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(Carreras::find()->orderBy('nombre')->asArray()->all(), 'id', 'nombre'),
                'filterInputOptions' => [
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
            ],
            [
                'attribute'=> 'id_semestre',
                'content' => function ($model) {
                    return Html::tag('span', $model->semestre->nombre);
                },

                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(Semestre::find()->Where(['num_semestre'=>[1,2,3,4,5,6,7,8,9,10,11,12]])->orderBy('nombre')->asArray()->all(), 'id', 'nombre'),
                'filterInputOptions' => [
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
            ],
            [
                'attribute'=> 'id_grupoLetra',
                'content' => function ($model) {
                    return Html::tag('span', $model->grupoLetra->letra_key);
                },
                'width'  => '15%',

                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(GrupoLetra::find()->orderBy('letra_key')->asArray()->all(), 'id', 'letra_key'),
                'filterInputOptions' => [
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
            ],
            [
                'attribute'=> 'id_tutor',
                'format'=> 'html',
                /* 'value'=> function ($model) {
                    //redirigir al erfil del tutor
                    return Html::a('', ['',]);
                }, */
                'content' => function ($model) {   
                    return ($model->id_tutor != null) ? Html::tag('span', $model->tutor->nombre . ' '. $model->tutor->apellido, ['class'=> 'text-bold']) : Html::tag('span', "SIN ASIGNAR", ['class'=> 'text-danger font-weight-bold']);
                },
                'filterInputOptions' => [
                    'class' => 'form-control form-control-md disabled',
                    'placeholder' => 'Buscar...',
                    //'readonly'=>'readonly'
                ],
                'filterOptions'=>[
                    'class' => 'cell-data-tittle-nowidth p-2', 'style' => 'font-size:small !important;'
                ],
                'headerOptions' => ['class' => 'cell-data-tittle-nowidth p-2', 'style' => 'font-size:small !important;'],
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, GrupoMaster $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'headerOptions' => ['class' => 'cell-data-tittle-nowidth p-2', 'style' => 'font-size:small !important;'],
            ],
        ],
    ]); ?>


</div>
