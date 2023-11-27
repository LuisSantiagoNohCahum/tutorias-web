<?php

use app\models\Semana;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\SemanaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Semanas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semana-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Semana', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'num_semana',
            'tipo_tutoria',
            'tematica:ntext',
            'objetivos:ntext',
            //'justificacion:ntext',
            //'estrategias_tutor:ntext',
            //'acciones:ntext',
            //'estrategias_tutorado:ntext',
            //'id_pat',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Semana $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
