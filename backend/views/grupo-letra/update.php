<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\GrupoLetra $model */

$this->title = 'Update Grupo Letra: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Grupo Letras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="grupo-letra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
