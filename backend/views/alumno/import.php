<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
$id_grupo = Yii::$app->request->get('id_grupo');
$this->title = 'Importar';
$this->params['breadcrumbs'][] = ['label' => 'GRUPOS ACTIVOS', 'url' => ['/grupo-master/index']];
$this->params['breadcrumbs'][] = ['label' => 'VER GRUPO', 'url' => ['/grupo-master/view', 'id'=> $id_grupo]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="border rounded">

    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para la importación de nuevos alumnos desde Excel</p>
    </div>

    <div class="container text-center mt-3">

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
        )->label('<h5 class="text-uppercase"><b>Cargar archivo de excel e importar datos</b></h5>');
        ?>
        <?php
        /* = $form->field($modelImport, 'fileImport')->fileInput(['class' => 'custom-file-input', 'id' => 'inputGroupFile04', 'aria-describedby'=>"inputGroupFileAddon04"])->label('Chose excel file',['class'=>"custom-file-label", 'for'=>"inputGroupFile04"]) */ ?>
        <!-- Boton comentado -->
        <!-- <?= Html::submitButton('Import data', ['class' => 'btn btn-sm btn-outline-secondary', 'id' => "inputGroupFileAddon04"]); ?> -->


        <?php ActiveForm::end(); ?>
    </div>

</div>