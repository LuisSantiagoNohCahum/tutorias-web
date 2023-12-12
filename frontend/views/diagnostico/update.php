<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Diagnostico $model */
$this->title = 'Actualizar Diagnóstico: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'VER DIAGNOSTICO', 'url' => ['/diagnostico/index']];
$this->params['breadcrumbs'][] = 'Actualizar Diagnostico';
?>
<div class="diagnostico-update border rounded">

    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para actualizar información de diagnóstico</p>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
