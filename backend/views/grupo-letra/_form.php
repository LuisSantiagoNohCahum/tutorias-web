<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\GrupoLetra $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="grupo-letra-form m-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'letra_key')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-save"></i> Guardar registro', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
