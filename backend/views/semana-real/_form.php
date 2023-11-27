<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\editors\Summernote;

/** @var yii\web\View $this */
/** @var app\models\SemanaReal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="semana-real-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-row">
        <div class="col-md-4">
            <?= $form->field($model, 'semana_atendida')->dropDownList($model->getSemanaAtendidaList(), ['prompt'=> 'Select...', 'class'=> 'form-control form-control-md'])->label('¿Se atendio la tutoria?') ?>
        </div>
    </div>
    
    <div class="form-row">
        <div class="col-md-4">
            <?= $form->field($model, 'alumnos_atendidos')->textInput(['type'=>'number']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'alumnos_faltantes')->textInput(['type'=>'number']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'total_alumnos')->textInput(['type'=>'number']) ?>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4">
            <?= $form->field($model, 'atendidos_hombres')->textInput(['type'=>'number']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'atendidos_mujeres')->textInput(['type'=>'number']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'total_gatendidos')->textInput(['type'=>'number']) ?>
        </div>
    </div>

    <?= $form->field($model, 'evidencias')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'observaciones')->widget(Summernote::class, [
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
    
    <?php if(!$es_grupal){?>
        <?= $form->field($model, 'alumnos')->textarea(['rows' => 6]) ?>
    <?php }?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
