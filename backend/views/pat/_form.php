<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pat $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_semestre')->dropDownList($model->getSemestreList(), ['prompt'=> 'Select...', 'class'=> 'form-control form-control-md'])->label('Semestre') ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'estatus')->dropDownList($model->getEstatusList(), ['prompt'=> 'Select...', 'class'=> 'form-control form-control-md'])->label('Semestre') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
