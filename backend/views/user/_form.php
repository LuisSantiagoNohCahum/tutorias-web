<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form m-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatusList(), ['prompt'=> 'Seleccionar...', 'class'=> 'form-control form-control-md']) ?>

    <!-- $form->field($model, 'rol_id')->textInput() -->

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-save"></i> Guardar registro', ['class' => 'btn btn-outline-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
