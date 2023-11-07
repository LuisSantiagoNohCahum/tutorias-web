<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Semestre $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="semestre-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder'=> 'Nombre del semestre']) ?>

    <?= $form->field($model, 'num_semestre')->dropDownList($model->getNumSemestre(), ['prompt'=> 'Select...', 'class'=> 'form-control form-control-md'])->label("Orden") ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
