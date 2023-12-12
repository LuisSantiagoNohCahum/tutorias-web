<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;
use kartik\file\FileInput;

/** @var yii\web\View $this */
/** @var app\models\Semana $model */
/** @var app\models\SemanaReal $modelSemanaReal */

$id_grupo = ($modelSemanaReal != null ) ? $modelSemanaReal->id_grupomaster : Yii::$app->request->get('id_grupo');

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'VER PAT', 'url' => ['/pat/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="semana-view">

    <!-- <h4 class="text-black-50"><i class="fas fa-calendar-plus"></i> <?= Html::encode($this->title) ?></h4> -->

    <hr class="dropdown-divider">

    <?= DetailView::widget([
        'model' => $model,
        'options' => [
            'class' => 'table table-sm'
        ],
        'mode' => 'view',
        'enableEditMode' => false,
        'container' => ['id' => 'kv-demo'],
        'striped' => false,
        'bordered' => false,
        'hover' => true,
        'panel' => [
            'type' => DetailView::TYPE_LIGHT,
            'heading' => '<i class="fas fa-calendar-plus"></i> ' . Html::encode($this->title),

        ],
        'labelColOptions' => [
            'class' => 'cell-data-tittle pl-2 pr-2 text-uppercase',
        ],
        'valueColOptions' => [
            'class' => 'pl-2 pr-2',
        ],
        'attributes' => [
            'num_semana',
            [
                'attribute' => 'tipo_tutoria',
                'value' => ($model->tipo_tutoria != 0) ? 'INDIVIDUAL' : 'GRUPAL'
            ],
            'tematica:html',
            'objetivos:html',
            'justificacion:html',
            'estrategias_tutor:html',
            'acciones:html',
            'estrategias_tutorado:html',
            //'estrategias_tutorado:ntext', ntext - para textos extensos y salto de linea
        ],
    ]) ?>

    <!-- <h4 class="text-black-50 mt-3"><i class="fas fa-calendar-check"></i> RESULTADOS DE LA TUTORIA</h4> -->
    <hr class="dropdown-divider">

    <?php if ($modelSemanaReal != null) { ?>
        <?= DetailView::widget([
            'model' => $modelSemanaReal,
            'options' => [
                'class' => 'table table-sm'
            ],
            'mode' => 'view',
            'enableEditMode' => false,
            'container' => ['id' => 'kv-demo'],
            'striped' => false,
            'bordered' => false,
            'hover' => true,
            'panel' => [
                'type' => DetailView::TYPE_LIGHT,
                'heading' => '<i class="fas fa-calendar-check"></i> RESULTADOS DE LA TUTORIA',
                //'footer' => '',
            ],
            'labelColOptions' => [
                'class' => 'cell-data-tittle pl-2 pr-2 text-uppercase',
            ],
            'valueColOptions' => [
                'class' => 'pl-2 pr-2',
            ],
            'attributes' => [
                [
                    'attribute' => 'semana_atendida',
                    'value' => ($modelSemanaReal->semana_atendida != 0) ? 'SI' : 'NO',
                ],
                'alumnos_atendidos',
                'alumnos_faltantes',
                'total_alumnos',
                'atendidos_hombres',
                'atendidos_mujeres',
                'total_gatendidos',
                'observaciones:html',
                [
                    'attribute' => 'alumnos',
                    'format' => 'html',
                    'value' => $modelSemanaReal->alumnos,
                    'visible' => ($model->tipo_tutoria != 0) ? true : false
                ],
            ],
        ]) ?>

        <?php if (!empty($modelSemanaReal->evidencias) and isset($modelSemanaReal->evidencias)) {
            $uploadImages = explode(';', $modelSemanaReal->evidencias);
            $initialPreview = [];
            $initialPreviewConfig = [];

            foreach ($uploadImages as $img) {
                $baseNameImg = str_replace('../../uploads/', '', $img);
                $initialPreview[] = $img;
                $initialPreviewConfig[] = [
                    'caption' => $baseNameImg,
                    'size' => filesize($img),
                    'showRemove' => false,
                    'showDownload' => true,
                    'downloadUrl' => $img,
                    //'url' => Url::toRoute(['semana-real/delete-image', 'imgPath'=>$img, 'paths' => $model->evidencias]),
                    'url' => Url::toRoute(['semana-real/delete-image']),
                    'key' => $img
                ];
            }
        ?>
            <!-- <h5 class="text-black mt-3"><i class="fas fa-images"></i> EVIDENCIAS</h5> -->
            <hr class="dropdown-divider">
            <div class="card border-light">
                <div class="card-header ">
                    <div class="float-right float-end pull-right"><span class="kv-buttons-1"> </span></div>
                        <h5 class="m-0"><i class="fas fa-images"></i> EVIDENCIAS</h5>
                    <div class="clearfix"></div>
                </div>
                <?= FileInput::widget([
                    'disabled' => false,
                    'name' => 'attachment_3',
                    'options' => ['accept' => 'image/*', 'multiple' => true, 'id' => 'inputEvidencias'],
                    'class' => 'inputFile',
                    'pluginOptions' => [
                        'class' => 'inputFile',
                        'initialPreview' => $initialPreview,
                        'initialPreviewConfig' => $initialPreviewConfig,
                        'encodeUrl' => false,
                        'initialPreviewAsData' => true,
                        'overwriteInitial' => false, // Evitar el duplicado de evidencias
                        'showUpload' => false,
                        'showRemove' => false,
                        'showBrowse' => false,
                        'uploadUrl' => 'semana-real/index', //añadir url upload para que aparezcan los botones de eliminar
                        'maxFileCount' => 20,
                        'fileActionSettings' => [
                            'showUpload' => false,
                            'showRemove' => false,
                        ],

                    ],
                ]); ?>
            </div>
            
        <?php } ?>
    <?php } else { ?>
        <div class="alert alert-danger" role="alert">
            <b>Aun no se ha registrado los resultados de la tutoria de esta semana!</b>
        </div>
    <?php } ?>
    <!-- en view o meter en una accion similar a view pero requerira de otro boton -->
    <!-- Agregar boton para añadir semana real aca - mostrar la misma tabla que en details -->
    <!-- Si ya registro semana real entonces ya deshabilita el boton -->


    <!-- Servira para mostrar los detalles de la semana y semana real pero con un buen formato - a lo mejor se dejara el detail view de view semana -->
</div>