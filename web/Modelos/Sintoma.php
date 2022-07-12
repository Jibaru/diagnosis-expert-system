<?php

namespace Modelos;

include_once "Conexion.php";

class Sintoma extends Conexion
{
    /**
     * Devuelve todos los sintomas.
     * 
     * @return array<string, mixed>
     */
    public function obtenerTodos()
    {
        $this->conectarDB();
        $sql = "SELECT codigo, nombre, SUBSTRING_INDEX(codigo,'s', -1) as numero 
            FROM sintomas 
            ORDER BY CAST(numero AS UNSIGNED) ASC";
        $resultado = $this->conexion->query($sql);
        $numFilas = mysqli_num_rows($resultado);
        $this->desconectarDB();
        
        $sintomas = array();
        for ($i = 0; $i < $numFilas; $i++) {
            $sintomas[$i] = $resultado->fetch_array();
        }

        return ($sintomas);
    }

    /**
     * Devuelve sintomas por sus ids.
     * 
     * @param array<string> $ids
     * 
     * @return array<string, mixed>
     */
    public function obtenerVariosPorId(array $ids): array
    {
        $todos = $this->obtenerTodos();

        $seleccionados = [];

        foreach ($todos as $sintoma) {
            foreach ($ids as $id) {
                if ($sintoma["codigo"] == $id) {
                    $seleccionados[] = $sintoma;
                    break;
                }
            }
        }

        return $seleccionados;
    }
}

?>