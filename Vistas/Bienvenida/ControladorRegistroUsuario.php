<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorRegistroUsuario
 *
 * @author mickey
 */
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/Usuario.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/BaseDeDatos.php');

class ControladorRegistroUsuario 
{
    //put your code here
    function __construct(){}
    
    
    private function elUsuarioNoExiste(Usuario $usuario) : bool
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "SELECT * FROM Usuario WHERE Alias = '".$usuario->alias()."'";
        $resultado = $sqli->query($consulta);
        
        return $resultado->num_rows == 0;
    }
    
    private function creaUsuario() : Usuario
    {
        $usuario = new Usuario();
        $usuario->cambiaNombre($_POST['nomCompleto']);
        $usuario->cambiaAlias($_POST['nomUsuario']);
        $usuario->cambiaContraseña($_POST['passwrd']);
        $usuario->cambiaCorreo($_POST['correoUsuario']);
        
        return $usuario;
    }
    
    public function registraUsuario(Usuario $usuario)
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "INSERT INTO Usuario (Nombre, Alias, Contrasenia, Rol, Email)"
        ." VALUES ('".$usuario->nombre()."','".$usuario->alias()."','"
        .$usuario->contraseña()."',2,'".$usuario->correo()."')";
         
        $sqli->query($consulta);
        $usuario->cambiaId($sqli->insert_id);
        
        if ($usuario->idUsuario() == 0)
        {
            echo '<div>';
            echo 'Ocurrió un error al momento de registrarte';
            echo '</div>';
        }
        else
        {
            header("Location: /ProyectoTecWeb/Vistas/Bienvenida/Bienvenida.php");
            echo 'Registro exitoso';
        }
    }
    
    public function validaCreacionUsuario()
    {
        if (isset($_POST['nomCompleto']) && isset($_POST['nomUsuario'])
         && isset($_POST['passwrd']) && isset($_POST['correoUsuario']))
        {
            $usuario = $this->creaUsuario();
            
            if ($this->elUsuarioNoExiste($usuario))
                $this->registraUsuario ($usuario);
        }
    }
}