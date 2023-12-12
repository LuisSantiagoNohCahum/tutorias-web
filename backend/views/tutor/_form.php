<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tutor $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tutor-form m-3">

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
            <?= $form->field($model, 'genero')->dropDownList($model->getGenero(), ['prompt'=> 'Seleccionar...', 'class'=> 'form-control form-control-md']) ?>
        </div>
    </div>

    <!-- <?= $form->field($model, 'id_user')->textInput() ?> -->

    <!-- No servia el icono con el li -->
    <div class="form-group">
        <div class="col-md-3 p-0">
            <?= Html::submitButton('<i class="fas fa-save"></i> Guardar registro', 
                ['class' => 'btn btn-outline-success']) 
            ?>
        </div>
        
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
