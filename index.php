<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecNM Campus Tapachula</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <style>
    form {
        margin: 0 auto;
        width: auto;
        /* width: 250px; */
        padding: 15px;
    }

    input {
        border-radius: 30px !important;
    }

    ul {
        list-style: none;
    }
    </style>

</head>

<body>
    <div class="container">
        <!-- Modal de confirmación-->
        <div class="modal fade" id="espere" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <font color="blue">Estamos guardando sus respuestas</font>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="modalbdy">
                        <b>
                            <p>Por favor espere mientras la información está siendo procesada...</p>
                        </b><br>
                        <div align="center"><img src="img/guardando.gif"></div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success" data-dismiss="modal">Terminar</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- Cierre modal confirmación -->
        <table align="center" class="animated fadeInDown mt-5">
            <tbody class="row-hover">
                <tr class="row-1 odd">
                    <td width="20%" class="column-1"><img src="img/sep.png" alt="" width="200" height="60"></td>
                    <td width="20%" class="column-1">&nbsp;</td>
                    <td width="20%" class="column-2"><img src="img/tecnm.png" alt="" width="200" height="70"></td>
                    <td width="20%" class="column-1">&nbsp;</td>
                    <td width="20%" class="column-3"><img src="img/itt.png" alt="" width="60" height="60"></td>
                </tr>
            </tbody>
        </table>


        <div align="center" class="animated fadeInDown">
            <font size="3"><b>INSTITUTO TECNOLÓGICO DE TAPACHULA</b></font>
        </div>
        <?php
        require ('lib/fecha.php');
        $fecha=date("d-m-Y H:i:s");
        echo "<div align='right' class='animated fadeInDown'><b>Fecha: ",fechaespanol($fecha),"</b></div>";
        ?>
        <table class="table">
            <tr class="table-success">
                <td align="center"><img src="img/logo.png" width="80" height="50">
                    <font size="2"><b>&nbsp;ENCUESTA DE NUEVO INGRESO</font></b>
                </td>
            </tr>
        </table>
        <form id="encuesta">
            <div class="form-group">
                <b>Nombre:</b>
                <input class="form-control" style="width: 400px;" type="text" class="form-control rounded-pill"
                    id="nombre" name="nombre" required minlength="10" maxlength="60">
            </div>
            <div class="mt-3">
                <b class="mt-3">Edad:</b>
                <!-- <input type="number" style="width: 70px;" class="form-control rounded-pill" id="edad" name="edad"
                    required maxlength="2"> -->
                <input type="text" style="width: 70px;" name="edad" id="edad" maxlength="2" pattern="[0-9]{2}"
                    required />
            </div>

            <div class="mt-3">
                <b>Sexo:</b>
                <select name="sexo" id="sexo" required>
                    <option value="">Seleccionar</option>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                </select>
            </div>

            <div class="mt-3">
                <b>Municipio:</b>
                <select name="select_municipio" id="select_municipio" onchange="obtenerLocalidades(this.value)"
                    required>
                    <option value="">Seleccionar</option>
                    <?php 
                    require 'lib/conexion.php';
                    $query = "SELECT * FROM municipios ORDER BY municipio";
                    $query_res = mysqli_query($con, $query);
                    while($row = mysqli_fetch_array($query_res)){
                        echo '<option value='.$row['municipio'].'>'.$row['municipio'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mt-3" id="localidades">
                <!-- <b>Localidad:</b> -->
            </div>
            <div class="mt-3" id="escuelas_procedencia">

            </div>
            <div class="mt-3">
                <b>Promedio:</b>
                <select name="promedio" id="promedio">
                    <option value="">Seleccionar</option>
                    <option value="R1">Entre 6.0 y 6.5</option>
                    <option value="R2">Entre 6.6 y 7.0</option>
                    <option value="R3">Entre 7.1 y 7.5</option>
                    <option value="R4">Entre 7.6 y 8.0</option>
                    <option value="R5">Entre 8.1 y 8.5</option>
                    <option value="R6">Entre 8.6 y 9.0</option>
                    <option value="R7">Entre 9.1 y 9.5</option>
                    <option value="R8">Entre 9.6 y 9.99</option>
                    <option value="R9">10</option>
                </select>
            </div>

            <div class="mt-3">
                <b>Carrera a ingresar:</b>
                <ul>
                    <li>
                        <label>
                            <input type="radio" class="carrera" name="carrera" value="IGE" required> Ing. en Gestión
                            Empresarial
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" class="carrera" name="carrera" value="ISC"> Ing. en Sistemas
                            Computacionales
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" class="carrera" name="carrera" value="IC"> Ing. Civil
                        </label>
                    </li>

                    <li>
                        <label>
                            <input type="radio" class="carrera" name="carrera" value="II"> Ing. Industrial
                        </label>

                    </li>
                    <li> <label>
                            <input type="radio" class="carrera" name="carrera" value="IQ"> Ing. Química
                        </label>
                    </li>
                    <li> <label><input type="radio" class="carrera" name="carrera" value="IE"> Ing. Electromecánica
                        </label>
                    </li>
                </ul>

            </div>

            <div class="mt-3">
                <b>¿Cómo te enteraste de las ingenierías que oferta el TecNM Campus Tapachula?</b>
                <ul>
                    <li><label><input type="checkbox" name="oferta_radio" id="enterado_radio"
                                onchange="checkBox(this.id);" value="0">
                            Radio</label>
                        <!-- <input type="hidden" id="medio_radio_i"> -->
                    </li>
                    <li><label><input type="checkbox" name="oferta_tv" id="enterado_tv" onchange="checkBox(this.id);"
                                value="0">
                            TV</label>
                        <!-- <input type="hidden" id="medio_tv_i"> -->
                    </li>
                    <li><label><input type="checkbox" name="oferta_portal" id="enterado_portal"
                                onchange="checkBox(this.id);" value="0">
                            Página Web</label>
                        <!-- <input type="hidden" id="medio_portal_i"> -->
                    </li>
                    <li><label><input type="checkbox" name="oferta_facebook" id="enterado_facebook"
                                onchange="checkBox(this.id);" value="0">
                            Facebook</label>
                        <!-- <input type="hidden" id="medio_facebook_i"> -->
                    </li>
                    <li><label><input type="checkbox" name="oferta_instagram" id="enterado_instagram"
                                onchange="checkBox(this.id);" value="0">
                            Instagram</label>
                        <!-- <input type="hidden" id="medio_instagram_i"> -->
                    </li>
                    <li><label><input type="checkbox" name="oferta_presencial" id="enterado_presencial"
                                onchange="checkBox(this.id);" value="0"> Asistieron
                            a mi escuela</label>
                        <!-- <input type="hidden" id="medio_presencial_i"> -->
                    </li>
                    <li><label><input type="checkbox" name="oferta_referencia" id="enterado_referencia"
                                onchange="checkBox(this.id);" value="0"> Referencia
                            de familiares</label>
                        <!-- <input type="hidden" id="medio_referencia_i"> -->
                    </li>
                    <li><label for="#medio_otro">Otro: <input type="text" name="oferta_otro" id="enterado_otro"
                                maxlength="30"></label>
                    </li>
                </ul>
            </div>
            <div class="mt-3">
                <b>Como profesionista, ¿te gustaría laborar en?</b>
                <ul>
                    <li><label><input type="radio" name="empleo" id="empleo" value="SDS"> Supervisor
                            de Servicios</label>
                    </li>
                    <li><label><input type="radio" name="empleo" id="empleo" value="ADP"> Analista de
                            procesos</label></li>
                    <li><label><input type="radio" name="empleo" id="empleo" value="JDP"> Jefe de
                            planta</label></li>
                    <li><label><input type="radio" name="empleo" id="empleo" value="ADC"> Analista de
                            costos</label></li>
                    <li><label><input type="radio" name="empleo" id="empleo" value="JDD"> Jefe de
                            distribución</label></li>
                    <li><label><input type="radio" name="empleo" id="empleo" value="JDL"> Jefe de logística</label></li>
                    <li><label><input type="radio" name="empleo" id="empleo" value="GG"> Gerente general</label></li>
                    <li><label><input type="radio" name="empleo" id="empleo" value="AOCDE"> Asesor o consultor de
                            empresas</label>
                    </li>
                    <li><label><input type="radio" name="empleo" id="empleo" value="DEI"> Diseño e investigación</label>
                    </li>
                    <li><label><input type="radio" name="empleo" id="empleo" value="DDS"> Desarrollador de
                            sistemas</label></li>
                    <li><label><input type="radio" name="empleo" id="empleo" value="IDR"> Ingeniero de redes</label>
                    </li>

                </ul>
            </div>
            <div class="mt-3 form-group">
                <b>¿Por qué decidiste estudiar con nosotros?</b>
                <select name="select_motivo" id="select_motivo">
                    <option value="">Seleccionar</option>
                    <option value="RCB">Relación costo beneficio</option>
                    <option value="DCD">Disponibilidad de una carrera deseada</option>
                    <option value="RI">Reputación de la institución</option>
                    <option value="OT">Oportunidades de trabajo al graduarse de la institución</option>
                    <option value="PC">Proximidad a casa</option>
                    <option value="PR">Por recomendación de un familiar a conocido</option>
                </select>
            </div>
            <div class="mt-3">
                <b>¿Cómo consideras la calidad de la información brindada acerca de las ingenierías?</b>
                <ul>
                    <li><label><input type="radio" name="calidad_inf" id="calidad_inf" value="5"> Muy buena</label></li>
                    <li><label><input type="radio" name="calidad_inf" id="calidad_inf" value="4"> Buena</label></li>
                    <li><label><input type="radio" name="calidad_inf" id="calidad_inf" value="3"> Normal</label></li>
                    <li><label><input type="radio" name="calidad_inf" id="calidad_inf" value="2"> Mala</label></li>
                    <li><label><input type="radio" name="calidad_inf" id="calidad_inf" value="1"> Muy mala</label></li>
                </ul>
            </div>
            <div class="mt-3">
                <b>Hasta el momento ¿Cómo ha sido la atención brindada durante todo el proceso de inscripción?</b>
                <ul>
                    <li><label><input type="radio" name="calidad_atencion" id="calidad_atencion" value="5"> Muy
                            buena</label></li>
                    <li><label><input type="radio" name="calidad_atencion" id="calidad_atencion" value="4">
                            Buena</label></li>
                    <li><label><input type="radio" name="calidad_atencion" id="calidad_atencion" value="3">
                            Normal</label></li>
                    <li><label><input type="radio" name="calidad_atencion" id="calidad_atencion" value="2"> Mala</label>
                    </li>
                    <li><label><input type="radio" name="calidad_atencion" id="calidad_atencion" value="1"> Muy
                            mala</label></li>
                </ul>
            </div>
            <div class="mt-3">
                <b>¿Cuál medio consideras que sea la mejor vía de información acerca de las Ingenierías del TecNM Campus
                    Tapachula?</b>
                <ul>
                    <li><label><input type="radio" name="via_informacion" id="via_informacion" value="RADIO"
                                onchange="habilita_via_informacion_otro(this.id);">
                            Radio</label></li>
                    <li><label><input type="radio" name="via_informacion" id="via_informacion" value="TV"
                                onchange="habilita_via_informacion_otro(this.id);"> TV</label>
                    </li>
                    <li><label><input type="radio" name="via_informacion" id="via_informacion" value="PORTAL WEB"
                                onchange="habilita_via_informacion_otro(this.id);"> Página Web</label></li>
                    <li><label><input type="radio" name="via_informacion" id="via_informacion" value="FACEBOOK"
                                onchange="habilita_via_informacion_otro(this.id);">
                            Facebook</label> </li>
                    <li><label><input type="radio" name="via_informacion" id="via_informacion" value="INSTAGRAM"
                                onchange="habilita_via_informacion_otro(this.id);"> Instagram</label></li>
                    <li><label><input type="radio" name="via_informacion" id="via_informacion" value="PRESENCIAL"
                                onchange="habilita_via_informacion_otro(this.id);"> Que asistan a mi
                            escuela</label></li>
                    <li><label><input type="radio" name="via_informacion" id="via_informacion_otro"
                                onchange="habilita_via_informacion_otro(this.id);">
                            Otro:</label>
                        <input type="text" name="via_informacion" id="via_inf_otro_text" disabled maxlength="20">
                    </li>
                </ul>
            </div>

            <div class="mt-3">
                <b> ¿Cómo consideras la complejidad respecto al proceso de Inscripción?</b>
                <ul>
                    <li><label><input type="radio" name="complejidad_inscripcion" value="5"> Muy fácil</label></li>
                    <li><label><input type="radio" name="complejidad_inscripcion" value="4"> Fácil</label></li>
                    <li><label><input type="radio" name="complejidad_inscripcion" value="3"> Normal</label></li>
                    <li><label><input type="radio" name="complejidad_inscripcion" value="2"> Difícil</label></li>
                    <li><label><input type="radio" name="complejidad_inscripcion" value="1"> Muy difícil</label></li>
                </ul>
            </div>
            <div class="mt-3">
                <b>Hasta el momento ¿Qué te gustaría que se mejorara en el proceso de promoción e inscripción?</b><br>
                <textarea name="comentarios" id="comentarios" cols="40" rows="5" maxlength="400"></textarea>
            </div>
            <div align="center" class="mt-3"><input type="submit" class="btn btn-primary" id="btnEnviar"
                    value="Aceptar">
            </div>
        </form>
    </div>

    <script src="utils/js/respondeEncuesta.js"></script>
    <script src="utils/js/obtenerLocalidades.js"></script>
    <script src="utils/js/obtenerEscuelas.js"></script>
    <script src="utils/js/checkBox.js"></script>
    <script src="utils/js/habilita_input.js"></script>
</body>

</html>