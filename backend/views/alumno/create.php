<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Alumno $model */

$id_grupo = Yii::$app->request->get('id_grupo');
$this->title = 'Añadir Alumno';
$this->params['breadcrumbs'][] = ['label' => 'GRUPOS ACTIVOS', 'url' => ['/grupo-master/index']];
$this->params['breadcrumbs'][] = ['label' => 'VER GRUPO', 'url' => ['/grupo-master/view', 'id'=> $id_grupo]];
//$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-create border rounded">

    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Formulario para el registro de nuevo alumno</p>
    </div>

<!--     <hr class="my-4"> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
