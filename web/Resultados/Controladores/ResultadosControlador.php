<?php

namespace Resultados\Controladores;

include_once "../../Modelos/Resultado.php";
include_once "../Vistas/VistaListadoResultados.php";

use Resultados\Vistas\VistaListadoResultados;
use Modelos\Resultado;

class ResultadosControlador
{
    /**
     * Devuelve la vista con el listado de resultados.
     * 
     * @param int $pagina
     */
    public function listarResultados($pagina)
    {
        $resultadoModelo = new Resultado();
        $resultadosPaginados = $resultadoModelo->obtenerTodosPaginado($pagina);

        $vistaListadoResultados = new VistaListadoResultados();
        $vistaListadoResultados->show($resultadosPaginados);
    }
}