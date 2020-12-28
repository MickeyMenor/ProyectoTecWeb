<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorBienvenida
 *
 * @author mickey
 */
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/Usuario.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/BaseDeDatos.php');

class ControladorBienvenida 
{
    private $loginInvalido;
    private $usuarioTecleado;
    private $contraseñaTecleada;
    private $usuarioValido; 
    
    function __construct()
    {
        $this->loginValido = false;
        $this->usuarioTecleado = false;
        $this->contraseñaTecleada = false;
        $this->usuarioValido = false;
    }
    
    private function validaUsuario(Usuario $usuario)
    {
        $bd = BaseDeDatos::instancia();
        $bd->obtenUsuario($usuario);
        
        if ($usuario->idUsuario() != -1)
        {
            session_unset(); 
            session_destroy(); 
            session_start();
            $_SESSION['usuario'] = serialize($usuario->aArreglo());
            
            if ($usuario->rol() == 1)
                header("Location: /ProyectoTecWeb/Vistas/Farmacia/VistaUsuario.php");
            else if ($usuario->rol() == 2)
                header("Location: /ProyectoTecWeb/Vistas/Farmacia/VistaAdmin.php");
        }
    }
    
    public function validaInicioSesion()
    {
        if (isset($_POST['botonInicioSesion'])) 
        {
            $this->usuarioTecleado = isset($_POST['nomUsuario']);
            $this->contraseñaTecleada = isset($_POST['passwrd']);
            $this->loginValido = $this->usuarioTecleado && $this->contraseñaTecleada;

            if ($this->loginValido) 
            {
                $usuario = new Usuario();
                $usuario->cambiaAlias($_POST['nomUsuario']);
                $usuario->cambiaContraseña($_POST['passwrd']);
                $this->validaUsuario($usuario);
            }
        }
    }
}