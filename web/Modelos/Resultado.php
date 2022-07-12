<?php

namespace Modelos;

include_once "Conexion.php";

class Resultado extends Conexion
{
    /**
     * @return int
     */
    public function totalResultados()
    {
        $this->conectarDB();
        $sql = "SELECT COUNT(*) AS total FROM resultados";
        $resultado = $this->conexion->query($sql);
        $resultado = $resultado->fetch_array();

        return (int)($resultado["total"]);
    }

    /**
     * Devuelve los resultados.
     * 
     * @return array<string, mixed>
     */
    public function obtenerTodosPaginado($pagina, $tamanioPagina = 5)
    {
        $this->conectarDB();
        $offset = ($tamanioPagina * ($pagina - 1));
        $sql = "SELECT 
                    r.codigo as codigo,
                    r.codigo_enfermedad as codigo_enfermedad,
                    e.nombre as nombre_enfermedad,
                    r.fecha_consulta as fecha_consulta,
                    GROUP_CONCAT(s.codigo SEPARATOR ',') as codigos_sintomas,
                    GROUP_CONCAT(s.nombre SEPARATOR ',') as nombres_sintomas
                FROM resultados r 
                INNER JOIN enfermedades e ON e.codigo = r.codigo_enfermedad
                LEFT JOIN consultas c ON c.codigo_resultado = r.codigo
                LEFT JOIN sintomas s ON s.codigo = c.codigo_sintoma
                GROUP BY r.codigo
                ORDER BY codigo DESC
                LIMIT $tamanioPagina OFFSET $offset";
        $resultado = $this->conexion->query($sql);
        $numFilas = mysqli_num_rows($resultado);
        $this->desconectarDB();
        
        $resultados = array();
        for ($i = 0; $i < $numFilas; $i++) {
            $resultados[$i] = $resultado->fetch_array();
            $resultados[$i]["sintomas"] = explode(",", $resultados[$i]["nombres_sintomas"]);
        }

        $totalRegistros = $this->totalResultados();
        $totalPaginas = ceil($totalRegistros / $tamanioPagina);

        return [
            "total_paginas" => $totalPaginas,
            "tamanio_pagina" => $tamanioPagina,
            "pagina" => $pagina,
            "datos" => $resultados,
            "pagina_siguiente" => ($pagina + 1 > $totalPaginas ? null: $pagina + 1),
            "pagina_anterior" => ($pagina - 1 <= 0 ? null : $pagina - 1),
        ];
    }

    /**
     * Guarda los resultados de una consulta.
     * 
     * @param array<string> $codigosSintomas
     * @param string $codigoEnfermedad
     */
    public function crear(
        $codigosSintomas,
        $codigoEnfermedad
    ) {
        $this->conectarDB();

        $sql = "INSERT INTO resultados (codigo_enfermedad) VALUES ('$codigoEnfermedad')";

        $this->conexion->query($sql);
        $codigoResultado = mysqli_insert_id($this->conexion);

        $sql = "INSERT INTO consultas (codigo_resultado, codigo_sintoma) VALUES ";
        $valores = [];

        foreach ($codigosSintomas as $codigoSintoma) {
            array_push($valores, "('$codigoResultado', '$codigoSintoma')");
        }

        $sql .= implode(",", $valores);
        $this->conexion->query($sql);

        $this->desconectarDB();

        return $codigoResultado;
    }
}

?>