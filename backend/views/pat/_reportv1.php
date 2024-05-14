<?php

use yii\helpers\Html;
use kartik\detail\DetailView;


/** @var yii\web\View $this */
/** @var app\models\GrupoMaster $modelGrupo */

?>



<?php if(!isset($rExcel)){?>
    <?= Html::img('@web/images/itsva.png', ['alt'=>'Itsva', 'class'=>'mb-2 mt-2 border-0', 'width'=>'75%']);?>
    <div class="text-center">
        <h4><b>REPORTE DE ENTREGAS PARCIALES</b></h4>
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
    <p>Entregas parciales del PAT</p>
<?php }?>
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
                    <td style="vertical-align: middle !important;font-size:smaller; padding: 0.2rem;;" class="font-weight-bold"><?= $parcialNombre . ' ENTREGA PARCIAL' ?></td>
                    <td style="vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['TGrupal'] ?></td>
                    <td style="vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['TIndividual'] ?></td>
                    <td style="vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['TNAtendida'] ?></td>
                    <td style="vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['AMujeres'] ?></td>
                    <td style="vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['AHombress'] ?></td>
                    <td style="vertical-align: middle !important; padding: 0.2rem;"><?= $rParcial['AFaltantes'] ?></td>
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
