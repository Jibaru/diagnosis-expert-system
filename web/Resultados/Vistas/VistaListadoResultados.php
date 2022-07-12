<?php

namespace Resultados\Vistas;

include_once "../../Layout/Estilos.php";
include_once "../../Layout/Scripts.php";
include_once "../../Layout/BarraNavegacion.php";
include_once "../../Layout/BarraLateral.php";

use Layout\Estilos;
use Layout\Scripts;
use Layout\BarraNavegacion;
use Layout\BarraLateral;

class VistaListadoResultados
{
    /**
     * @param array $resultadosPaginados
     */
    public function show($resultadosPaginados)
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
                <title>Resultados</title>
                <?php $estilos->show("../..") ?>
            </head>

            <body>
                <main>
                    <?php $barraNavegacion->show(); ?>
                    <?php $barraLateral->show("../.."); ?>
                    <section id="main">
                        <h2>Resultados</h2>
                        <div class="card shadow-sm mb-2">
                            <div class="card-body">
                                <table class="table">
                                    <thead class="table-dark">
                                        <th>Fecha Consulta</th>
                                        <th>Enfermedad</th>
                                        <th>Síntomas Consultados</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($resultadosPaginados["datos"] as $resultado) { ?>
                                        <tr>
                                            <td>
                                                <span class="badge bg-success">
                                                    <?php echo date_format(date_create($resultado["fecha_consulta"]), "d/m/Y H:i"); ?>
                                                </span>
                                            </td>
                                            <td><?php echo $resultado["nombre_enfermedad"]; ?></td>
                                            <td>
                                                <?php foreach ($resultado["sintomas"] as $sintomaNombre) { ?>
                                                <span class="badge bg-primary"><?php echo $sintomaNombre; ?></span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <nav aria-label="paginacion">
                                    <ul class="pagination">
                                        <li class="page-item <?php if (is_null($resultadosPaginados["pagina_anterior"])) { echo "disabled"; } ?>">
                                            <a class="page-link" href="../Rutas/GetResultados.php?pagina=<?php echo $resultadosPaginados["pagina_anterior"]; ?>">Anterior</a>
                                        </li>
                                        <?php for ($i = 1; $i <= $resultadosPaginados["total_paginas"]; $i++) { ?>
                                        <li class="page-item">
                                            <a class="page-link" href="../Rutas/GetResultados.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                        <?php } ?>
                                        <li class="page-item <?php if (is_null($resultadosPaginados["pagina_siguiente"])) { echo "disabled"; } ?>">
                                            <a class="page-link" href="../Rutas/GetResultados.php?pagina=<?php echo $resultadosPaginados["pagina_siguiente"]; ?>">Siguiente</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
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