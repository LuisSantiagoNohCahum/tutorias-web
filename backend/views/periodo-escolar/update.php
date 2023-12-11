<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PeriodoEscolar $model */

$this->title = 'Actualizar Periodo Escolar: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ciclos Escolares', 'url' => ['ciclo-escolar/index']];
$this->params['breadcrumbs'][] = ['label' => 'Ver Ciclo', 'url' => ['ciclo-escolar/view', 'id'=>$model->id_ciclo]];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar Periodo';
?>
<div class="periodo-escolar-update border rounded">

    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para actualizar información del periodo escolar</p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
