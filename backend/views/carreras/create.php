<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Carreras $model */

$this->title = 'Añadir Carrera';
$this->params['breadcrumbs'][] = ['label' => 'Carreras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carreras-create border rounded">

    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para el registro de carreras</p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
