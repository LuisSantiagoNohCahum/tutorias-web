<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\GrupoMaster $modelGrupo */
/** @var yii\data\ActiveDataProvider $dataProviderCriterios */
/** @var yii\data\ActiveDataProvider $dataProviderAlumnos */

$this->title = 'FORMATO DE EVALUACIÓN';
$this->params['breadcrumbs'][] = ['label' => 'Grupos Activos', 'url' => ['/grupo-master/index']];
$this->params['breadcrumbs'][] = ['label' => 'VER GRUPO', 'url' => ['/grupo-master/view', 'id' => $modelGrupo->id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
    .t-head {
        font-size: 10px;
        text-align: center;
        /* width: 200px; */
        padding: 5px;
    }

    .t-body {
        font-size: 12px;
        text-align: center;
        padding: 1rem;
        vertical-align: middle !important;
    }

    .thead {
        background-color: #1b396a !important;
        color: whitesmoke;
        /* height: 200px; */
    }


    .panel-head {
        background: #fef2cb;
        padding: 40px;
    }

    .panel-body {
        border: solid;
        border-color: #92d050;
        border-radius: 5px;
        padding: 15px;

    }

    td,
    th {
        vertical-align: top !important;
    }

    .datos-alumno-td {
        width: 8%;
        text-transform: capitalize;
    }

    .datos-calculados-td {
        width: 8%;
    }

    /* No se usa pero es para ajustar columnas */
    .header-data {
        font-size: 10px;
        text-align: center;
        padding: 5px;
        width: 8%;
    }

    .p-show {
        /*absolute - para sobreponer*/
        position: static;
        /* Si lo dejaba en absolute no mostraba nada */
        display: none;
        z-index: -1;
        text-align: left;
    }

    .p-hide {
        overflow: hidden;
        -webkit-line-clamp: 3;

        /*absolute - para sobreponer*/
        position: static;
        /* Si lo dejaba en absolute no mostraba bien lñas columnas estaticas */
        display: -webkit-box;
        -webkit-box-orient: vertical;

        text-align: left;
    }

    .border-light {
        border-right: 1px solid #486481 !important;
        /* border-left: 1px solid #486481 !important; */
        border-bottom: 1px solid #1b396a !important;
    }

    #btn-show {
        background-color: #486481;
        color: whitesmoke;
        /* height: 25px; */
        padding: 0 !important;
    }

    #btn-show:hover {
        cursor: pointer;
        background-color: #607f9f;
    }

    .t-max-width {
        border-collapse: separate;
        border-spacing: 0;
        width: 150% !important;
    }

    td,
    th {
        border-bottom: 1px solid #d2d2d2;
        border-top: 0 !important;
    }

    .pin {
        z-index: 1;
        /* Para que al desplegar descripcion completa no se sobreponga */
        position: sticky;
        left: 0;
    }

    .pin-2 {
        z-index: 1;
        position: sticky;
        /* Establecer un ancho de columnas fijos en porcentaje */
        left: 100px;
    }

    td.t-head.pin,
    .thead.pin,
    td.t-head.pin-2,
    .thead.pin-2 {
        background-color: #1b396a !important;
        color: whitesmoke;
        /* Eliminar estos bordes por que no hacen nada */
        /* border-right: 1px solid #486481 !important;
        border-left: 1px solid #486481 !important; */
    }

    .t-body.pin,
    .t-body.pin-2 {
        background-color: white !important;
    }

