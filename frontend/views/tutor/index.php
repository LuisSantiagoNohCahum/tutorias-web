<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
$this->title = 'PERFIL';
//$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- VERIFICAR SI TIENE GRUPO Y TUTOR ASOCUIADO A LA CUENTA PARA PODER ENTRAR AL FRONT , ROOT NO DEBERIA  -->

<div class="border rounded">
    <div class="jumbotron jumbotron-fluid pt-3 pb-3 pl-4 pr-4 bg-light form-header">
        <h1 class="display-6 text-black-50 text-uppercase form-tittle"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Información del tutor</p>
    </div>
    <!-- Añadir pestaña de informacion de grupo asignado aca -->
    <div class="row m-3">
        <div class="col-3">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#perfil" role="tab" aria-controls="home">Perfil</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#usuario" role="tab" aria-controls="profile">Usuario</a>
                <!-- <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#grupo" role="tab" aria-controls="messages">Grupo Asignado</a> -->
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="perfil" role="tabpanel" aria-labelledby="list-home-list">
                    <div class="bg-light p-3">
                        <?php $form = ActiveForm::begin(['action' => ['tutor/update', 'id'=>$modelTutor->id], 'method' => 'post']); ?>
                        <div class="form-row">
                            <div class="col-md-6">
                                <?= $form->field($modelTutor, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre completo']) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($modelTutor, 'apellido')->textInput(['maxlength' => true, 'placeholder' => 'Apellidos']) ?>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <?= $form->field($modelTutor, 'correo')->textInput(['maxlength' => true, 'placeholder' => 'Correo electronico institucinal']) ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($modelTutor, 'telefono')->textInput(['maxlength' => true, 'placeholder' => 'No. Telefono / Celular']) ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($modelTutor, 'genero')->dropDownList($modelTutor->getGenero(), ['prompt' => 'Seleccionar...', 'class' => 'form-control form-control-md']) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 p-0">
                                <?= Html::submitButton(
                                    '<i class="fas fa-save"></i> Guardar registro',
                                    ['class' => 'btn btn-outline-success']
                                )
                                ?>
                            </div>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                    
                    <!-- 
                    <?= DetailView::widget([
                        'model' => $modelTutor,
                        'attributes' => [
                            'id',
                            'nombre',
                            'apellido',
                            'correo',
                            'telefono',
                            'genero',
                            'id_user',
                        ],
                    ]) ?>
                    -->
                </div>
                <div class="tab-pane fade" id="usuario" role="tabpanel" aria-labelledby="list-profile-list">
                <div class="bg-light p-3">
                        <?php $form = ActiveForm::begin(['action' => ['tutor/actualizar-user', 'id'=>$modelUser->id], 'method' => 'post']); ?>
                        <div class="form-row">
                            <div class="col-md-6">
                                <?= $form->field($modelUser, 'id')->textInput(['maxlength' => true, 'placeholder' => 'ID', 'readonly'=>'readonly']) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($modelUser, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Usuario', 'readonly'=>'readonly']) ?>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="">Actualizar Contraseña</label>
                                <?= Html::textInput('password', '', ['type'=>'password','maxlength' => true, 'placeholder' => 'Nueva ontraseña', 'class'=> 'form-control form-control-md',]) ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($modelUser, 'email')->textInput(['type'=>'email','maxlength' => true, 'placeholder' => 'Correo electronico institucinal']) ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($modelUser, 'status')->dropDownList($modelUser->getStatusList(), ['prompt'=> 'Seleccionar...', 'class'=> 'form-control form-control-md', 'readonly'=>'readonly']) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 p-0">
                                <?= Html::submitButton(
                                    '<i class="fas fa-save"></i> Guardar registro',
                                    ['class' => 'btn btn-outline-success']
                                )
                                ?>
                            </div>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                    <!-- <?= DetailView::widget([
                        'model' => $modelUser,
                        'attributes' => [
                            'id',
                            'username',
                            'auth_key',
                            'password_hash',
                            'password_reset_token',
                            'email:email',
                            'status',
                            'created_at',
                            'updated_at',
                            'verification_token',
                        ],
                    ]) ?> -->
                </div>
                <div class="tab-pane fade" id="grupo" role="tabpanel" aria-labelledby="list-messages-list">
                    <!-- No tiene asigando ningun grupo msg -->

                    <?= DetailView::widget([
                        'model' => $modelGrupo,
                        'attributes' => [
                            'id',
                            [
                                //cambiar el widget al de kartik
                                'attribute' => 'id_periodo',
                                'format' => 'html',
                                'value' => '<b>' . $modelGrupo->periodo->nombre . '</b>',
                            ],
                            [
                                //cambiar el widget al de kartik
                                'attribute' => 'id_carrera',
                                'format' => 'html',
                                'value' => '<b>' . $modelGrupo->carrera->nombre . '</b>',
                            ],
                            [
                                //cambiar el widget al de kartik
                                'attribute' => 'id_semestre',
                                'format' => 'html',
                                'value' => '<b>' . $modelGrupo->semestre->nombre . '</b>',
                            ],
                            [
                                //cambiar el widget al de kartik
                                'attribute' => 'id_grupoLetra',
                                'format' => 'html',
                                'value' => '<b>' . $modelGrupo->grupoLetra->letra_key . '</b>',
                            ],
                            [
                                //cambiar el widget al de kartik
                                'attribute' => 'id_tutor',
                                'format' => 'html',
                                'value' => ($modelGrupo->id_tutor != null) ? Html::tag('span', $modelGrupo->tutor->nombre . ' ' . $modelGrupo->tutor->apellido, ['class' => 'text-bold']) : Html::tag('span', "SIN ASIGNAR", ['class' => 'text-danger font-weight-bold'])

                            ],
                        ],
                    ]) ?>
                </div>

            </div>
        </div>
    </div>
</div>