<?php

namespace Modelos;

class PuntoEnv
{
    /**
     * Ubicación del archivo .env.
     *
     * @var string
     */
    protected $path;


    /**
     * @param string $path
     */
    public function __construct($path)
    {
        if(!file_exists($path)) {
            throw new \InvalidArgumentException(sprintf('%s does not exist', $path));
        }
        $this->path = $path;
    }

    /**
     * Carga las variables de entorno.
     */
    public function cargar()
    {
        if (!is_readable($this->path)) {
            throw new \RuntimeException(sprintf('%s no se pudo leer el archivo: ', $this->path));
        }

        $lineas = file($this->path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lineas as $linea) {

            if (strpos(trim($linea), '#') === 0) {
                continue;
            }

            list($nombre, $valor) = explode('=', $linea, 2);
            $nombre = trim($nombre);
            $valor = trim($valor);

            if (!array_key_exists($nombre, $_SERVER) && !array_key_exists($nombre, $_ENV)) {
                putenv(sprintf('%s=%s', $nombre, $valor));
                $_ENV[$nombre] = $valor;
                $_SERVER[$nombre] = $valor;
            }
        }
    }
}


?>