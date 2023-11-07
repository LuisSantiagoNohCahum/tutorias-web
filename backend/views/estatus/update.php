<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Estatus $model */

$this->title = 'Update Estatus: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Estatuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estatus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
