<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent" data-aos="fade-up">
        <h1 class="display-4" style="color: rgb(244, 98, 58);"><b>PROGRAMA INSTITUCIONAL DE TUTORÍAS DEL ITSVA (PIT)</b></h1>
    <hr>
        <p class="lead">Contribuir a través de la acción tutorial, al mejoramiento del rendimiento académico, la disminución de los índices de reprobación, deserción, rezago educativo para favorecer la eficiencia terminal y la formación integral del estudiante del ITSVA. </p>
        
        <p><?= Html::a('Acceder', ['site/login'], ['class'=>'btn btn-lg btn-success']) ?></p>

    </div>

    <div class="body-content" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-4">
                <div class="bg-light rounded m-1 p-3 h-100 tutoria-info-hover">
                    <h2 style="color: rgb(244, 98, 58);font-weight: 600;"><i class="far fa-check-circle"></i> Misión</h2>
                    <hr>
                    <p class="text-black-50">El Programa Institucional de Tutorías (PIT) del ITSVA tiene como misión contribuir para la calidad educativa, 
                        el desarrollo integral del estudiante, mediante estrategias que ayuden a mejorar los índices de aprovechamiento 
                        escolar, permanencia y eficiencia terminal. </p>
                </div>
                

                <!-- <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p> -->
            </div>
            <div class="col-lg-4">
                <div class="bg-light rounded m-1 p-3 h-100 tutoria-info-hover">
                    <h2 style="color: rgb(244, 98, 58);font-weight: 600;"><i class="far fa-check-circle"></i> Visión</h2>
                    <hr>
                    <p class="text-black-50">El PIT del ITSVA se proyecta como un proceso estratégico que impactará positivamente en la calidad educativa, 
                        en el desarrollo integral del estudiante, elevando los índices de aprovechamiento escolar, permanencia y 
                        eficiencia terminal, a través  del trabajo en equipo entre, directivos, docentes tutores, alumnos, padres de 
                        familia y sociedad. </p>
                </div>
                

                <!-- <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p> -->
            </div>
            <div class="col-lg-4">
                <div class="bg-light rounded m-1 p-3 h-100 tutoria-info-hover">
                    <h2 style="color: rgb(244, 98, 58); font-weight: 600;"><i class="far fa-check-circle"></i> Valores del PIT</h2>
                    <hr>
                    <p class="text-black-50">
                        <ul>
                            <li class="text-black-50">Respeto</li>
                            <li class="text-black-50">Compromiso</li>
                            <li class="text-black-50">Confianza</li>
                            <li class="text-black-50">Honestidad</li>
                            <li class="text-black-50">Espíritu de servicio</li>
                            <li class="text-black-50">Confidencialidad</li>
                            <li class="text-black-50">Liderazgo</li>
                            <li class="text-black-50">Trabajo en equipo</li>
                            <li class="text-black-50">Alto desempeño</li>
                        </ul>
                    </p>
                </div>
                

                <!-- <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p> -->
            </div>
        </div>

    </div>
</div>

<?php
$js = <<<JS
    AOS.init();
JS;

$this->registerJs($js);
?>