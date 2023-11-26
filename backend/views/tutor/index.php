<?php

use app\models\Tutor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\TutorSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tutors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tutor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre',
            'apellido',
            'correo',
            'telefono',
            [
                'attribute'=> 'genero',
                'content'=>function($model){
                    return Html::tag('span',($model->genero != 0) ? 'FEMENINO':'MASCULINO', ['class'=> '']);
                }
            ],
            //'id_user',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tutor $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
