<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
$this->title = 'Importar';
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="container text-center bg-white mt-3 cart-info">

    <!-- Aqui podemos mandar a la accion a donde queremos mandar la informacion del formulario-->
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($modelImport, 'fileImport')->widget(
        FileInput::classname(),
        [
            'options' => [
                'accept' => '.xlsx, .xls, .csv'
            ],
            'pluginOptions' => [
                'uploadLabel' => 'Importar datos',
                'showRemove' => true,
                'showUpload' => true
            ],
        ]
    )->label('<h4><b>Cargar archivo de excel e importar datos</b></h4>');
    ?>
    <?php
    /* = $form->field($modelImport, 'fileImport')->fileInput(['class' => 'custom-file-input', 'id' => 'inputGroupFile04', 'aria-describedby'=>"inputGroupFileAddon04"])->label('Chose excel file',['class'=>"custom-file-label", 'for'=>"inputGroupFile04"]) */ ?>
    <!-- Boton comentado -->
    <!-- <?= Html::submitButton('Import data', ['class' => 'btn btn-sm btn-outline-secondary', 'id' => "inputGroupFileAddon04"]); ?> -->


    <?php ActiveForm::end(); ?>
</div>


