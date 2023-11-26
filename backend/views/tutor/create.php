<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tutor $model */

$this->title = 'Registrar Tutor';
$this->params['breadcrumbs'][] = ['label' => 'Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutor-create">
    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light">
        <h1 class="display-6 text-black-50 text-uppercase"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para el registro de nuevos Tutores</p>
    </div>
    <hr class="my-4">
    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
