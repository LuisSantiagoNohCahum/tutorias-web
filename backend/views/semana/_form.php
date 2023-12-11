<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\editors\Summernote;

/** @var yii\web\View $this */
/** @var app\models\Semana $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="semana-form m-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num_semana')->textInput(['type'=>'number'])->label('Numero de semana') ?>

    <?= $form->field($model, 'nombre')->textInput()->label('Nombre') ?>

    <?= $form->field($model, 'tipo_tutoria')->dropDownList($model->getTipoTutoriaList(), ['prompt'=> 'Seleccionar...', 'class'=> 'form-control form-control-md'])->label('Tipo de tutoria') ?>

    <?= $form->field($model, 'tematica')->widget(Summernote::class, [
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

    <?= $form->field($model, 'objetivos')->widget(Summernote::class, [
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
    <?= $form->field($model, 'justificacion')->widget(Summernote::class, [
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

    <?= $form->field($model, 'estrategias_tutor')->widget(Summernote::class, [
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

    <?= $form->field($model, 'acciones')->widget(Summernote::class, [
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

    <?= $form->field($model, 'estrategias_tutorado')->widget(Summernote::class, [
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
