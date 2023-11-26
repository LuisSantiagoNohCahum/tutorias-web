<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\GrupoMaster $model */

$this->title = 'Create Grupo Master';
$this->params['breadcrumbs'][] = ['label' => 'Grupo Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupo-master-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
