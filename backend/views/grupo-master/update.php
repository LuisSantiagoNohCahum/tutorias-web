<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\GrupoMaster $model */

$this->title = 'Update Grupo Master: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Grupo Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="grupo-master-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
