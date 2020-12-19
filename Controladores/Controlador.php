<?php



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Modelo
 *
 * @author mickey
 */
class Controlador 
{
    private $modelo;
    
    function __construct()
    {
        $this->modelo = new Modelo('localhost', 'root', 'Farmacia');
    }
    
    public function validaUsuario(Usuario $usuario)
    {
        $this->modelo->obtenUsuario($usuario);
        return $usuario->idUsuario() != -1;
    }
    
    public function procesaInicioSesion()
    {
        if (isset($_POST['botonInicioSesion']))
            header ("http://localhost:8080/ProyectoTecWeb/Vistas/Login.php");
    }
}
