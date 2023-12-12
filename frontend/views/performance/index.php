<?php

use app\models\Performance;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\search\PerformanceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Performances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="performance-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Performance', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_grupo',
            'eDesempeño',
            'bDesempeño',
            'arDesempeño',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Performance $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
