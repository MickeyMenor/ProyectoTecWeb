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
    
    protected function creaBoton($renglon)
    {
        return '<td class="align-middle" scope="row">';
    }
    
    protected function creaTabla($arreglo, $nombres)
    {
        $cadena = '<div class="table-responsive"><table class="table align-middle"><thead><tr>';
        
        foreach ($nombres as $clave => $valor)
            $cadena .= '<th scope="col">'.$clave.'</th>';
        
        $cadena .= '<th scope="col"> Info. </th></tr></thead><tbody>';
        
        foreach($arreglo as $renglon)
        {
            $cadena .= '<tr>';
            
            foreach ($nombres as $clave => $valor)
                $cadena .= '<td class="align-middle" scope="row">'
                .($valor === 'Foto' 
                ? '<img src="data:image/jpg;base64,'.base64_encode($renglon[$valor]).'" width="180" height="180"/>' 
                : $renglon[$valor]).'</td>';
            
            $cadena .= $this->creaBoton($renglon);
        }
        
        $cadena .= '</tbody></table></div>';
        return $cadena;
    }
}