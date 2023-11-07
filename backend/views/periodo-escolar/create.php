<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PeriodoEscolar $model */

$this->title = 'Create Periodo Escolar';
$this->params['breadcrumbs'][] = ['label' => 'Periodo Escolars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodo-escolar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
