<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CicloEscolar $model */

$this->title = 'Update Ciclo Escolar: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ciclo Escolars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ciclo-escolar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
