<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\PeriodoEscolar $model */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Ciclos Escolares', 'url' => ['ciclo-escolar/index']];
$this->params['breadcrumbs'][] = ['label' => 'Ver Ciclo', 'url' => ['ciclo-escolar/view', 'id'=>$model->id_ciclo]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="border rounded">
    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Información del periodo escolar</p>
    </div>
    <div class="periodo-escolar-view m-3">

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
                'nombre',
                [
                    'attribute'=> 'id_estatus',
                    'value' => $model->estatus->nombre
                ],
                'letra_periodo',
                'date_start',
                'date_end',
                [
                    'attribute'=>'id_ciclo',
                    'value'=>$model->ciclo->nombre
                ],
                'created_at',
                'updated_at',
            ],
        ]) ?>

    </div>
</div>
