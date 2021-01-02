<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorGestorCategorias
 *
 * @author mickey
 */
include('/opt/lampp/htdocs/ProyectoTecWeb/Controladores/ControladorGestorFarmacia.php');

class ControladorGestorCategorias extends ControladorGestorFarmacia
{
    private function __construct()
    {
        parent::__construct();
    }
    
    public static function instancia() : ControladorGestorCategorias 
    {
        session_start();
        self::$instancia = self::$instancia ?? new ControladorGestorCategorias();
        return self::$instancia;
    }
    
    public function validaCategoria()
    {
        if (isset($_POST['textoCategoria']) && isset($_POST['textoDescripción']))
        {
            echo $_POST['textoCategoria'];
            
        }
    }
}