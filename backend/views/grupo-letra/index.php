<?php

use app\models\GrupoLetra;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\GrupoLetraSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Grupo Letras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupo-letra-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Grupo Letra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'letra_key',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, GrupoLetra $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
