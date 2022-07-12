<?php

namespace Consultas\Vistas;

include_once "../../Layout/Estilos.php";
include_once "../../Layout/Scripts.php";
include_once "../../Layout/BarraNavegacion.php";
include_once "../../Layout/BarraLateral.php";

use Layout\Estilos;
use Layout\Scripts;
use Layout\BarraNavegacion;
use Layout\BarraLateral;

class VistaConsultaRealizada
{
    /**
     * @param array $sintomas
     * @param array<string, mixed>|null $enfermedad
     */
    public function show($sintomas, $enfermedad = null)
    {
        $estilos = new Estilos();
        $scripts = new Scripts();
        $barraNavegacion = new BarraNavegacion();
        $barraLateral = new BarraLateral();

        ?>
            <!DOCTYPE html>
            <html lang="es">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Consulta realizada</title>
                <?php $estilos->show("../..") ?>
            </head>

            <body>
                <main>
                    <?php $barraNavegacion->show(); ?>
                    <?php $barraLateral->show("../.."); ?>
                    <section id="main">
                        <h2>Consulta Realizada</h2>
                        <div class="card shadow-sm mb-2">
                            <div class="card-body">
                                <table class="table">
                                    <thead class="table-dark">
                                        <th colspan="1">Código</th>
                                        <th colspan="4">Sintoma</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sintomas as $sintoma) { ?>
                                            <tr>
                                                <td colspan="1"><?php echo $sintoma["codigo"]; ?></td>
                                                <td><?php echo $sintoma["nombre"]; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="alert alert-success">
                            Resultado: <?php echo (($enfermedad) ? $enfermedad["nombre"] : "NO DETERMINADO"); ?>
                        </div>
                    </section>
                </main>
                <?php $scripts->show("../.."); ?>
            </body>

            </html>
        <?php
    }
}

?>