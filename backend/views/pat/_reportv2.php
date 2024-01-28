<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/** @var yii\web\View $this */
/** @var app\models\GrupoMaster $modelGrupo */

?>

<style>
    .data-table {
        font-size: 8px;
        width: 100%;
        border: 1px black solid;
    }

    .td-size {
        width: 100px !important;
    }
</style>

<div class="pat-view">
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

    <?php foreach ($resultDataPAT as $obj) : ?>
        <table class="data-table">
            <thead class="border text-center">
                <tr>
                    <th class="text-center border" style="background-color: #f4b083;border: 0.7px black solid;" colspan="8">SEMANA <?= $obj["SEMANA"]->num_semana ?> </th>
                </tr>
                <tr class="border">
                    <td rowspan="2" style="vertical-align: middle; text-align: center;border: 0.7px black solid;">SEMANA PROGRAMADA</td>
                    <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;"><?= ($obj["SEMANA"]->attributeLabels())['tipo_tutoria'] ?></td>
                    <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;"><?= ($obj["SEMANA"]->attributeLabels())['tematica'] ?></td>
                    <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;"><?= ($obj["SEMANA"]->attributeLabels())['objetivos'] ?></td>
                    <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;"><?= ($obj["SEMANA"]->attributeLabels())['justificacion'] ?></td>
                    <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;"><?= ($obj["SEMANA"]->attributeLabels())['estrategias_tutor'] ?></td>
                    <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;"><?= ($obj["SEMANA"]->attributeLabels())['acciones'] ?></td>
                    <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;"><?= ($obj["SEMANA"]->attributeLabels())['estrategias_tutorado'] ?></td>
                </tr>
                <tr>
                    <td class="td-size" style="border: 0.7px black solid;"><?= ($obj["SEMANA"]->tipo_tutoria != 0) ? 'INDIVIDUAL' : 'GRUPAL' ?></td>
                    <td class="td-size" style="border: 0.7px black solid;"><?= $obj["SEMANA"]->tematica ?></td>
                    <td class="td-size" style="border: 0.7px black solid;"><?= $obj["SEMANA"]->objetivos ?></td>
                    <td class="td-size" style="border: 0.7px black solid;"><?= $obj["SEMANA"]->justificacion ?></td>
                    <td class="td-size" style="border: 0.7px black solid;"><?= $obj["SEMANA"]->estrategias_tutor ?></td>
                    <td class="td-size" style="border: 0.7px black solid;"><?= $obj["SEMANA"]->acciones ?></td>
                    <td class="td-size" style="border: 0.7px black solid;"><?= $obj["SEMANA"]->estrategias_tutorado ?></td>
                </tr>
            </thead>
            <tbody class="border text-center" style="border: 0.7px black solid;">
                <?php
                $dataSemanaReal = $obj["SEMANAREAL"];
                if ($dataSemanaReal != null) { ?>
                    <tr class="border">
                        <th rowspan="3">SEMANA REAL</th>
                        <td rowspan="2" class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">COLOQUE EL NÚMERO 1 SI NO SE DIO LA SESIÓN GRUPAL</td>
                        <td rowspan="2" class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">COLOQUE EL NÚMERO 1 SI SE DIO LA SESIÓN GRUPAL</td>
                        <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">CANTIDAD DE TUTORADOS ATENDIDOS </td>
                        <td class="td-size"><?= $dataSemanaReal->alumnos_atendidos ?></td>
                        <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">HOMBRES</td>
                        <td class="td-size"><?= $dataSemanaReal->atendidos_hombres ?></td>
                        <td rowspan="2" class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">OBSERVACIONES</td>
                    </tr>
                    <tr>
                        <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">ALUMNOS FALTARON EN DIA DE LA SESIÓN</td>
                        <td class="td-size"><?= $dataSemanaReal->alumnos_faltantes ?></td>
                        <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">MUJERES</td>
                        <td class="td-size"><?= $dataSemanaReal->atendidos_mujeres ?></td>
                    </tr>
                    <tr>
                        <td class="td-size"><?= ($dataSemanaReal->semana_atendida == 1) ? "1" : "" ?></td>
                        <td class="td-size"><?= ($dataSemanaReal->semana_atendida == 0) ? "1" : "" ?></td>
                        <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">TOTAL</td>
                        <td class="td-size"><?= $dataSemanaReal->total_alumnos ?></td>
                        <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">TOTAL</td>
                        <td class="td-size"><?= $dataSemanaReal->total_gatendidos ?></td>
                        <td class="td-size"><?= $dataSemanaReal->observaciones ?></td>
                    </tr>
                <?php
                } else { ?>
                    <tr class="border">
                        <th rowspan="3">SEMANA REAL</th>
                        <td rowspan="2" class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">COLOQUE EL NÚMERO 1 SI NO SE DIO LA SESIÓN GRUPAL</td>
                        <td rowspan="2" class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">COLOQUE EL NÚMERO 1 SI SE DIO LA SESIÓN GRUPAL</td>
                        <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">CANTIDAD DE TUTORADOS ATENDIDOS </td>
                        <td class="td-size"></td>
                        <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">HOMBRES</td>
                        <td class="td-size"></td>
                        <td rowspan="2" class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">OBSERVACIONES</td>
                    </tr>
                    <tr>
                        <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">ALUMNOS FALTARON EN DIA DE LA SESIÓN</td>
                        <td class="td-size"></td>
                        <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">MUJERES</td>
                        <td class="td-size"></td>
                    </tr>
                    <tr>
                        <td class="td-size"></td>
                        <td class="td-size"></td>
                        <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">TOTAL</td>
                        <td class="td-size"></td>
                        <td class="td-size" style="background-color: #c5e0b3;border: 0.7px black solid;">TOTAL</td>
                        <td class="td-size"></td>
                        <td class="td-size"></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    <?php endforeach; ?>
    <br>
    <?php
    $TotalCol1 = $TotalCol2 = $TotalCol3 = $TotalCol4 = $TotalCol5 = $TotalCol6 = 0;
    ?>
    <table class="table table-light table-sm table-striped table-hover">
        <thead class="font-weight-bold text-center text-uppercase">
            <tr>
                <th style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;font-weight: bold;width: 15%;" class='cell-data-tittle'>PARCIALES</th>
                <th style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;font-weight: bold;width: 15%;" class='cell-data-tittle'>TOTAL DE HORAS GRUPALES</th>
                <th style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;font-weight: bold;width: 15%;" class='cell-data-tittle'>TOTAL DE HORAS INVIDUALES</th>
                <th style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;font-weight: bold;width: 15%;" class='cell-data-tittle'>TOTAL HORAS NO IMPARTIDAS </th>
                <th style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;font-weight: bold;width: 15%;" class='cell-data-tittle'>TOTAL MUJERES</th>
                <th style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;font-weight: bold;width: 15%;" class='cell-data-tittle'>TOTAL HOMBRES</th>
                <th style="vertical-align: middle !important;background-color: #1b4e81;color: whitesmoke;text-transform: uppercase;font-size: smaller;font-weight: bold;width: 15%;" class='cell-data-tittle'>ALUMNOS QUE FALTARON</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reportParciales as $key => $rParcial) {
                if ($key == 0) $parcialNombre = 'PRIMERA';
                elseif ($key == 1) $parcialNombre = 'SEGUNDA';
                else $parcialNombre = 'TERCERA';
                $TotalCol1 += intval($rParcial['TGrupal']);
                $TotalCol2 += intval($rParcial['TIndividual']);
                $TotalCol3 += intval($rParcial['TNAtendida']);
                $TotalCol4 += intval($rParcial['AMujeres']);
                $TotalCol5 += intval($rParcial['AHombress']);
                $TotalCol6 += intval($rParcial['AFaltantes']);
            ?>
                <tr class="text-center text-uppercase">
                    <td style="text-align: center; vertical-align: middle !important;font-size:smaller; padding: 0.2rem;;" class="font-weight-bold"><?= $parcialNombre . ' ENTREGA PARCIAL' ?></td>
                    <td style="text-align: center; vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['TGrupal'] ?></td>
                    <td style="text-align: center; vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['TIndividual'] ?></td>
                    <td style="text-align: center; vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['TNAtendida'] ?></td>
                    <td style="text-align: center; vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['AMujeres'] ?></td>
                    <td style="text-align: center; vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['AHombress'] ?></td>
                    <td style="text-align: center; vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['AFaltantes'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr class="text-center text-uppercase">
                <th style="vertical-align: middle !important;font-size:smaller" class="font-weight-bold">TOTAL</th>
                <th><?= $TotalCol1 ?></th>
                <th><?= $TotalCol2 ?></th>
                <th><?= $TotalCol3 ?> </th>
                <th><?= $TotalCol4 ?></th>
                <th><?= $TotalCol5 ?></th>
                <th><?= $TotalCol6 ?></th>
            </tr>
        </tfoot>
    </table>
</div>