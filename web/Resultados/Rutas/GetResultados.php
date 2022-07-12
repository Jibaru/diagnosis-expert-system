<?php

include_once "../Controladores/ResultadosControlador.php";

use Resultados\Controladores\ResultadosControlador;

if (array_key_exists("pagina", $_GET)) {
    $pagina = (int) ($_GET["pagina"]);
} else {
    $pagina = 1;
}

$resultadosControlador = new ResultadosControlador();
$resultadosControlador->listarResultados($pagina);