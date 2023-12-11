<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;;

/** @var yii\web\View $this */
/** @var app\models\Carreras $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="carreras-form m-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-save"></i> Guardar registro', ['class' => 'btn btn-outline-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
