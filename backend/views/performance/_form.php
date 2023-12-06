<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Performance $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="performance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_grupo')->textInput() ?>

    <?= $form->field($model, 'eDesempeño')->textInput() ?>

    <?= $form->field($model, 'bDesempeño')->textInput() ?>

    <?= $form->field($model, 'arDesempeño')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
