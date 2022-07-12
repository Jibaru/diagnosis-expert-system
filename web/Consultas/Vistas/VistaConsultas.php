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

class VistaConsultas
{
    /**
     * @param array<string, mixed> $sintomas
     */
    public function show($sintomas)
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
                <title>Principal</title>
                <?php $estilos->show("../..") ?>
            </head>

            <body>
                <main>
                    <?php $barraNavegacion->show(); ?>
                    <?php $barraLateral->show("../.."); ?>
                    <section id="main">
                        <h2>Realizar consulta</h2>
                        <form action="PostConsulta.php" method="POST">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    Seleccione los síntomas del paciente:
                                    <div class="row ps-3 pe-3">
                                        <?php foreach ($sintomas as $sintoma) { ?>
                                        <div class="form-check col-md-4">
                                            <label for="<?php echo $sintoma["codigo"]; ?>"
                                                class="form-check-label"><?php echo '(' . $sintoma["codigo"] . ') '. $sintoma["nombre"] ?></label>
                                            <input id="<?php echo $sintoma["codigo"]; ?>" name="<?php echo $sintoma["codigo"]; ?>"
                                                type="checkbox" class="form-check-input">
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary">Realizar consulta</button>
                                </div>
                            </div>
                        </form>
                    </section>
                </main>
                <?php $scripts->show("../.."); ?>
            </body>

            </html>
        <?php
    }
}

?>