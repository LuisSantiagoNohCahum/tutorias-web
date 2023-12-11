<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\editors\Summernote;

/** @var yii\web\View $this */
/** @var app\models\Diagnostico $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="diagnostico-form m-3">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id_alumno')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'motivo')->dropDownList($model->getMotivosList(), ['prompt'=> 'Seleccionar...', 'class'=> 'form-control form-control-md'])->label('Motivo') ?>

    <?= $form->field($model, 'asignaturas')->widget(Summernote::class, [
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

    <?= $form->field($model, 'otro')->widget(Summernote::class, [
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

    <?= $form->field($model, 'especifique')->widget(Summernote::class, [
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

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-save"></i> Guardar registro', ['class' => 'btn btn-outline-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
