<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Canalizacion $model */
$id_grupo = Yii::$app->request->get('id_grupo');
$this->title = 'Actualizar Contacto: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'GRUPOS ACTIVOS', 'url' => ['/grupo-master/index']];
$this->params['breadcrumbs'][] = ['label' => 'VER GRUPO', 'url' => ['/grupo-master/view', 'id'=> $id_grupo]];
$this->params['breadcrumbs'][] = ['label' => 'ADMIN ALUMNOS CONTACTADOS', 'url' => ['/canalizacion/admin-canalizacion', 'id_grupo'=> $id_grupo]];
//$this->params['breadcrumbs'][] = ['label' => 'Canalizacions', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar Contacto';
?>
<div class="canalizacion-update border rounded">

    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para actualizar información de alumno contactado</p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
