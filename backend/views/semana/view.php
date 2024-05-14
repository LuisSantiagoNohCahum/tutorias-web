<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Semana $model */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Formatos Del PAT', 'url' => ['pat/index']];
$this->params['breadcrumbs'][] = ['label' => 'Formato Del PAT', 'url' => ['pat/view', 'id'=>$model->id_pat]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="border rounded">
    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Información de semana</p>
    </div>

    <div class="semana-view m-3">
<!-- 
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Esta seguro de eliminar este elemento??',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
 -->
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'nombre',
                'num_semana',
                [
                    'attribute'=>'tipo_tutoria',
                    'value'=> ($model->tipo_tutoria != 0) ? 'INDIVIDUAL' : 'GRUPAL'
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

    <!-- en view o meter en una accion similar a view pero requerira de otro boton -->
    <!-- Agregar boton para añadir semana real aca - mostrar la misma tabla que en details -->
    <!-- Si ya registro semana real entonces ya deshabilita el boton -->

    </div>
</div>
