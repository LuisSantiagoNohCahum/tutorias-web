<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Canalizacion $model */
$this->title = 'Actualizar Contacto: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'VER CONTACTO', 'url' => ['/canalizacion/index']];
$this->params['breadcrumbs'][] = 'Actualizar Contacto';
?>
<div class="canalizacion-update border rounded">

    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para actualizar información de alumno contactado</p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>