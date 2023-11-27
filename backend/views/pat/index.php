<?php

use app\models\Pat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\PatSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'SEGUIMIENTO DE PLAN DE ACCIÓN TUTORIAL (PAT)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="bi bi-file-earmark-text-fill"></i> CREAR NUEVO FORMATO', ['create'], ['class' => 'btn btn-outline-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if (Yii::$app->session->hasFlash('err')) { ?>
        <div class="alert alert-danger" role="alert">
            <b><?= Yii::$app->session->getFlash('err') ?></b>
        </div>
    <?php } ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=> 'id_semestre',
                'format'=>'html',
                'content' => function ($model) {
                    return Html::tag('span', $model->semestre->nombre);
                },
            ],
            'nombre',
            'descripcion:ntext',
            [
                'attribute'=> 'estatus',
                'format'=>'html',
                'content' => function ($model) {
                    return ($model->estatus != 0) ? Html::tag('span', 'ACTIVO', ['class'=>'font-weight-bold text-success text-uppercase p-2 w-75']) : Html::tag('span', 'INACTIVO', ['class'=>'font-weight-bold text-danger text-uppercase p-2']);
                },
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
