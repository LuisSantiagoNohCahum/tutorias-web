<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Canalizacion $model */
$this->title = $model->alumno->nombres . ' ' . $model->alumno->apellidop . ' ' . $model->alumno->apellidom;
$this->params['breadcrumbs'][] = ['label' => 'VER CONTACTO', 'url' => ['/canalizacion/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="border rounded">
    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Información del contacto</p>
    </div>
    <div class="canalizacion-view m-3">

<!--         <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Esta seguro de eliminar este elemento??',
                    'method' => 'post',
                ],
            ]) ?>
        </p> -->

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'attribute'=>'estatus',
                    'format'=>'html',
                    'value'=>($model->estatus != 0)?'<span class="text-success"><b>CANALIZADO</b></span>':'<span class="text-danger"><b>NO CANALIZADO</b></span>'
                ],
                'asunto:html',
                'cuerpo:html',
                [
                    'attribute'=>'id_alumno',
                    'value'=>$model->alumno->apellidop . ' ' . $model->alumno->apellidom . ' ' . $model->alumno->nombres
                ],
                'created_at',
                'updated_at',
            ],
        ]) ?>

    </div>
</div>
