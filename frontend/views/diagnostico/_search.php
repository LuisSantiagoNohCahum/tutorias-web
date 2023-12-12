<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\search\DiagnosticoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="diagnostico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_alumno') ?>

    <?= $form->field($model, 'motivo') ?>

    <?= $form->field($model, 'asignaturas') ?>

    <?= $form->field($model, 'otro') ?>

    <?php // echo $form->field($model, 'especifique') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
