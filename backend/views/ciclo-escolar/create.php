<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CicloEscolar $model */

$this->title = 'Añadir Ciclo Escolar';
$this->params['breadcrumbs'][] = ['label' => 'Ciclos Escolares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciclo-escolar-create rounded border">
    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para el registro de nuevo ciclo escolar</p>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
