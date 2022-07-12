<?php

namespace Modelos;

include_once "PuntoEnv.php";

class Conexion
{
    protected $host;
    protected $nombre_bd;
    protected $usuario;
    protected $contrasenia;
    protected $conexion;

    public function __construct()
    {
        $puntoEnv = new PuntoEnv("../../.env");
        $puntoEnv->cargar();
        $this->host        = getenv("GRUPO_01_ENFERMEDADES_HOST") !== false
            ? getenv("GRUPO_01_ENFERMEDADES_HOST") 
            : "localhost";
        $this->puerto      = getenv("GRUPO_01_ENFERMEDADES_PORT") !== false
            ? getenv("GRUPO_01_ENFERMEDADES_PORT") 
            : "3306";
        $this->nombre_bd   = getenv("GRUPO_01_ENFERMEDADES_NOMBRE_BD") !== false
            ? getenv("GRUPO_01_ENFERMEDADES_NOMBRE_BD") 
            : "grupo_01_enfermedades";
        $this->usuario     = getenv("GRUPO_01_ENFERMEDADES_USUARIO_BD") !== false
            ? getenv("GRUPO_01_ENFERMEDADES_USUARIO_BD") 
            : "root";
        $this->contrasenia = getenv("GRUPO_01_ENFERMEDADES_CONTRASENIA_BD") !== false
            ? getenv("GRUPO_01_ENFERMEDADES_CONTRASENIA_BD") 
            : "root";
    }

    protected function conectarDB()
    {
        $this->conexion = mysqli_connect(
            $this->host, 
            $this->usuario, 
            $this->contrasenia, 
            $this->nombre_bd,
            $this->puerto
        );

        if (!$this->conexion) {
            echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
            echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        mysqli_set_charset($this->conexion, "utf8mb4");
    }

    protected function desconectarDB()
    {
        mysqli_close($this->conexion);
    }
}

?>