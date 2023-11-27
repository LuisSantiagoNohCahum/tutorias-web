<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\GrupoMaster $modelGrupo */
/** @var app\models\Pat $modelPat */
/** @var backend\models\search\SemanaSearch $searchModelSemanas */
/** @var yii\data\ActiveDataProvider $dataProviderSemanas */

$this->title = ($modelPat != null) ? $modelPat->nombre : 'ADMINISTRAR PAT';
$this->params['breadcrumbs'][] = ['label' => 'Grupos Activos', 'url' => ['/grupo-master/index']];
$this->params['breadcrumbs'][] = ['label' => $modelGrupo->id, 'url' => ['/grupo-master/view', 'id'=>$modelGrupo->id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pat-view">

    <h4><?= Html::encode($this->title) ?></h4>

    <hr class="dropdown-divider">

    <?= DetailView::widget([
        'model' => $modelGrupo,
        'options'=>[
            'class'=>'table table-sm table-light table-hover table-bordered table-borderless table-condensed'
        ],
        'attributes' => [
            [
                //cambiar el widget al de kartik
                'attribute' => 'id_periodo',
                'format' => 'html',
                'value' => '<b>'.$modelGrupo->periodo->nombre.'</b>',
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
                'value' => '<b>'.$modelGrupo->carrera->nombre.'</b>',
            ],
            [
                //cambiar el widget al de kartik
                'attribute' => 'id_semestre',
                'format' => 'html',
                'value' => '<b>'.$modelGrupo->semestre->nombre.'</b>',
            ],
            [
                //cambiar el widget al de kartik
                'attribute' => 'id_grupoLetra',
                'format' => 'html',
                'value' => '<b>'.$modelGrupo->grupoLetra->letra_key.'</b>',
            ],
            
        ],
    ]) ?>

<!-- Espacio para descriocion que viene del pat - si no es null el campo y si model pat no es null igual -->

    <?php if ($modelPat == null) { ?>
        <div class="alert alert-danger" role="alert">
            <b>El administrador no ha configurado un PAT para este semestre!</b>
        </div>
    <?php } else {?>
        <?php if (count($dataProviderSemanas->getModels())>0) {?>
            <?= GridView::widget([
                'dataProvider' => $dataProviderSemanas,
                
                'options' => [
                    'class'=>'table table-sm'
                ],
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],
                    [
                        'class' => 'kartik\grid\ExpandRowColumn',
                        'width' => '50px',
                        'value' => function ($model, $key, $index, $column) {
                            return GridView::ROW_COLLAPSED;
                        },
                        'detailUrl' => Url::to(['/semana/detail-add-semana-real', 'id_grupo'=>$modelGrupo->id]),
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
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{view}',
                        'urlCreator' => function ($action, $model, $key, $index, $column) {
                            /* Modificar boton de view en este grid para que nos mande a otra accion */
                            if ($action=='view') return Url::toRoute(['/semana/view-add-semana', 'id' => $model->id]);

                            return Url::toRoute(['/semana/'.$action, 'id' => $model->id]);
                        },
                    ],
                ],
            ]); ?>
        <?php } else {?>
            <div class="alert alert-danger" role="alert">
                <b>NO SE HA REGISTRADO NINGUNA SEMANA EN ESTE FORMATO PAT!</b>
            </div>
        <?php }?>
    <?php }?>
</div>
