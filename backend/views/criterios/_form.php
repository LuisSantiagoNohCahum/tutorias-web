<?php

use yii\helpers\Html;
use kartik\editors\Summernote;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Criterios $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="criterios-form m-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->widget(Summernote::class, [
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
