<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PeriodoEscolar $model */

$this->title = 'Update Periodo Escolar: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Periodo Escolars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="periodo-escolar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
