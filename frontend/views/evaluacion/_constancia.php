<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\GrupoMaster $modelGrupo */
/** @var app\models\Alumno $modelAlumno */

#agregar header con logo
#poner fechas en periodo y no nombre
?>
<!-- <?= Html::img('@web/images/itsva.png', ['alt'=>'Itsva', 'class'=>'mb-2 mt-2 border-0', 'width'=>'75%', 'style' => 'opacity: 0.5']);?> -->

<div style="font-family: Arial, Helvetica, sans-serif !important;">
    <h4 style="text-align: center; font-weight: bold;"><b>CONSTANCIA DE CUMPLIMIENTO DE ACTIVIDAD COMPLEMENTARIA</b></h4>
    <p style="text-align: center;text-decoration: underline;">“Jornada Nacional del Conocimiento (Semana Nacional del Conocimiento)”</p>

    <section style="text-align: left; font-weight: bold;">
        <p>
            Lic. Ana Patricia Dzib Cupul, M.A.N.
            <br>
            Jefe del Departamento de Servicios Escolares 
            <br>
            PRESENTE
        </p>
    </section>
        <?php 
        $promedio = 0;
        $sumaCalificaciones = 0;
        $estatus = "NA";

        $calificaciones = $modelAlumno->evaluacions;
        
        if (!empty($calificaciones)) {

            foreach ($calificaciones as $key => $calificacion) $sumaCalificaciones += $calificacion->calificacion;

            $promedio = ($sumaCalificaciones > 0) ? $sumaCalificaciones/count($calificaciones) : 0;
        }
        

        if ($promedio < 1) $estatus = 'INSUFICIENTE';
        elseif ($promedio < 1.5) $estatus = 'SUFICIENTE';
        elseif ($promedio < 2.5) $estatus = 'BUENO';
        elseif ($promedio < 3.5) $estatus = 'NOTABLE';
        elseif ($promedio <= 4) $estatus = 'EXCELENTE';

        date_default_timezone_set(date_default_timezone_get());
        setlocale(LC_TIME, 'es_MXN.UTF-8','esp');

        ?>
        <p style="margin-top: 2rem; margin-bottom: 2rem; text-align: justify;">
            El que suscribe <span style="font-weight: bold;"><?=$modelGrupo->tutor->nombre . ' ' . $modelGrupo->tutor->apellido?></span>, por este medio se permite 
            hacer de su conocimiento que el estudiante <span style="font-weight: bold;"><?= $modelAlumno->nombres . ' ' . $modelAlumno->apellidop . ' ' . $modelAlumno->apellidom?></span> 
            con número de control <span style="font-weight: bold;"><?= $modelAlumno->matricula?></span>
            de la carrera de <span style="font-weight: bold;"><?=$modelGrupo->carrera->nombre?></span> ha cumplido su actividad complementaria con el nivel de desempeño <span style="font-weight: bold;"><?= $estatus?></span> y un 
            valor numérico de <span style="font-weight: bold;"><?= number_format($promedio, 2, '.', ',')?></span>, 
            durante el período escolar <span style="font-weight: bold;"><?= strftime('%B %Y', strtotime($modelGrupo->periodo->date_start))?> - <?= strftime('%B %Y', strtotime($modelGrupo->periodo->date_end))?></span> 
            con un valor curricular de <span style="font-weight: bold;">1</span> créditos.
        </p>
        <p>
            Se extiende la presente en la ciudad de Valladolid, Yucatán a los  <?= date("d")?>  días de  <?= strftime('%B', time())?>  de <?= date("Y")?>.
        </p>
        <div style="text-align: center;">
            <h6 style="font-weight: bold;">ATENTAMENTE</h6>

            <div style="width: 100px; height: 50px; text-align: center; margin: auto;">
                <h6 style="color: #d4d4d4; margin: auto;">SELLO</h6>
            </div>
        </div>

        <div style="width:100%; padding: 10px;">
            <table style="width:100%; margin: auto;">
                <tr>
                    <td style="width: 40%; border-bottom: 1px black solid !important; text-align: center;">
                        _____________________________
                    </td>
                    <td style="width: 20%;"></td>
                    <td style="width: 40%; border-bottom: 1px black solid !important; text-align: center;">
                        _____________________________
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <p>
                            <?=$modelGrupo->tutor->nombre . ' ' . $modelGrupo->tutor->apellido?>
                        <br>
                        DOCENTE RESPONSABLE
                        </p>
                    </td>
                    <td></td>
                    <td style="text-align: center;">
                        <p>
                            Vo. Bo. Del Jefe(a) del
                            <br>
                            Departamento de Carreras Profesionales
                        </p>
                    </td>
                </tr>
            </table>
        </div>
        <p>
            c.c.p. Jefe(a) de Departamento correspondiente.
        </p>
    
</div>