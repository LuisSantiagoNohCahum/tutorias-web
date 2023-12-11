<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SemanaReal $model */

$this->title = 'Actualizar Semana Real: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Grupos Activos', 'url' => ['/grupo-master/index']];
$this->params['breadcrumbs'][] = ['label' => 'VER GRUPO', 'url' => ['/grupo-master/view', 'id'=>$model->id_grupomaster]];
$this->params['breadcrumbs'][] = ['label' => 'ADMINISTRAR PAT', 'url' => ['pat/admin-pat', 'id_grupo'=>$model->id_grupomaster]];
//$this->params['breadcrumbs'][] = ['label' => 'Semana Reals', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar Semana Real';
?>
<div class="semana-real-update border rounded">

    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para actualizar información de semana real</p>
    </div>

    <?= $this->render('_form', [
        'es_grupal'=>$es_grupal,
        'model' => $model,
    ]) ?>

</div>
