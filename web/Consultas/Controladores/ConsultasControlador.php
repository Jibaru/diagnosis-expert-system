<?php

namespace Consultas\Controladores;

include_once "../../Modelos/Enfermedad.php";
include_once "../../Modelos/Sintoma.php";
include_once "../../Modelos/SistemaExperto.php";
include_once "../../Modelos/Resultado.php";
include_once "../Vistas/VistaConsultas.php";
include_once "../Vistas/VistaConsultaRealizada.php";

use Consultas\Vistas\VistaConsultaRealizada;
use Consultas\Vistas\VistaConsultas;
use Modelos\Enfermedad;
use Modelos\Sintoma;
use Modelos\SistemaExperto;
use Modelos\Resultado;

class ConsultasControlador
{
    /**
     * Devuelve la vista con el listado de sintomas disponibles.
     */
    public function listarSintomas()
    {
        $modeloSintoma = new Sintoma();
        $sintomas = $modeloSintoma->obtenerTodos();

        $vistaConsultas = new VistaConsultas();
        $vistaConsultas->show($sintomas);
    }

    /**
     * Realiza y guarda la consulta. Luego devuelve una vista con
     * el resultado.
     * 
     * @param array<string> $idsSintomasSeleccionados
     */
    public function realizarConsulta($idsSintomasSeleccionados)
    {
        $modeloSintoma = new Sintoma();
        $modeloSistemaExperto = new SistemaExperto();

        $resultado = $modeloSistemaExperto->consultarEnfermedad($idsSintomasSeleccionados);

        $sintomas = $modeloSintoma->obtenerVariosPorId($idsSintomasSeleccionados);
        $vistaConsultaRealizada = new VistaConsultaRealizada();

        if (is_null($resultado)) {
            $vistaConsultaRealizada->show($sintomas);
        } else {
            $modeloResultado = new Resultado();
            $modeloResultado->crear($idsSintomasSeleccionados, $resultado);

            $modeloEnfermedad = new Enfermedad();
            $enfermedad = $modeloEnfermedad->obtenerEnfermedad($resultado);
            $vistaConsultaRealizada->show($sintomas, $enfermedad);
        }
    }
}

?>