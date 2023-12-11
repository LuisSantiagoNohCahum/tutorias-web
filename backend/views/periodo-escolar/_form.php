<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\PeriodoEscolar $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="periodo-escolar-form m-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder'=> 'XXXXA / XXXXB', 'pattern'=>'[0-9]{4}[a-zA-Z]{1}']) ?>

    <?= $form->field($model, 'id_estatus')->dropDownList($model->getEstatusList(), ['prompt'=> 'Seleccionar...', 'class'=> 'form-control form-control-md'])?>

    <?= $form->field($model, 'letra_periodo')->dropDownList($model->getCharPeriodList(), ['prompt'=> 'Seleccionar...', 'class'=> 'form-control form-control-md']) ?>

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
        <?= Html::submitButton('<i class="fas fa-save"></i> Guardar registro', ['class' => 'btn btn-outline-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
