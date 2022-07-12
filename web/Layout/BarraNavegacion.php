<?php

namespace Layout;

class BarraNavegacion
{
    public function show()
    {
        ?>
            <nav id="menu" class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">
                        Sistema Experto Enfermedades
                    </a>
                </div>
            </nav>
        <?php
    }
}

?>