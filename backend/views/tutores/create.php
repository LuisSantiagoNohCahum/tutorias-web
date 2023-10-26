<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tutores $model */

$this->title = 'Create Tutores';
$this->params['breadcrumbs'][] = ['label' => 'Tutores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
