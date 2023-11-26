<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\GrupoMaster $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="grupo-master-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_periodo')->dropDownList($model->getPeriodosList(), ['prompt'=> 'Select...', 'class'=> 'form-control form-control-md'])->label('Periodo Escolar') ?>

    <?= $form->field($model, 'id_carrera')->dropDownList($model->getCarreraList(), ['prompt'=> 'Select...', 'class'=> 'form-control form-control-md'])->label('Carrera') ?>

    <?= $form->field($model, 'id_semestre')->dropDownList($model->getSemestreList(), ['prompt'=> 'Select...', 'class'=> 'form-control form-control-md'])->label('Semestre') ?>

    <?= $form->field($model, 'id_grupoLetra')->dropDownList($model->getGrupoLetraList(), ['prompt'=> 'Select...', 'class'=> 'form-control form-control-md'])->label('Grupo') ?>

    <?= $form->field($model, 'id_tutor')->dropDownList($model->getTutorList($model->id_tutor), ['prompt'=> 'Select...', 'class'=> 'form-control form-control-md'])->label('Tutor Asignado') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
