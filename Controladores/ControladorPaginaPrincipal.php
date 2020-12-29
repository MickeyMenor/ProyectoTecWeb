<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorPaginaPrincipal
 *
 * @author mickey
 */
include('/opt/lampp/htdocs/ProyectoTecWeb/Controladores/Controlador.php');

class ControladorPaginaPrincipal extends Controlador
{
    private function __construct()
    {
        parent::__construct();
    }
    
    public static function instancia() : ControladorPaginaPrincipal 
    {
        session_start();
        self::$instancia = self::$instancia ?? new ControladorPaginaPrincipal();
        return self::$instancia;
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
}