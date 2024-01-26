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


</div>