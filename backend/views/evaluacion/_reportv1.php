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
?>

<!-- validar nulos y objetos vacios que sean mayor a 0 los data provider - validar igual en controller -->

<?php if(!isset($rExcel)){?>
    <?= Html::img('@web/images/itsva.png', ['alt'=>'Itsva', 'class'=>'mb-2 mt-2 border-0', 'width'=>'75%']);?>
    <div class="text-center">
        <h4><b>REPORTE DE EVALUACIÓN</b></h4>
    </div>
<?php }?>

<hr class="dropdown-divider">
<?php if(!isset($rExcel)){?>
    <p>Detalles del grupo</p>
<?php }?>

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
        'style' => 'background-color: #e9e9e9; font-size: smaller; padding-right: 0.5rem; padding-top:0.25rem; padding-bottom: 0.25rem;'
    ],
    'valueColOptions' => [
        'class' => 'bg-ligth text-left text-uppercase',
        'style' => 'font-size: smaller; padding-left: 0.5rem;'
    ],
    'mode' => 'view',
    'enableEditMode' => false,
    'container' => ['id' => 'kv-demo'],
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
<?php if(!isset($rExcel)){?>
    <p>Listado de alumnos evaluados</p>
<?php }?>

    <div class="table-responsive">
        <table class="t-max-width table table-sm table-hover">
            <thead class="border-light thead" style="background-color: #f1f7ed;">
                <tr class="text-center">
                    <td  style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;font-weight: bold;" colspan="2" class="t-head pin border-bottom-light">DATOS DEL ALUMNO</td>
                    <?php if(isset($rExcel)){ ?>
                        <td colspan="<?= count($dataProviderCriterios->models) ?>" style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;">CRITERIOS</td>
                    <?php } ?>
                    <td style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;font-weight: bold;" colspan="3" class="t-head border-bottom-light">RESUMEN</td>
                </tr>
                <tr>
                    <td style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;width: 100px;">MATRICULA</td>
                    <td style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;width: 200px;">NOMBRE DEL ALUMNO</td>
                    <?php
                    if(isset($rExcel)){
                        $models = $dataProviderCriterios->models;
                        foreach ($models as $modelo) {
                            echo '<th class="t-head border-light" style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;width: 8%;">
                                                    <div class="p-show">' . $modelo['nombre'] . '</div>
                                                </th>';
                        }
                    }
                    ?>
                    <td style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;">VALOR NUMERICO DE LA ACTIVIDAD COMPLEMENTARIA</td>
                    <td style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;">NIVEL DE DESEMPEÑO ALCANZADO DE LA ACTIVIDAD COMPLEMENTARIA</td>
                    <td style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;">AUTORIZO SU LIBERACION COMO TUTOR(A)</td>
                </tr>

            </thead>
            <tbody class="border-secondary">

                <?php
                echo '<input type="hidden" name="totalTutorados" value="' . $dataProviderAlumnos->count . '" >';
                echo '<input type="hidden" name="totalCriterios" value="' . $dataProviderCriterios->count . '" >';
                
                $models = $dataProviderAlumnos->models;
                foreach ($models as $indext => $tutorado) {
                    echo '<input type="hidden" name="tutorado' . $indext . '" value="' . $tutorado->id . '" >';
                    echo '<tr class="border">';
                    echo '<td class="t-body pin" style="width: 100px;"><b>' . $tutorado['matricula'] . '</b></td>';
                    echo '<td class="t-body pin-2 text-uppercase" style="width: 200px;">' . $tutorado['apellidop'] . ' ' . $tutorado['apellidom'] . ' ' . $tutorado['nombres'] . '</td>';
                    if(isset($rExcel)){
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
                                            <b>NO</b></span>
                                        </td>' :
                        '<td class="t-body"><span class="text-success">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <b>SI</b></span>
                                        </td>';


                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

