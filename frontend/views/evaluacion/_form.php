<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Evaluacion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="evaluacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'calificacion')->textInput() ?>

    <?= $form->field($model, 'id_alumno')->textInput() ?>

    <?= $form->field($model, 'id_criterio')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
