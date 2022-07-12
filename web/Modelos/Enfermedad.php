<?php

namespace Modelos;

include_once "Conexion.php";

class Enfermedad extends Conexion
{
    /**
     * Devuelve más datos de la enfermedad en función del código.
     * 
     * @param string $codigo
     * 
     * @return array<string, mixed>
     */
    public function obtenerEnfermedad($codigo)
    {
        $this->conectarDB();
        $sql = "SELECT * FROM enfermedades WHERE codigo = '$codigo'";
        $resultado = $this->conexion->query($sql);
        $this->desconectarDB();
        return $resultado->fetch_array();
    }
}

?>