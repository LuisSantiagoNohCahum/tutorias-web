<?php
use yii\widgets\DetailView;
use yii\helpers\Html;

/** @var yii\web\View $this */
$this->title = 'Datos generales';
$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<h3 class="text-black-50 text-uppercase">Datos generales</h3>
<hr class="dropdown-divider">
<!-- VERIFICAR SI TIENE GRUPO Y TUTOR ASOCUIADO A LA CUENTA PARA PODER ENTRAR AL FRONT , ROOT NO DEBERIA  -->


<!-- Añadir pestaña de informacion de grupo asignado aca -->
<div class="row">
    <div class="col-3">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#perfil" role="tab" aria-controls="home">Perfil</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#usuario" role="tab" aria-controls="profile">Usuario</a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#grupo" role="tab" aria-controls="messages">Grupo Asignado</a>
        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="perfil" role="tabpanel" aria-labelledby="list-home-list">
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
            </div>
            <div class="tab-pane fade" id="usuario" role="tabpanel" aria-labelledby="list-profile-list">
            <?= DetailView::widget([
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
            ]) ?>
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
                            'value' => '<b>'.$modelGrupo->periodo->nombre.'</b>',
                        ],
                        [
                            //cambiar el widget al de kartik
                            'attribute' => 'id_carrera',
                            'format' => 'html',
                            'value' => '<b>'.$modelGrupo->carrera->nombre.'</b>',
                        ],
                        [
                            //cambiar el widget al de kartik
                            'attribute' => 'id_semestre',
                            'format' => 'html',
                            'value' => '<b>'.$modelGrupo->semestre->nombre.'</b>',
                        ],
                        [
                            //cambiar el widget al de kartik
                            'attribute' => 'id_grupoLetra',
                            'format' => 'html',
                            'value' => '<b>'.$modelGrupo->grupoLetra->letra_key.'</b>',
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