<?php

namespace Modelos;

class SistemaExperto
{
    /**
     * Revisa si se esta usando Windows o no
     * 
     * @return bool
     */
    private function esWindows()
    {
        return strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
    }
    /**
     * Consulta la enfermedad al sistema experto.
     * 
     * @param array<string> $idSintomas
     * 
     * @return string|null
     */
    public function consultarEnfermedad($idSintomas)
    {
        if ($this->esWindows()) {
            $ubicacion = __DIR__ . "\\experto.pl";
        } else {
            $ubicacion = __DIR__ . "/experto.pl";
        }

        if (!file_exists($ubicacion)) {
            die("No se puede localizar el archivo experto.pl, el directorio actual es: ".__DIR__);
        }

        $arreglo = "[" . implode(",", $idSintomas) . "]";
        
        $resultado = `swipl -s $ubicacion -g "sintomas($arreglo)." -t halt.`;

        return $resultado;
    }
}