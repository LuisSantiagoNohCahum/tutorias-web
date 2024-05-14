<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Semestre $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="semestre-form m-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder'=> 'Nombre del semestre']) ?>

    <?= $form->field($model, 'num_semestre')->dropDownList($model->getNumSemestre(), ['prompt'=> 'Seleccionar...', 'class'=> 'form-control form-control-md'])->label("Orden") ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-save"></i> Guardar registro', ['class' => 'btn btn-outline-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