.select-evaluacion {
    width: 70%;
    color: #495057;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.select-evaluacion:focus {
    color: #495057;
    background-color: #fff;
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
</style>
<!-- validar nulos y objetos vacios que sean mayor a 0 los data provider - validar igual en controller -->

<h4><?= Html::encode($this->title) ?></h4>
<hr class="dropdown-divider">

<div class="alert alert-warning" role="alert">
    <p>
        <b>IMPORTANTE:</b> Se selecciona el nivel de desempeño alcanzado por el estudiante, por cada uno de los
        <?= (count($dataProviderCriterios->getModels()) > 0) ? count($dataProviderCriterios->getModels()) : 7 ?>
        criterios a evaluar establecidos en el formato de evaluación, considerando que cada nivel de desempeño de criterio tiene una equivalencia numérica.
        <!-- Se pusop haber metido en una tabla igual para relacionarla -->
    <ul class="list">
        <li class="list-item text-uppercase"><b>Insuficiente</b> = 0</li>
        <li class="list-item text-uppercase"><b>Suficiente</b> = 1</li>
        <li class="list-item text-uppercase"><b>Bueno</b> = 2</li>
        <li class="list-item text-uppercase"><b>Notable</b> = 3</li>
        <li class="list-item text-uppercase"><b>Excelente</b> = 4</li>
    </ul>
    </p>
    <p><b>IMPORTANTE:</b> PARA QUE PUEDA LIBERARSE AL ALUMNO, TENDRÁ QUE CUMPLIR MÍNIMO EL NIVEL DE DESEMPEÑO BUENO DE LO CONTRARIO NO SE AUTORIZARÁ ESTE CRÉDITO COMPLEMENTARIO</p>
</div>

<hr class="dropdown-divider">

<?= DetailView::widget([
    'model' => $modelGrupo,
    'bootstrap' => true,
    'bordered' => false,
    'striped' => false,
    'options' => [
        'class' => 'table table-sm table-light border table-hover table-bordered table-borderless table-condensed mt-2', //mb-2 
    ],
    'labelColOptions' => [
        'class' => 'bg-ligth text-left text-uppercase',
        'style' => 'background-color: #e9e9e9; font-size: smaller;'
    ],
    'mode' => 'view',
    'enableEditMode' => false,
    'container' => ['id' => 'kv-demo'],
    'panel' => [
        'type' => DetailView::TYPE_LIGHT,
        'heading' => '<h6 class="panel-title mb-0"><i class="fas fa-users"></i> INFORMACIÓN DEL GRUPO</h6>',
        'headingOptions' => [
            'style' => 'font-size: small !important; margin:0; padding: 0.5rem 1.25rem;'
        ],
        'before' => false
    ],
    'attributes' => [
        [
            //cambiar el widget al de kartik
            'attribute' => 'id_periodo',
            'format' => 'html',
            'value' => '<b>' . $modelGrupo->periodo->nombre . '</b>',
        ],
        [
            //cambiar el widget al de kartik
            'attribute' => 'id_tutor',
            'format' => 'html',
            'value' => ($modelGrupo->id_tutor != null) ? Html::tag('span', $modelGrupo->tutor->nombre . ' ' . $modelGrupo->tutor->apellido, ['class' => 'text-bold']) : Html::tag('span', "SIN ASIGNAR", ['class' => 'text-danger font-weight-bold'])

        ],
        [
            //cambiar el widget al de kartik
            'attribute' => 'id_carrera',
            'format' => 'html',
            'value' => '<b>' . $modelGrupo->carrera->nombre . '</b>',
        ],
        [
            //cambiar el widget al de kartik
            'attribute' => 'id_semestre',
            'format' => 'html',
            'value' => '<b>' . $modelGrupo->semestre->nombre . '</b>',
        ],
        [
            //cambiar el widget al de kartik
            'attribute' => 'id_grupoLetra',
            'format' => 'html',
            'value' => '<b>' . $modelGrupo->grupoLetra->letra_key . '</b>',
        ],

    ],
]) ?>


<hr class="dropdown-divider">

<div class="card border">
    <div class="card-header ">
        <div class="float-right float-end pull-right"><span class="kv-buttons-1"> Mostrando <b>1</b> - <b><?= (count($dataProviderAlumnos->getModels()) > 0) ? count($dataProviderAlumnos->getModels()) : 0 ?></b> de <b><?= (count($dataProviderAlumnos->getModels()) > 0) ? count($dataProviderAlumnos->getModels()) : 0 ?> </b> alumnos</span></div>
        <h6 class="m-0 text-uppercase"><i class="fas fa-star-half-alt"></i> Evaluar</h6>
        <div class="clearfix"></div>
    </div>
    <?php $form = ActiveForm::begin(['action' => ['bulk-evaluar', 'id_grupo' => $modelGrupo->id], 'method' => 'post']); ?>

    <div class="card-body" style="padding: 0 !important;">
        <div class="float-right">
            <table class="table-light"><!--class = 'mb-2' style="border: 1px solid #d3d3d3 !important;" -->
                <tbody>
                    <tr>
                        <td style="width: min-content; border-right:1px solid #d3d3d3; padding: 5px;vertical-align: middle !important;" class="text-black-50">Exportar </td>
                        <td style="padding: 5px;">
                            <?= Html::a('<i class="bi bi-file-earmark-excel-fill"></i> Excel', ['/evaluacion/export-excel', 'id_grupo'=>$modelGrupo->id], [
                                    'class' => 'btn-export btn-sm-export btn-export-excel text-uppercase',
                                ]) ?>
                        </td>
                        <td style="padding: 5px;">
                            <?= Html::a('<i class="bi bi-file-earmark-pdf-fill"></i> PDF', ['/evaluacion/export-pdf', 'id_grupo'=>$modelGrupo->id], [
                                    'class' => 'btn-export btn-sm-export btn-export-pdf text-uppercase',
                                ]) ?>
                        </td>
                        <td style="padding: 5px;">
                            <?= Html::a('<i class="bi bi-file-earmark-pdf-fill"></i> CONSTANCIAS', ['/evaluacion/exportar-constancias', 'id_grupo'=>$modelGrupo->id], [
                                    'class' => 'btn-export btn-sm-export btn-export-pdf text-uppercase',
                                ]) ?>
                        </td>
                        <td style="width: min-content; border-right:1px solid #d3d3d3; padding: 5px;vertical-align: middle !important;" class="text-black-50">Acciones </td>
                        <td style="padding: 5px; vertical-align: middle !important;"><?= Html::submitButton('Guardar', ['class' => 'btn-export btn-sm-export btn-export-excel']) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="table-responsive">
        <table class="t-max-width table table-sm table-hover">
            <thead class="border-light thead" style="background-color: #f1f7ed;">
                <tr class="text-center">
                    <td colspan="2" class="t-head pin border-bottom-light">DATOS DEL ALUMNO</td>
                    <td colspan="<?= count($dataProviderCriterios->models) ?>" class="t-head border-bottom-light">CRITERIOS</td>
                    <td colspan="3" class="t-head border-bottom-light">RESUMEN</td>
                </tr>
                <tr>
                    <td rowspan="2" class="t-head pin border-light" style="vertical-align: middle !important;width: 100px;">MATRICULA</td>
                    <td rowspan="2" class="t-head pin-2 border-light" style="vertical-align: middle !important;width: 200px;">NOMBRE DEL ALUMNO</td>
                    <?php
                    $models = $dataProviderCriterios->models;
                    foreach ($models as $modelo) {
                        echo '<th class="t-head border-light" style="width: 8%;">
                                                <div class="p-hide">' . $modelo['nombre'] . '</div>
                                                <div class="p-show">' . $modelo['nombre'] . '</div>
                                            </th>';
                    }
                    ?>
                    <td rowspan="2" class="t-head border-light" style="vertical-align: middle !important;">VALOR NUMERICO DE LA ACTIVIDAD COMPLEMENTARIA</td>
                    <td rowspan="2" class="t-head border-light" style="vertical-align: middle !important;">NIVEL DE DESEMPEÑO ALCANZADO DE LA ACTIVIDAD COMPLEMENTARIA</td>
                    <td rowspan="2" class="t-head border-light" style="vertical-align: middle !important;">AUTORIZO SU LIBERACION COMO TUTOR(A)</td>
                </tr>

                <tr>
                    <!-- btn btn-sm btn-outline-light -->
                    <td colspan="<?= count($dataProviderCriterios->models) ?>"><button type="button" class="w-100 btn" id="btn-show"><i class="bi bi-arrows-collapse"></i></button></td>
                </tr>
            </thead>
            <tbody class="border-secondary">

                <?php
                echo '<input type="hidden" name="totalTutorados" value="' . $dataProviderAlumnos->count . '" >';
                echo '<input type="hidden" name="totalCriterios" value="' . $dataProviderCriterios->count . '" >';
                /* Validar si es mayor a 0 si no mostrar una fila con un mensaje  */
                $models = $dataProviderAlumnos->models;
                foreach ($models as $indext => $tutorado) {
                    echo '<input type="hidden" name="tutorado' . $indext . '" value="' . $tutorado->id . '" >';
                    echo '<tr class="border">';
                    echo '<td class="t-body pin" style="width: 100px;"><b>' . $tutorado['matricula'] . '</b></td>';
                    echo '<td class="t-body pin-2 text-uppercase" style="width: 200px;">' . $tutorado['apellidop'] . ' ' . $tutorado['apellidom'] . ' ' . $tutorado['nombres'] . '</td>';
                    $models = $dataProviderCriterios->models;
                    foreach ($models as $indexc => $criterio) {
                        echo '<input type="hidden" name="criterio' . $indexc . '" value="' . $criterio->id . '" >';
                        echo '<td class="t-body">';
                        if (count($tutorado->evaluacions) > 0) {

                            foreach ($tutorado->evaluacions as $criterio2) {
                                if (intval($criterio2->id_criterio) == intval($criterio->id)) {
                                    echo '<input type="hidden" name="Cal' . $indext . 'Id' . $indexc . '" value="' . $criterio2->id . '" >';
                                }
                            }
                            //crear un string builder mejor para formar poco a poco el texto del select que se va a pintar
                            $calificacionObj = null;

                            foreach ($tutorado->evaluacions as $criterio2) {
                                //buscar la manera que regrese el criterio actual con el que se trabaja 
                                if (intval($criterio2->id_criterio) == intval($criterio->id)) {
                                    $calificacionObj = $criterio2;
                                    //Create hidden inputs con el id de la calificacion
                                }
                                //si se crea un nuevo criterio no se pinta select - como no entra al if, pero si le pongo el else los elementos restantes van a pintar eso por que no entran al if
                                //hacer for each donde se cargue el objeto de calificacion actual y trabajar con ese nomas y luego pasar al sieguente
                            }
                            if ($calificacionObj != null) {

                                echo '<select class="select-evaluacion" name="al' . $indext . 'cal' . $indexc . '" type="number">';
                                echo (intval($calificacionObj->calificacion) == 0) ? '<option selected value = "0">0</option>' : '<option value = "0">0</option>';
                                echo (intval($calificacionObj->calificacion) == 1) ? '<option selected value = "1">1</option>' : '<option value = "1">1</option>';
                                echo (intval($calificacionObj->calificacion) == 2) ? '<option selected value = "2">2</option>' : '<option value = "2">2</option>';
                                echo (intval($calificacionObj->calificacion) == 3) ? '<option selected value = "3">3</option>' : '<option value = "3">3</option>';
                                echo (intval($calificacionObj->calificacion) == 4) ? '<option selected value = "4">4</option>' : '<option value = "4">4</option>';
                                echo '</select>';
                            } else {
                                echo '<select class="select-evaluacion" name="al' . $indext . 'cal' . $indexc . '" type="number">
                                                    <option selected value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>';
                            }
                        } else {
                            echo '<select class="select-evaluacion" name="al' . $indext . 'cal' . $indexc . '" type="number">
                                                <option selected value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>';
                        }
                        echo '</td>';
                    }

                    $sumaNotas = 0.0;
                    $promedio = 0.0;
                    if (count($tutorado->evaluacions) != 0) {
                        foreach ($tutorado->evaluacions as $nota) $sumaNotas += doubleval($nota->calificacion);
                        $promedio = floatval($sumaNotas / count($tutorado->evaluacions));
                        $promedio = doubleval(number_format($promedio, 2, '.', ','));
                    }

                    echo '<td class="t-body">';
                    echo ($promedio != 0) ? '<span><b>' . $promedio . '</b></span>' : '<span class="text-danger"><b>N/A</b></span>';
                    echo '</td>';

                    /* w-75 para que los badgets sean del mismo tamaño siempre */
                    echo '<td class="t-body">';
                    if ($promedio < 1) echo '<span class="badge badge-danger w-75"><b>INSUFICIENTE</b></span>';
                    elseif ($promedio < 1.5) echo '<span class="badge badge-warning w-75"><b>SUFICIENTE</b></span>';
                    elseif ($promedio < 2.5) echo '<span class="badge badge-info w-75"><b>BUENO</b></span>';
                    elseif ($promedio < 3.5) echo '<span class="badge badge-primary w-75"><b>NOTABLE</b></span>';
                    elseif ($promedio <= 4) echo '<span class="badge badge-success w-75"><b>EXCELENTE</b></span>';
                    else echo '<span><b>N/A</b></span>';
                    echo '</td>';

                    /* NO - SI */
                    echo ($promedio < 1.5) ?
                        '<td class="t-body"><span class="text-danger">
                                            <i class="bi bi-x-circle-fill"></i>
                                            <b></b></span>
                                        </td>' :
                        '<td class="t-body"><span class="text-success">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <b></b></span>
                                        </td>';


                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<!-- Validar si no hay alumnos mostrar td vacio con un mensaje de que no existen alumnos para evaluar-->


<!-- class="t-max-width table table-striped table-sm" -->
<!-- Tabla de evaluacion -->
<!-- <div class="table-responsive">
    <table class="t-max-width">
        <tr class="text-center">
            <td colspan="2" class=" pin border-bottom-light">DATOS DEL ALUMNO</td>
            <td colspan="<?= count($dataProviderCriterios->models) ?>" class="border-bottom-light">CRITERIOS</td>
            <td colspan="3" class=" border-bottom-light">RESUMEN</td>
        </tr>
        <tr>
            <td rowspan="2" class=" pin border-light" style="vertical-align: middle;">MATRICULA</td>
            <td rowspan="2" class=" pin-2 border-light" style="vertical-align: middle;">NOMBRE DEL ALUMNO</td>
            <?php
            $models = $dataProviderCriterios->models;
            foreach ($models as $modelo) {
                echo '<th class=" border-light">
                        <div class="p-hide">' . $modelo['nombre'] . '</div>
                        <div class="p-show">' . $modelo['nombre'] . '</div>
                    </th>';
            }
            ?>
            <td rowspan="2" class=" border-light" style="vertical-align: middle;">VALOR NUMERICO DE LA ACTIVIDAD COMPLEMENTARIA</td>
            <td rowspan="2" class=" border-light" style="vertical-align: middle;">NIVEL DE DESEMPEÑO ALCANZADO DE LA ACTIVIDAD COMPLEMENTARIA</td>
            <td rowspan="2" class=" border-light" style="vertical-align: middle;">AUTORIZO SU LIBERACION COMO TUTOR(A)</td>
        </tr>

        <tr>
            <td colspan="<?= count($dataProviderCriterios->models) ?>"><button type="button" class="w-100 btn" id="btn-show"><i class="bi bi-arrows-collapse"></i></button></td>
        </tr>
        <tr>
            <td style="width: 150px;" class="pin">1</td>
            <td style="width: 200px;" class="pin-2">Luis Santiago</td>
            <td>Noh</td>
            <td>Cahum</td>
        </tr>

    </table>
</div> -->
<?php

$script = <<< JS
$(document).ready(function() {
        $("#btn-show").click(function() {
            $(".p-show").toggle(750);
            $(".p-hide").toggle(750);

        });
    });
JS;

$this->registerJs($script);

?>