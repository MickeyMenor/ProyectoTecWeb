<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controlador
 *
 * @author mickey
 */

include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/Usuario.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/Medicamento.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/Sustancia.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/Laboratorio.php');

abstract class Controlador 
{
    protected static $instancia = null; 
    protected $usuario = null;
    
    protected function __construct()
    {
        session_start();
        
        if (isset($_SESSION['usuario']))
        {
            $this->usuario = new Usuario();
            $this->usuario->aUsuario(unserialize($_SESSION['usuario']));
        }
    }
    
    public function cargaMenuPerfil()
    {
        if (isset($this->usuario))
        {
            echo '<a class="dropdown-item" href="#">'. $this->usuario->alias().'</a>';
            echo '<a class="dropdown-item" href="/ProyectoTecWeb/Vistas/PaginaPrincipal/PerfilUsuario/PerfilUsuario.php"> Ver perfil </a>';
            echo '<a class="dropdown-item" href="/ProyectoTecWeb/Vistas/PaginaPrincipal/PerfilUsuario/CierraSesion.php"> Cerrar sesión </a>';
        }
        else
        {
            echo '<a class="dropdown-item" href="/ProyectoTecWeb/Vistas/Bienvenida/Bienvenida.php"> Iniciar sesión </a>';
            echo '<a class="dropdown-item" href="/ProyectoTecWeb/Vistas/Bienvenida/RegistroUsuario.php"> Registrarse </a>';
        }
    }
    
    public function verificaMenuNavegacion()
    {
        if (isset($this->usuario) && $this->usuario->rol() == 1)
        {
            $op = '<a class="px-1 navbar-brand" href="/ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/GestorFarmacia.php">';
            $op .= 'Gestionar Farmacia';
            $op .= '</a>';
            echo $op; 
        }
    }
    
    public function cierraSesion()
    {
        session_unset(); 
        session_destroy(); 
        header("Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/Productos/Productos.php");
    }
    
    protected function validaCarrito()
    {
        if (!isset($_SESSION['carrito'])) 
        {
            $_SESSION['carrito'] = [];
        }
    }
}
