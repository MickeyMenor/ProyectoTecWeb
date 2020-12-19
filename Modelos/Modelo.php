<?php

class Modelo
{
    private $host = '';
    private $usuario = '';
    private $nomBD = '';
    
    function __construct($host, $usuario, $nomBD)
    {
        $this->host = $host;
        $this->usuario = $usuario;
        $this->nomBD = $nomBD;    
    }
    
    public function obtenUsuario(Usuario $usuario)
    {
        $consulta = "SELECT * FROM Usuario WHERE Alias = ".$usuario->alias();
        $consulta = $consulta. "AND Contrasenia = ". $usuario->contraseña(). ";";
        
        $conexion = mysqli_connect($this->host, $this->usuario,"", $this->nomBD);
        $resultado = mysqli_query($conexion, $consulta);
        $arreglo = mysqli_fetch_array($resultado);
        
        mysqli_close($conexion);
        
        foreach ($arreglo as &$tupla) 
        {
            $usuario->cambiaId($tupla['IdUsuario']);
            $usuario->cambiaNombre($tupla['Nombre']);
        }
    }
};