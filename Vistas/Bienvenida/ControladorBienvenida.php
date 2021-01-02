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
    function __construct(){}
    
    private function validaUsuario(Usuario $usuario)
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "SELECT * FROM Usuario WHERE Alias = '".$usuario->alias()."' AND Contrasenia = '". $usuario->contraseña()."'";
        $resultado = $sqli->query($consulta);
        
        if ($resultado->num_rows == 1)
        {
            $renglon = $resultado->fetch_assoc();
            $usuario->cambiaId($renglon['IdUsuario']);
            $usuario->cambiaNombre($renglon['Nombre']);
            $usuario->cambiaCorreo($renglon['Email']);
            $usuario->cambiaRol($renglon['Rol']);
            
            session_unset(); 
            session_destroy(); 
            session_start();
            $_SESSION['usuario'] = serialize($usuario->aArreglo());
            header("Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/PaginaPrincipal.php");
        }
        else
        {
            echo 'Usuario y/o contraseña incorrectos';
        }
    }
    
    public function validaInicioSesion()
    {
        if (isset($_POST['botonInicioSesion']) && isset($_POST['nomUsuario'])
         && isset($_POST['passwrd'])) 
        {
            $usuario = new Usuario();
            $usuario->cambiaAlias($_POST['nomUsuario']);
            $usuario->cambiaContraseña($_POST['passwrd']);
            $this->validaUsuario($usuario);
        }
    }
}