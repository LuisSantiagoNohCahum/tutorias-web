<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Inicio de Sesión';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    

    <div class="row">
        <div class="col-md-7 d-flex align-items-center mt-3 mb-3">
            <?= Html::img('@web/images/tutorias.png', ['alt' => 'Itsva', 'class' => 'd-block w-75 m-auto', 'width' => '75%']); ?>
        </div>
        <div class="col-md-5 mt-3 mb-3">
            <div class="rounded border p-4 bg-light">
                <h1 style="color: rgb(244, 98, 58);font-weight: 600;"><?= Html::encode($this->title) ?></h1>

                <p>Por favor, complete los siguientes campos para acceder:</p>
                <div>
                    
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Usuario', ['style'=>'color: rgb(244, 98, 58);font-weight: 600;']) ?>

                        <?= $form->field($model, 'password')->passwordInput()->label('Contraseña', ['style'=>'color: rgb(244, 98, 58);font-weight: 600;']) ?>

                        <?= $form->field($model, 'rememberMe')->checkbox()->label('Recordar', ['style'=>'color: rgb(244, 98, 58);font-weight: 600;']) ?>
        <!-- 
                        <div style="color:#999;margin:1em 0">
                            If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                            <br>
                            Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                        </div>
        -->
                        <div class="form-group">
                            <?= Html::submitButton('<i class="fas fa-sign-in-alt"></i> Acceder', ['class' => 'btn btn-success w-100', 'name' => 'login-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
