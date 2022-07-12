<?php

include_once "../../Shared/Vistas/VistaMensajeSistema.php";
include_once "../Controladores/ConsultasControlador.php";

use Shared\Vistas\VistaMensajeSistema;
use Consultas\Controladores\ConsultasControlador;

$sintomasSeleccionados = array_keys($_POST);

if (count($sintomasSeleccionados) == 0) {
    $vistaMensajeSistema = new VistaMensajeSistema();
    $vistaMensajeSistema->volverShow("Debe seleccionar al menos un síntoma.", "GetSintomas.php");
} else {
    $consultasControlador = new ConsultasControlador();
    $consultasControlador->realizarConsulta($sintomasSeleccionados);
}

?>