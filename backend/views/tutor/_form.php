<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tutor $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tutor-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-row">
        <div class="col-md-6">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder'=> 'Nombre completo']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'apellido')->textInput(['maxlength' => true, 'placeholder'=> 'Apellidos']) ?>
        </div>
    </div>
    
    <div class="form-row">
        <div class="col-md-4">
            <?= $form->field($model, 'correo')->textInput(['maxlength' => true, 'placeholder'=> 'Correo electronico institucinal']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'telefono')->textInput(['maxlength' => true, 'placeholder'=> 'No. Telefono / Celular']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'genero')->dropDownList($model->getGenero(), ['prompt'=> 'Select...', 'class'=> 'form-control form-control-md']) ?>
        </div>
    </div>

    <!-- <?= $form->field($model, 'id_user')->textInput() ?> -->

    <!-- No servia el icono con el li -->
    <div class="form-group">
        <div class="col-md-3 p-0">
            <?= Html::submitButton('
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5v-13Z"/>
                    <path d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5V16Zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V0ZM9 1h2v4H9V1Z"/>
                </svg> Guardar', 
                ['class' => 'btn btn-success w-100']) 
            ?>
        </div>
        
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
