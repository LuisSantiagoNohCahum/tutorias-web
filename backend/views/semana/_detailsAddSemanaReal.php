<?php 
use yii\widgets\DetailView;
use yii\bootstrap4\Html;

?>

<?= $this->render('_details', [
        'model' => $model,
    ]) ?>

<?php if($modelSemanaReal != null) {?>
    <div class="alert alert-info mb-2 mt-2" role="alert">
        <div class="form-row">
            <div class="col-md-10 m-auto">
                <b>Resultados de la tutoria de esta semana!</b>
            </div>
            <div class="col-md-1 m-auto">
                <?= Html::a('<i class="fas fa-edit"></i></i> Editar', ['/semana-real/update', 'id' => $modelSemanaReal->id, 'es_grupal'=> ($model->tipo_tutoria != 0) ? false : true], ['class' => 'btn-show']) ?>
            </div>
            <div class="col-md-1 m-auto">
                <?= Html::a('<i class="fas fa-trash"></i> Eliminar', ['/semana-real/delete', 'id' => $modelSemanaReal->id], [
                    'class' => 'btn-delete',
                    'data' => [
                        'confirm' => '¿Esta seguro que desea eliminar este elemento?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    </div>

    <table class="table table-simple table-light table-bordered table-borderless">
        <tr>
            <td style="vertical-align: middle !important;width: 15%;" rowspan="3" class="text-center font-weight-bold text-uppercase">SEMANA REAL</td>
            
            <td class="font-weight-bold cell-data-tittle"><?= ($modelSemanaReal->attributeLabels())['semana_atendida'] ?></td>
            <td class="font-weight-bold cell-data-tittle"><?= ($modelSemanaReal->attributeLabels())['alumnos_atendidos'] ?></td>
            <td class="text-center"><?= $modelSemanaReal->alumnos_atendidos ?></td>
            
            <td class="font-weight-bold cell-data-tittle"><?= ($modelSemanaReal->attributeLabels())['atendidos_hombres'] ?></td>
            <td class="text-center"><?= $modelSemanaReal->atendidos_hombres ?></td>
            
            <!-- <td><?= ($modelSemanaReal->attributeLabels())['evidencias'] ?></td> -->
            <td class="font-weight-bold cell-data-tittle"><?= ($modelSemanaReal->attributeLabels())['observaciones'] ?></td>
            <?php if(($model->tipo_tutoria != 0)){ ?>
                <td class="font-weight-bold cell-data-tittle"><?= ($modelSemanaReal->attributeLabels())['alumnos'] ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td class="text-center" rowspan="2"><?= ($modelSemanaReal->semana_atendida!=0)?'SI':'NO' ?></td>
            <td class="font-weight-bold cell-data-tittle"><?= ($modelSemanaReal->attributeLabels())['alumnos_faltantes'] ?></td>
            <td class="text-center"><?= $modelSemanaReal->alumnos_faltantes ?></td>
            
            <td class="font-weight-bold cell-data-tittle"><?= ($modelSemanaReal->attributeLabels())['atendidos_mujeres'] ?></td>
            <td class="text-center"><?= $modelSemanaReal->atendidos_mujeres ?></td>
            
            <!-- <td><?= $modelSemanaReal->evidencias ?></td> -->
            <td class="text-left" rowspan="2"><?= $modelSemanaReal->observaciones ?></td>
            <?php if(($model->tipo_tutoria != 0)){ ?>
                <td class="text-left" rowspan="2"><?= $modelSemanaReal->alumnos ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td class="font-weight-bold cell-data-tittle"><?= ($modelSemanaReal->attributeLabels())['total_alumnos'] ?></td>
            <td class="text-center"><?= $modelSemanaReal->total_alumnos ?></td>

            <td class="font-weight-bold cell-data-tittle"><?= ($modelSemanaReal->attributeLabels())['total_gatendidos'] ?></td>
            <td class="text-center"><?= $modelSemanaReal->total_gatendidos ?></td>
        </tr>
    </table>

    <!-- UPDATE AND DELETE BTNS

    <div class="form-row mt-2">
        <div class="col-md-10">
            <div class="alert alert-info" role="alert">
                <b>Resultados de la tutoria de esta semana!</b>
            </div>
        </div>
        <div class="col-md-1">
        <?= Html::a('Editar', ['/semana-real/update', 'id' => $modelSemanaReal->id, 'es_grupal'=> ($model->tipo_tutoria != 0) ? false : true], ['class' => 'btn btn-outline-dark w-100']) ?>
        </div>
        <div class="col-md-1">
            <?= Html::a('Eliminar', ['/semana-real/delete', 'id' => $modelSemanaReal->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro que desea eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
        </div>
    </div>
    -->

<?php } else {?>
    <div class="alert alert-info mb-2 mt-2" role="alert">
        <div class="form-row">
            <div class="col-md-10 m-auto">
                <b>Aun no se ha registrado los resultados de la tutoria de esta semana!</b>
            </div>
            <div class="col-md-2 m-auto">
                <?= Html::a('<i class="fas fa-calendar-plus"></i> Añadir', ['/semana-real/create', 'id_semana' => $model->id, 'id_grupo' => $id_grupo, 'es_grupal' => ($model->tipo_tutoria != 0) ? false : true], ['class' => 'btn-show']) ?>
            </div>
        </div>
    </div>

    <!-- CREATE BTN

    <div class="form-row mt-2">
        <div class="col-md-11">
            <div class="alert alert-info" role="alert">
                <b>Aun no se ha registrado los resultados de la tutoria de esta semana!</b>
            </div>
        </div>
        <div class="col-md-1">
            <?= Html::a('Añadir', ['/semana-real/create', 'id_semana' => $model->id, 'id_grupo' => $id_grupo, 'es_grupal'=> ($model->tipo_tutoria != 0) ? false : true], ['class' => 'btn btn-outline-dark w-100']) ?>
        </div>
    </div>
    -->
<?php }?>