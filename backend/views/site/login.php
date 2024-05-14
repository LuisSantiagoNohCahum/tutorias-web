<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Inicio De Sesión';
?>
<div class="main-login-container">
    <div class="left-login-container">
        <div class="content-banner-login">
            <section>
                
                <h2 class="text-uppercase text-white-50 text-center">Sistema Administrativo de control de tutorias</h2>
                <div class="logos-login text-center">
                    <?= Html::img('@web/images/logoitsva.png', ['alt' => 'Itsva', 'class' => 'mb-2 mt-2 border-0']); ?>
                </div>
                
            </section>
            <section class="text-white">

                <blockquote>
                    <p>
                        <em>Contribuir a través de la acción tutorial, al mejoramiento del rendimiento académico, la disminución de los índices de reprobación, deserción, rezago educativo para favorecer la eficiencia terminal y la formación integral del estudiante del ITSVA. </em>
                    </p>
                </blockquote>
            </section>
        </div>
    </div>
    <div class="rigth-login-container">
        <div class="site-login-card">
            <div class="col-lg-8 ml-auto mr-auto">
                <div class="card">
                    <div class="card-header">
                        <h4><?= Html::encode($this->title) ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <?= Html::img('@web/images/tutorias.png', ['alt' => 'Itsva', 'class' => 'img-thumbnail mb-2 mt-2 border-0', 'width' => '50%']); ?>
                        </div>
                        <hr>
                        <p>Por favor complete los siguientes campos para iniciar sesión:</p>
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'username')->textInput(['class' => 'form-control form-control-lg', 'autofocus' => true])->label('<b>Usuario</b>',['class'=>'label-class']) ?>
                        <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-lg'])->label('<b>Contraseña</b>',['class'=>'label-class']) ?>
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Iniciar Sesión', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>