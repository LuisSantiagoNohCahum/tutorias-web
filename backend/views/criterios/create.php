<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Criterios $model */

$this->title = 'Añadir Criterio de evaluación';//añadir criterio al formato de evaluacion
$this->params['breadcrumbs'][] = ['label' => 'Criterios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="criterios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
