<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\SemanaReal $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'VER PAT', 'url' => ['/pat/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="border rounded">
    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Información de semana real</p>
    </div>
    <div class="semana-real-view m-3">
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
</div>
