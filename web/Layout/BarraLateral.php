<?php

namespace Layout;

class BarraLateral
{
    /**
     * @param string $mainPath
     */
    public function show($mainPath = ".")
    {
        ?>
            <nav id="barra-lateral" class="shadow-sm overflow-auto">
                <style>
                #barra-lateral {
                    height: 100%;
                    background-color: #f1f1f1;
                }

                #barra-lateral > ul {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                }

                #barra-lateral > ul > li a {
                    display: block;
                    color: #000;
                    padding: 8px 16px;
                    text-decoration: none;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                #barra-lateral ul li a:hover {
                    background-color: #555;
                    color: white;
                }
                </style>
                <ul>
                    <li>
                        <a href="<?php echo $mainPath; ?>/Consultas/Rutas/GetSintomas.php">
                            <span>Consultas</span>
                            <i class="fa-solid fa-stethoscope"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $mainPath; ?>/Resultados/Rutas/GetResultados.php">
                            <span>Resultados</span>
                            <i class="fa-solid fa-square-poll-horizontal"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php
    }
}

?>