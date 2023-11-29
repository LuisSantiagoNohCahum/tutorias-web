<?php 
use yii\widgets\DetailView;
use yii\bootstrap4\Html;


?>
<div class="w-100">
    <div class="table-responsive">
        <table class="table table-light table-striped" style="text-wrap: wrap; line-break: auto; width: 150%">
            <tr class="font-weight-bold text-center text-uppercase">
                    <td style="vertical-align: middle !important;" rowspan="2" class="bg-white">PROGRAMADA</td>
                    <td style="vertical-align: middle !important;"><?= ($model->attributeLabels())['tipo_tutoria'] ?></td>
                    <td style="vertical-align: middle !important;"><?= ($model->attributeLabels())['tematica'] ?></td>
                    <td style="vertical-align: middle !important;"><?= ($model->attributeLabels())['objetivos'] ?></td>
                    <td style="vertical-align: middle !important;"><?= ($model->attributeLabels())['justificacion'] ?></td>
                    <td style="vertical-align: middle !important;"><?= ($model->attributeLabels())['estrategias_tutor'] ?></td>
                    <td style="vertical-align: middle !important;"><?= ($model->attributeLabels())['acciones'] ?></td>
                    <td style="vertical-align: middle !important;"><?= ($model->attributeLabels())['estrategias_tutorado'] ?></td>
            </tr>
            <tr>
                <td style="white-space: pre-wrap !important;" class=""><?= ($model->tipo_tutoria != 0) ? 'INDIVIDUAL' : 'GRUPAL' ?></td>
                <td style="white-space: pre-wrap !important;" class=""><?= $model->tematica ?></td>
                <td style="white-space: pre-wrap !important;" class=""><?= $model->objetivos ?></td>
                <td style="white-space: pre-wrap !important;" class=""><?= $model->justificacion ?></td>
                <td style="white-space: pre-wrap !important;" class=""><?= $model->estrategias_tutor ?></td>
                <td style="white-space: pre-wrap !important;" class=""><?= $model->acciones ?></td>
                <td style="white-space: pre-wrap !important;" class=""><?= $model->estrategias_tutorado ?></td>
            </tr>
        </table>
    </div>
</div>

