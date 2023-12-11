<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PeriodoEscolar $model */

$this->title = 'Añadir Periodo Escolar';
$this->params['breadcrumbs'][] = ['label' => 'Ciclos Escolares', 'url' => ['ciclo-escolar/index']];
$this->params['breadcrumbs'][] = ['label' => 'Ver Ciclo', 'url' => ['ciclo-escolar/view', 'id'=>$model->id_ciclo]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodo-escolar-create border rounded">
    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para el registro de nuevo periodo escolar</p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
