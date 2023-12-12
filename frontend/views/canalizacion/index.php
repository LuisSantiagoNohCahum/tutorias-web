<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\GrupoMaster $modelGrupo */
/** @var backend\models\search\CanalizacionSearch $searchModelCanalizacion */
/** @var yii\data\ActiveDataProvider $dataProviderCanalizacion */

$this->title = 'ALUMNOS CONTACTADOS';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<h4><?= Html::encode($this->title) ?></h4>
<hr class="dropdown-divider">

<?= DetailView::widget([
    'model' => $modelGrupo,
    'bootstrap' => true,
    'bordered' => false,
    'striped' => false,
    'options' => [
        'class' => 'table table-sm table-light border table-hover table-bordered table-borderless table-condensed mt-2', //mb-2 
    ],
    'labelColOptions' => [
        'class' => 'bg-ligth text-left text-uppercase',
        'style' => 'background-color: #e9e9e9; font-size: smaller;'
    ],
    'mode' => 'view',
    'enableEditMode' => false,
    'container' => ['id' => 'kv-demo'],
    'panel' => [
        'type' => DetailView::TYPE_LIGHT,
        'heading' => '<h6 class="panel-title mb-0"><i class="fas fa-users"></i> INFORMACIÓN DEL GRUPO</h6>',
        'headingOptions' => [
            'style' => 'font-size: small !important; margin:0; padding: 0.5rem 1.25rem;'
        ],
        'before' => false
    ],
    'attributes' => [
        [
            //cambiar el widget al de kartik
            'attribute' => 'id_periodo',
            'format' => 'html',
            'value' => '<b>' . $modelGrupo->periodo->nombre . '</b>',
        ],
        [
            //cambiar el widget al de kartik
            'attribute' => 'id_tutor',
            'format' => 'html',
            'value' => ($modelGrupo->id_tutor != null) ? Html::tag('span', $modelGrupo->tutor->nombre . ' ' . $modelGrupo->tutor->apellido, ['class' => 'text-bold']) : Html::tag('span', "SIN ASIGNAR", ['class' => 'text-danger font-weight-bold'])

        ],
        [
            //cambiar el widget al de kartik
            'attribute' => 'id_carrera',
            'format' => 'html',
            'value' => '<b>' . $modelGrupo->carrera->nombre . '</b>',
        ],
        [
            //cambiar el widget al de kartik
            'attribute' => 'id_semestre',
            'format' => 'html',
            'value' => '<b>' . $modelGrupo->semestre->nombre . '</b>',
        ],
        [
            //cambiar el widget al de kartik
            'attribute' => 'id_grupoLetra',
            'format' => 'html',
            'value' => '<b>' . $modelGrupo->grupoLetra->letra_key . '</b>',
        ],

    ],
]) ?>

<hr class="dropdown-divider">

<?= GridView::widget([
    'dataProvider' => $dataProviderCanalizacion,
    'id' => 'diagnostico-grid',
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'hover' => true,
    'options' => [
        'class' => 'table table-sm'
    ],
    'layout' => '{summary}{items}{pager}', //tamplate grid - summary - tabla de datos - paginador [adicional {sorter}{errors}]
    'summary' => 'Mostrando <b>{begin}</b> - <b>{end}</b> de <b>{totalCount}</b> alumnos', //summaryOptions to add css class
    'itemLabelSingle' => 'alumno',
    'itemLabelPlural' => 'alumnos',
    'panel' => [
        'type' => GridView::TYPE_LIGHT,
        'heading' => '<h6 class="panel-title mb-0"><i class="fas fa-user-friends"></i> ALUMNOS CANALIZADOS</h6>',
        'headingOptions' => [
            'style' => 'font-size: small !important; margin:0; padding: 0.5rem 1.25rem;'
        ],
        'footer' => false,
    ],
    'toolbar' =>  [],
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;;text-align:center;'],
        ],
        [
            'attribute' => 'matricula',
            'hAlign' => 'center',
            'vAlign' => 'middle',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;;text-align:center;'],
            'content' => function ($model) {
                return '<b>' . $model->alumno->matricula . '</b>';
            }
        ],
        [
            'attribute' => 'id_alumno',
            'vAlign' => 'middle',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;;text-align:center;'],
            'content' => function ($model) {
                return $model->alumno->apellidop . ' ' . $model->alumno->apellidom . ' ' . $model->alumno->nombres;
            }
        ],
        [
            'attribute' => 'estatus',
            'hAlign' => 'center',
            'vAlign' => 'middle',
            'format' => 'html',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;;text-align:center;'],
            'content' => function ($model) {
                return ($model->estatus != 0)?'<span class="text-success"><b>CANALIZADO</b></span>':'<span class="text-danger"><b>NO CANALIZADO</b></span>';
            }
        ],
        [
            'attribute' => 'asunto',
            'width' => '20%',
            'format' => 'html',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;;text-align:center;'],
        ],
        [
            'attribute' => 'cuerpo',
            'width' => '30%',
            'format' => 'html',
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;;text-align:center;'],
        ],
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id, 'id_grupo' => Yii::$app->request->get('id_grupo')]);
            },
            'headerOptions' => ['class' => 'cell-data-tittle-nowidth', 'style' => 'font-size:small !important;;text-align:center;'],
        ],
    ],
]); ?>