<?php 
use yii\widgets\DetailView;
use yii\bootstrap4\Html;

?>

<?= $this->render('_details', [
        'model' => $model,
    ]) ?>

<?php if($modelSemanaReal != null) {?>

<?php } else {?>
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
    
<?php }?>