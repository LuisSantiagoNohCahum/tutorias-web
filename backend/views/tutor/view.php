<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tutor $model */

$this->title = $model->nombre .' '.$model->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Tutores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="border rounded">
    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Información del tutor</p>
    </div>
    <div class="tutor-view m-3">
        <!-- 
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Esta seguro de eliminar este elemento??',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        -->
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nombre',
                'apellido',
                'correo',
                'telefono',
                [
                    'attribute'=> 'genero',
                    'value'=>($model->genero != 0) ? 'FEMENINO':'MASCULINO',
                    
                ],
                [
                    'attribute'=> 'id_user',
                    'value'=>$model->user->username,
                    
                ],
            ],
        ]) ?>

    </div>
</div>
