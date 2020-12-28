<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorVistaUsuario
 *
 * @author mickey
 */

include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/Usuario.php');

class ControladorVistaUsuario 
{
    private static $instancia = null; 
    private $usuario = null;
    
    private function __construct()
    {
        if (isset($_SESSION['usuario']))
        {
            $this->usuario = new Usuario();
            $this->usuario->aUsuario(unserialize($_SESSION['usuario']));
        }
        else 
        {
            session_unset();
            session_destroy(); 
            header("Location: /ProyectoTecWeb/Vistas/Bienvenida/Bienvenida.php");
        }
    }
    
    public static function instancia() : ControladorVistaUsuario
    {
        session_start();
        self::$instancia = self::$instancia ?? new ControladorVistaUsuario();
        return self::$instancia;
    }
    
    public function muestraSaludo()
    {
        echo 'Hola '.$this->usuario->nombre();
    }
}