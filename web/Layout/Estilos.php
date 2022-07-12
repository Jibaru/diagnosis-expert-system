<?php

namespace Layout;

class Estilos
{
    /**
     * @param string $mainPath
     */
    public function show($mainPath = "..")
    {
        ?>
            <link rel="stylesheet" href="<?php echo $mainPath; ?>/assets/lib/bootstrap-5.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?php echo $mainPath; ?>/assets/lib/fontawesome-free/css/all.min.css">
            <link rel="stylesheet" href="<?php echo $mainPath; ?>/assets/css/compartido.css">
        <?php
    }

}

?>