<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* use kartik\detail\DetailView; */

/** @var yii\web\View $this */
/** @var app\models\Alumno $model */

$id_grupo = Yii::$app->request->get('id_grupo');
$this->title = $model->nombres . ' ' . $model->apellidop . ' ' . $model->apellidom;
$this->params['breadcrumbs'][] = ['label' => 'GRUPOS ACTIVOS', 'url' => ['/grupo-master/index']];
$this->params['breadcrumbs'][] = ['label' => 'VER GRUPO', 'url' => ['/grupo-master/view', 'id'=> $id_grupo]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="border rounded">
    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Información del alumno</p>
    </div>
    <div class="alumno-view m-3">

        <?= DetailView::widget([
            'model' => $model,
            'options'=>[
                'class'=>'table table-sm'
            ],
            'attributes' => [
                //'id',
                'nombres',
                'apellidop',
                'apellidom',
                'matricula',
                'correo',
                'telefono',
                'fecha_nac',
                'ciudad',
                [
                    'attribute'=>'genero',
                    'value'=> ($model->genero != 0) ?'FEMENINO':'MASCULINO',
                ],
                'created_at',
                'updated_at',
                //'id_grupo',
            ],
        ]) ?>

    </div>
</div>