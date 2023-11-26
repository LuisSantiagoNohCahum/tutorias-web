<?php

use app\models\Alumno;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\AlumnoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Alumnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Alumno', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombres',
            'apellidop',
            'apellidom',
            'matricula',
            //'correo',
            //'telefono',
            //'fecha_nac',
            //'ciudad',
            //'genero',
            //'created_at',
            //'updated_at',
            //'id_grupo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Alumno $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
