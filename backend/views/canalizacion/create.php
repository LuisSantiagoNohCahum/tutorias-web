<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Canalizacion $model */

$this->title = 'Añadir Contacto';
$this->params['breadcrumbs'][] = ['label' => 'GRUPOS ACTIVOS', 'url' => ['/grupo-master/index']];
$this->params['breadcrumbs'][] = ['label' => 'VER GRUPO', 'url' => ['/grupo-master/view', 'id'=> $id_grupo]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="canalizacion-create border rounded">

    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para el registro de nuevo alumno contactado</p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
