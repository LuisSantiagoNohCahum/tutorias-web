<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SemanaReal $model */

$this->title = 'Update Semana Real: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Semana Reals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="semana-real-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'es_grupal'=>$es_grupal,
        'model' => $model,
    ]) ?>

</div>
