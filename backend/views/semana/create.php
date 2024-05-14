<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Semana $model */

$this->title = 'Añadir Semana';
$this->params['breadcrumbs'][] = ['label' => 'Formatos Del PAT', 'url' => ['pat/index']];
$this->params['breadcrumbs'][] = ['label' => 'Formato Del PAT', 'url' => ['pat/view', 'id'=>$model->id_pat]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semana-create border rounded">

    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para el registro de nueva semana</p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
