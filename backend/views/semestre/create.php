<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Semestre $model */

$this->title = 'Añadir Semestre';
$this->params['breadcrumbs'][] = ['label' => 'Semestres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semestre-create border rounded">
    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para el registro de nuevo semestre</p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
