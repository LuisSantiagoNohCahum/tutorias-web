<?php

use app\models\SemanaReal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\SemanaRealSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Semana Reals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semana-real-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Semana Real', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_grupomaster',
            'id_semana',
            'semana_atendida',
            'alumnos_atendidos',
            //'alumnos_faltantes',
            //'total_alumnos',
            //'atendidos_hombres',
            //'atendidos_mujeres',
            //'total_gatendidos',
            //'evidencias:ntext',
            //'observaciones:ntext',
            //'alumnos:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SemanaReal $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
