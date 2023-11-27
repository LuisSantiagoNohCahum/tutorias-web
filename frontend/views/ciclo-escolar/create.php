<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CicloEscolar $model */

$this->title = 'Create Ciclo Escolar';
$this->params['breadcrumbs'][] = ['label' => 'Ciclo Escolars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciclo-escolar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
