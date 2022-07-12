<?php

include_once "../Controladores/ConsultasControlador.php";

use Consultas\Controladores\ConsultasControlador;

$consultasControlador = new ConsultasControlador();
$consultasControlador->listarSintomas();