<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\PeriodoEscolar $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="periodo-escolar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder'=> 'Nombre del periodo escolar']) ?>

    <?= $form->field($model, 'id_estatus')->dropDownList($model->getEstatusList(), ['prompt'=> 'Select...', 'class'=> 'form-control form-control-md'])?>

    <?= $form->field($model, 'letra_periodo')->dropDownList($model->getCharPeriodList(), ['prompt'=> 'Select...', 'class'=> 'form-control form-control-md']) ?>

    <?= $form->field($model, 'date_start')->widget(DatePicker::className(), [
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

    <?= $form->field($model, 'date_end')->widget(DatePicker::className(), [
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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
