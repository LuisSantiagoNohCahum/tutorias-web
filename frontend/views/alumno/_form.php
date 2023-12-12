<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Alumno $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="alumno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidop')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_nac')->textInput() ?>

    <?= $form->field($model, 'ciudad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genero')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'id_grupo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
