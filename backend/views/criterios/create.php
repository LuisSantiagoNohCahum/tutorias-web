<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Criterios $model */

$this->title = 'Añadir Criterio de evaluación';//añadir criterio al formato de evaluacion
$this->params['breadcrumbs'][] = ['label' => 'Criterios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="criterios-create border rounded">

    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para el registro de nuevo criterio de evaluación</p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
