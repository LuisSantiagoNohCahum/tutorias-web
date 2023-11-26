<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\GrupoLetra $model */

$this->title = 'Create Grupo Letra';
$this->params['breadcrumbs'][] = ['label' => 'Grupo Letras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupo-letra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
