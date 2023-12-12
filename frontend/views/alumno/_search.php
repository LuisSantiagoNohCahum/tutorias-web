<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\search\AlumnoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="alumno-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombres') ?>

    <?= $form->field($model, 'apellidop') ?>

    <?= $form->field($model, 'apellidom') ?>

    <?= $form->field($model, 'matricula') ?>

    <?php // echo $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'fecha_nac') ?>

    <?php // echo $form->field($model, 'ciudad') ?>

    <?php // echo $form->field($model, 'genero') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'id_grupo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
