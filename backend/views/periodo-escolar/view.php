<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\PeriodoEscolar $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Periodo Escolars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="periodo-escolar-view">

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
            'nombre',
            [
                'attribute'=> 'id_estatus',
                'value' => $model->estatus->nombre
            ],
            'letra_periodo',
            'date_start',
            'date_end',
            'id_ciclo',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
