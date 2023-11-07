<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\CicloEscolar $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ciclo-escolar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_inicial')->widget(DatePicker::className(), [
        'name' => 'dp_1',
        'type' => DatePicker::TYPE_INPUT,
        'value' => date('dd-mm-yyyy'),
        'options' => ['placeholder' => 'Fecha de inicio...', 'class'=> 'form-control-md'],
        'size' => 'sm',
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'orientation' => "bottom left",
            'language' => "es"
        ]
    ]) ?>

    <?= $form->field($model, 'fecha_final')->widget(DatePicker::className(), [
        'name' => 'dp_1',
        'type' => DatePicker::TYPE_INPUT,
        'value' => date('dd-mm-yyyy'),
        'options' => ['placeholder' => 'Fecha de finalizacion...', 'class'=> 'form-control-md'],
        'size' => 'sm',
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'orientation' => "bottom left",
            'language' => "es"
        ]
    ]) ?>

    <?= $form->field($model, 'id_estatus')->dropDownList($model->getEstatusList(), ['prompt'=> 'Select', 'class'=> 'form-control form-control-md']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
