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
    protected function __construct()
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
    
    public static function instancia()
    {
        session_start();
        self::$instancia = self::$instancia ?? new ControladorGestorFarmacia();
        return self::$instancia;
    }
    
    public function opcionSustancias()
    {
        $bd = BaseDeDatos::instancia();
        $arreglo = $bd->obtenSustancias();
        
        foreach ($arreglo as $renglon)
        {
            echo '<option id="s'.$renglon['IdSustancia'].'" value="s'.$renglon['IdSustancia'].'">';
            echo $renglon['Nombre'].'</option>';
        }
    }
    
    public function opcionLaboratorios()
    {
        $bd = BaseDeDatos::instancia();
        $arreglo = $bd->obtenLaboratorios();
        
        foreach ($arreglo as $renglon)
        {
            echo '<option id="l'.$renglon['IdLaboratorio'].'" value="l'.$renglon['IdLaboratorio'].'">';
            echo $renglon['Nombre'].'</option>';
        }
    }
    
    public function obtenProductos()
    {
        $nombres = array
        (
            'Sustancia', 'Laboratorio', 'Presentación', 'Dosis en mg',
            'Cantidad', 'Costo', 'Stock', 'Foto'
        );
        
        $bd = BaseDeDatos::instancia();
        $medicamentos = $bd->obtenMedicamentos();
        $cadena = '<div class="table-responsive"><table class="table align-middle"><thead><tr>';

        foreach ($nombres as $nombre)
            $cadena .= '<th scope="col">'.$nombre.'</th>';
        
        $cadena .= '</tr></thead><tbody>';
        
        foreach ($medicamentos as $medicamento)
        {
            /* @var $medicamento Medicamento */
            $cadena .= '<tr>';
            $cadena .= '<td class="align-middle" scope="row">'.$medicamento->sustancia()->nombre().'</td>';
            $cadena .= '<td class="align-middle" scope="row">'.$medicamento->laboratorio()->nombre().'</td>';
            $cadena .= '<td class="align-middle" scope="row">'.$medicamento->formaPresentacion().'</td>';
            $cadena .= '<td class="align-middle" scope="row">'.$medicamento->dosis().'</td>';
            $cadena .= '<td class="align-middle" scope="row">'.$medicamento->cantidad().'</td>';
            $cadena .= '<td class="align-middle" scope="row">'.$medicamento->costo().'</td>';
            $cadena .= '<td class="align-middle" scope="row">'.$medicamento->stock().'</td>';
            $cadena .= '<td class="align-middle" scope="row"><img src="data:image/jpeg;base64,';
            $cadena .= base64_encode($medicamento->foto()).'" width="180" height="180"/></td>';
            $cadena .= '</tr>';
        }
        
        $cadena .= '</tbody></table></div>';
        echo $cadena;
    }
    
    private function asignaComponentesProducto(Medicamento $medicamento)
    {
        $idSustancia = str_replace('s', '', $_POST['IdSustancia']);
        $sustancia = new Sustancia();
        $sustancia->cambiaNombre($_POST['textoSustancias']);
        $sustancia->cambiaId($idSustancia);
        
        $idLaboratorio = str_replace('l', '', $_POST['IdLaboratorio']);
        $laboratorio = new Laboratorio();
        $laboratorio->cambiaNombre($_POST['textoLaboratorios']);
        $laboratorio->cambiaId($idLaboratorio);
        
        $foto = addslashes(file_get_contents($_FILES["fotoProducto"]['tmp_name']));
        $medicamento->cambiaFoto($foto);
        
        $medicamento->cambiaLaboratorio($laboratorio);
        $medicamento->cambiaSustancia($sustancia);
    }
    
    public function validaProducto()
    {
        if (isset($_POST['textoSustancias']) && isset($_POST['textoLaboratorios'])
         && isset($_POST['textoPresentacion']) && isset($_POST['textoDosis'])
         && isset($_POST['textoCantidad']) && isset($_POST['textoCosto'])
         && isset($_POST['textoStock']) && !empty($_FILES['fotoProducto']['name']))
        {
            $medicamento = new Medicamento();
            $this->asignaComponentesProducto($medicamento);
            
            $medicamento->cambiaFormaPresentacion($_POST['textoPresentacion']);
            $medicamento->cambiaDosis($_POST['textoDosis']);
            $medicamento->cambiaCantidad($_POST['textoCantidad']);
            $medicamento->cambiaCosto($_POST['textoCosto']);
            $medicamento->cambiaStock($_POST['textoStock']);

            $bd = BaseDeDatos::instancia();
            $bd->insertaMedicamento($medicamento);
        }
    }
}