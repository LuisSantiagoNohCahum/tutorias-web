<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Evaluacion $model */

$this->title = 'Update Evaluacion: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Evaluacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="evaluacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
