<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseDeDatos
 *
 * @author mickey
 */
class BaseDeDatos 
{
    private static $instancia = null; 
    private $mysqli = null;
    private $host = 'localhost';
    private $usuario = 'root';
    private $cont = '';
    private $nomBD = 'Farmacia';
    
    private function __construct()
    {
        $this->mysqli = new mysqli
        (
            $this->host, 
            $this->usuario, 
            $this->cont, 
            $this->nomBD
        );  
    }
    
    public static function instancia() : BaseDeDatos
    {
        self::$instancia = self::$instancia ?? new BaseDeDatos();
        return self::$instancia;
    }

    private function asignaResultadoUsuario(Usuario $usuario, $renglon)
    {
        $usuario->cambiaId($renglon['IdUsuario']);
        $usuario->cambiaNombre($renglon['Nombre']);
        $usuario->cambiaCorreo($renglon['Email']);
        $usuario->cambiaRol($renglon['Rol']);
    }
    
    public function obtenUsuario(Usuario $usuario)
    {
        $consulta = "SELECT * FROM Usuario WHERE Alias = '".$usuario->alias()."'";
        $consulta .= " AND Contrasenia = '". $usuario->contraseña()."'";
        $resultado = $this->mysqli->query($consulta);
        
        if ($resultado->num_rows == 1)
        {
            $renglon = $resultado->fetch_assoc();
            $this->asignaResultadoUsuario($usuario, $renglon);
        }
    }
}