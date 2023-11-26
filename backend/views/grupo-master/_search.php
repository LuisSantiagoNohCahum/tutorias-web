<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\GrupoMasterSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="grupo-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_periodo') ?>

    <?= $form->field($model, 'id_carrera') ?>

    <?= $form->field($model, 'id_semestre') ?>

    <?= $form->field($model, 'id_grupoLetra') ?>

    <?php // echo $form->field($model, 'id_tutor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
