<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Canalizacion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="canalizacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'estatus')->textInput() ?>

    <?= $form->field($model, 'asunto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cuerpo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_alumno')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
