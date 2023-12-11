<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <!-- <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'bordered'=>false,
        'striped'=>false,
        'condensed'=>false,
        'hover'=>true,
        'tableOptions' => [
            'class'=>'table-custom table-md'
        ],
        'panel' => [
            'type' => GridView::TYPE_LIGHT,
            'heading' => '<h6 class="panel-title mb-0">USUARIOS</h6>',
            'headingOptions'=>[
                'style'=>'font-size: small !important; margin:0; padding: 0.5rem 1.25rem;'
            ],
            'footer' => false,
        ],
        'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'],
        'toolbar' =>  [
            
        ],
        'headerRowOptions'=>[
            'class'=>'cell-data-tittle-nowidth p-2'
        ],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'filterOptions' =>[
                    'class'=>'cell-data-tittle-nowidth'
                ],
            ],
            [
                'attribute'=>'username',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                'filterOptions' =>[
                    'class'=>'cell-data-tittle-nowidth'
                ],
            ],
            [
                'attribute'=>'email',
                'format'=>'email',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                'filterOptions' =>[
                    'class'=>'cell-data-tittle-nowidth'
                ],
            ],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            [
                'attribute'=> 'status',
                'content' => function ($model) {
                    return ($model->status != 10) ? Html::tag('span','INACTIVO', ['class'=> 'badge badge-danger']) : Html::tag('span','ACTIVO', ['class'=> 'badge badge-success']);
                },
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                'filterOptions' =>[
                    'class'=>'cell-data-tittle-nowidth'
                ],
            ],
            [
                'attribute'=>'created_at',
                'format'=>'date',
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Buscar...',
                ],
                'filterOptions' =>[
                    'class'=>'cell-data-tittle-nowidth'
                ],
            ],
            //'updated_at',
            //'verification_token',
            //'rol_id',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>


</div>
