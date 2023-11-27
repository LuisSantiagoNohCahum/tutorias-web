<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Semana $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Semanas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="semana-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
