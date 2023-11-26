<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Alumno $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="alumno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'matricula')->textInput() ?>
    
    <?= $form->field($model, 'nombres')->textInput() ?>

    <?= $form->field($model, 'apellidop')->textInput() ?>

    <?= $form->field($model, 'apellidom')->textInput() ?>

    <?= $form->field($model, 'correo')->textInput() ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'fecha_nac')->textInput() ?>

    <?= $form->field($model, 'ciudad')->textInput() ?>

    <?= $form->field($model, 'genero')->dropDownList($model->getGenero(), ['prompt'=> 'Select...', 'class'=> 'form-control form-control-md']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
