<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\GrupoMaster $model */

$this->title = 'Crear Grupo';
$this->params['breadcrumbs'][] = ['label' => 'Grupos Activos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupo-master-create border rounded">
    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para el registro de nuevo grupo</p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
