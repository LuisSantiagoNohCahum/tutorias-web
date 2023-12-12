<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Performance $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="performance-form">

    <?php $form = ActiveForm::begin(
        [
            'id' => 'performance-form',
            'enableAjaxValidation' => true,
            'enableClientScript' => true,
            'enableClientValidation' => true,
        ]
    ); ?>

    <?= $form->field($model, 'eDesempeño')->textInput(['type'=>'number']) ?>

    <?= $form->field($model, 'bDesempeño')->textInput(['type'=>'number']) ?>

    <?= $form->field($model, 'arDesempeño')->textInput(['type'=>'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
    $this->registerJs('
   // obtener la id del formulario y establecer el manejador de eventos
        $("form#performance-form").on("beforeSubmit", function(e) {
            var form = $(this);
            $.post(
                form.attr("action")+"&submit=true",
                form.serialize()
            )
            .done(function(result) {
                form.parent().html(result.message); 
                $.pjax.reload({container:"#diagnostico-grid"});
            });
            return false;
        }).on("submit", function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
        });
    ');
    ?>
