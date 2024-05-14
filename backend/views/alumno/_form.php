<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Alumno $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="alumno-form m-3">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-row">
        <div class="col-md-4">
            <?= $form->field($model, 'matricula')->textInput(['placeholder'=>'No. Matricula']) ?>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4">
            <?= $form->field($model, 'nombres')->textInput(['placeholder'=>'Nombres']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'apellidop')->textInput(['placeholder'=>'Apellido Paterno']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'apellidom')->textInput(['placeholder'=>'Apellido Materno']) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-4">
            <?= $form->field($model, 'correo')->textInput(['type' => 'email', 'placeholder'=>'Correo electrónico']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'telefono')->textInput(['placeholder'=>'No. teléfono']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'fecha_nac')->widget(DatePicker::className(), [
                'name' => 'dp_1',
                'type' => DatePicker::TYPE_INPUT,
                'value' => date('dd-mm-yyyy'),
                'options' => ['placeholder' => 'Fecha de nacimiento...', 'class' => 'form-control-md'],
                'size' => 'sm',
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                    'orientation' => "bottom left",
                    'language' => "es"
                ]
            ]) ?>
        </div>
    </div>



    <div class="form-row">
        <div class="col-md-8">
            <?= $form->field($model, 'ciudad')->textInput(['placeholder'=>'Ciudad']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'genero')->dropDownList($model->getGenero(), ['prompt' => 'Select...', 'class' => 'form-control form-control-md']) ?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-save"></i> Guardar registro', ['class' => 'btn btn-outline-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>