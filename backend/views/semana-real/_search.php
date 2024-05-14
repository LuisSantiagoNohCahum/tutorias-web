<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\SemanaRealSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="semana-real-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_grupomaster') ?>

    <?= $form->field($model, 'id_semana') ?>

    <?= $form->field($model, 'semana_atendida') ?>

    <?= $form->field($model, 'alumnos_atendidos') ?>

    <?php // echo $form->field($model, 'alumnos_faltantes') ?>

    <?php // echo $form->field($model, 'total_alumnos') ?>

    <?php // echo $form->field($model, 'atendidos_hombres') ?>

    <?php // echo $form->field($model, 'atendidos_mujeres') ?>

    <?php // echo $form->field($model, 'total_gatendidos') ?>

    <?php // echo $form->field($model, 'evidencias') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'alumnos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
