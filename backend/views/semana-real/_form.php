<?php

use app\models\SemanaReal;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\editors\Summernote;
use kartik\file\FileInput;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\SemanaReal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="semana-real-form m-3">

    <?php $form = ActiveForm::begin(['options' => [
        'enctype' => 'multipart/form-data']
        ]); ?>

    <div class="form-row">
        <div class="col-md-4">
            <?= $form->field($model, 'semana_atendida')->dropDownList($model->getSemanaAtendidaList(), ['prompt'=> 'Seleccionar...', 'class'=> 'form-control form-control-md'])->label('¿Se atendio la tutoria?') ?>
        </div>
    </div>
    
    <div class="form-row">
        <div class="col-md-4">
            <?= $form->field($model, 'alumnos_atendidos')->textInput(['type'=>'number']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'alumnos_faltantes')->textInput(['type'=>'number']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'total_alumnos')->textInput(['type'=>'number']) ?>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4">
            <?= $form->field($model, 'atendidos_hombres')->textInput(['type'=>'number']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'atendidos_mujeres')->textInput(['type'=>'number']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'total_gatendidos')->textInput(['type'=>'number']) ?>
        </div>
    </div>
    <!-- Establecer por defecto '' en eveidencias en el controlador -->

    <?php if(!empty($model->evidencias) and isset($model->evidencias)){
        $uploadImages = explode(';', $model->evidencias);
        $initialPreview = [];
        $initialPreviewConfig = [];

        foreach ($uploadImages as $img ) {
            $baseNameImg = str_replace('../../uploads/','', $img);
            $initialPreview[]=$img;
            $initialPreviewConfig[] = [
                'caption' => $baseNameImg,
                'size' => filesize($img),
                'showRemove' => true,
                //'url' => Url::toRoute(['semana-real/delete-image', 'imgPath'=>$img, 'paths' => $model->evidencias]),
                'url' => Url::toRoute(['semana-real/delete-image']),
                'key' => $img
            ];
        }
    ?>

    <?= Html::hiddenInput('oldPathsImages', $model->evidencias, ['id'=>'oldImages'])  ?>

    <?= $form->field($model, 'evidencias[]')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*', 'multiple' => true, 'id'=>'inputEvidencias'],
            'class'=>'inputFile',
            'pluginOptions' => [
                'class'=>'inputFile',
                'initialPreview' => $initialPreview,
                'initialPreviewConfig' => $initialPreviewConfig,
                'encodeUrl'=>false,
                'initialPreviewAsData'=>true,
                'overwriteInitial' => false, // Evitar el duplicado de evidencias
                'showUpload' => false,
                'showRemove' => false,
                //'uploadUrl'=>'semana-real/index', //añadir url upload para que aparezcan los botones de eliminar
                'maxFileCount'=>20,
                'fileActionSettings'=>[
                    'showUpload' => false,
                    'showRemove' => true,
                ],
                //'pluginEvents'=>['filedeleted' => 'function() { console.log("csdfbfb"); }',]
            ],
        ]); ?>

    <?php }else{?>
        <?= $form->field($model, 'evidencias[]')->widget(FileInput::classname(), [
            
            'options' => [
                'accept' => 'image/*', 
                'multiple' => true
            ],
            'pluginOptions' => [
                'initialPreviewConfig' => [
                    'showRemove' => true,
                ],
                'overwriteInitial'=> false,
                
                'showUpload' => false, // No mostrar el botón de carga
                'showRemove' => true,
                //'uploadUrl'=>'semana-real/index', //añadir url upload para que aparezcan los botones de eliminar
                'maxFileCount'=>20,
                'fileActionSettings'=>[
                    'showUpload' => false,
                    'showRemove' => true,
                ]
            ],
            
        ]) ?>
    <?php }?>

    <?= $form->field($model, 'observaciones')->widget(Summernote::class, [
                                                'useKrajeePresets' => true,
                                                'pluginOptions'=>[
                                                    'height' => 150,
                                                    'toolbar' => [
                                                        ['style1', ['style']],
                                                        ['style2', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript']],
                                                        ['font', ['fontname', 'fontsize', 'color', 'clear']],
                                                        ['para', ['ul', 'ol', 'paragraph', 'height']],
                                                        ['insert', ['link', 'table', 'hr']],
                                                    ]
                                                ],
                                            ]) ?>
    
    <?php if(!$es_grupal){?>
        <?= $form->field($model, 'alumnos')->textarea(['rows' => 6]) ?>
    <?php }?>
    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-save"></i> Guardar registro', ['class' => 'btn btn-outline-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<< JS
    $('#inputEvidencias').on('filedeleted', function(event, key, jqXHR, data) {
        let oldImages = document.getElementById('oldImages').value;
        let paths = oldImages.split(';')
        let arrPathsUpdate = paths.filter(function(item) {
            return item !== key
        })
        
        let ImagePathsUpdate = arrPathsUpdate.join(';');
        document.getElementById('oldImages').value = ImagePathsUpdate;
    });
JS;
$this->registerJs($script);

?>
