<?php

namespace Layout;

class Scripts
{
    /**
     * @param string $mainPath
     */
    public function show($mainPath = "..")
    {
        ?>
            <script src="<?php echo $mainPath; ?>/assets/lib/bootstrap-5.1.3/js/bootstrap.min.js"></script>
            <script src="<?php echo $mainPath; ?>/assets/lib/fontawesome-free/js/all.min.js"></script>
            <script src="<?php echo $mainPath; ?>/assets/lib/datejs/js/date.min.js"></script>
        <?php
    }

}

?>