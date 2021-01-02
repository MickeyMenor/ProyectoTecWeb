<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorGestorProductos
 *
 * @author mickey
 */
include('/opt/lampp/htdocs/ProyectoTecWeb/Controladores/Controlador.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/BaseDeDatos.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/Medicamento.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/Sustancia.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/Laboratorio.php');

class ControladorGestorFarmacia extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        
        if (isset($this->usuario))
        {
            if ($this->usuario->rol() != 1)
                header("Location: /ProyectoTecWeb/Vistas/Bienvenida/Bienvenida.php");
        }
        else
        {
            session_unset(); 
            session_destroy(); 
            header("Location: /ProyectoTecWeb/Vistas/Bienvenida/Bienvenida.php");
        }
    }
}