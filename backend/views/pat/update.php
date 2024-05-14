<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pat $model */

$this->title = 'Actualizar Formato del PAT: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fomatos Del PAT', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar Formato PAT';
?>
<div class="pat-update border rounded">

    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para actualizar información de formato del PAT</p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
