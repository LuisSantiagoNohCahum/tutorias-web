<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\SemanaReal $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Semana Reals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="semana-real-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_grupomaster',
            'id_semana',
            'semana_atendida',
            'alumnos_atendidos',
            'alumnos_faltantes',
            'total_alumnos',
            'atendidos_hombres',
            'atendidos_mujeres',
            'total_gatendidos',
            'evidencias:ntext',
            'observaciones:ntext',
            'alumnos:ntext',
        ],
    ]) ?>

</div>
