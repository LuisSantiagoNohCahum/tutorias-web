<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\editors\Summernote;

/** @var yii\web\View $this */
/** @var app\models\Pat $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pat-form m-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_semestre')->dropDownList($model->getSemestreList(), ['prompt'=> 'Seleccionar...', 'class'=> 'form-control form-control-md'])->label('Semestre') ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->widget(Summernote::class, [
                                                'useKrajeePresets' => true,
                                                'pluginOptions'=>[
                                                    'height' => 150,
                                                    'toolbar' => [
                                                        ['style1', ['style']],
                                                        ['style2', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript']],
                                                        ['font', ['fontname', 'fontsize', 'color', 'clear']],
                                                        ['para', ['ul', 'ol', 'paragraph', 'height']],
                                                        ['insert', ['link', 'table', 'hr']],
                                                    ]
                                                ],
                                            ]) ?>

    <?= $form->field($model, 'estatus')->dropDownList($model->getEstatusList(), ['prompt'=> 'Seleccionar...', 'class'=> 'form-control form-control-md'])->label('Estado') ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-save"></i> Guardar registro', ['class' => 'btn btn-outline-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
