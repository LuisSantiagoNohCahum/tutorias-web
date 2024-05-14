<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Diagnostico $model */

$this->title = $model->alumno->nombres . ' ' . $model->alumno->apellidop . ' ' . $model->alumno->apellidom;
$this->params['breadcrumbs'][] = ['label' => 'VER DIAGNOSTICO', 'url' => ['/diagnostico/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="border rounded">
    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Información del diagnóstico</p>
    </div>

    <div class="diagnostico-view m-3">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'attribute'=>'id_alumno',
                    'value'=>$model->alumno->apellidop . ' ' . $model->alumno->apellidom . ' ' . $model->alumno->nombres
                ],
                [
                    'attribute' => 'motivo',
                    'format'=>'html',
                    'value' => function ($model) {
                        global $estatus;
        
                        switch ($model->motivo) {
                            case 1:
                                $estatus = 'REPETICIÓN';
                                break;
                            case 2:
                                $estatus = 'ESPECIAL';
                                break;
                            case 3:
                                $estatus = 'ATRASADA';
                                break;
                            case 4:
                                $estatus = 'GLOBAL';
                                break;
                            default:
                                $estatus = 'NOT FOUND';
                                break;
                        }
                        return '<span class="text-danger"><b>' . $estatus . '</b></span>';
                    }
                ],
                'asignaturas:html',
                'otro:html',
                'especifique:html',
            ],
        ]) ?>

    </div>
</div>
