<?php

namespace Principal\Vistas;

include_once "./Layout/Estilos.php";
include_once "./Layout/Scripts.php";
include_once "./Layout/BarraNavegacion.php";
include_once "./Layout/BarraLateral.php";

use Layout\Estilos;
use Layout\Scripts;
use Layout\BarraNavegacion;
use Layout\BarraLateral;

class VistaPrincipal
{
    /**
     * @param string $mainPath
     */
    public function show($mainPath = "../..")
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
                <?php $estilos->show($mainPath) ?>
            </head>

            <body>
                <main>
                    <?php $barraNavegacion->show(); ?>
                    <?php $barraLateral->show(); ?>
                    <section id="main">
                        <h2>Bienvenido al sistema</h2>
                        <h4>Integrantes:</h4>
                        <ul>
                            <li>Cóndor García Daniel Josué</li>
                            <li>Motta Loayza Paul Angelo</li>
                            <li>Rueda Boada Ignacio Raúl</li>
                        </ul>
                    </section>
                </main>
                <?php $scripts->show($mainPath); ?>
            </body>

            </html>
        <?php
    }
}

?>