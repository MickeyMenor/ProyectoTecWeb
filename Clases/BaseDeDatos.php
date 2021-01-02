<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseDeDatos
 *
 * @author mickey
 */
class BaseDeDatos 
{
    private static $instancia = null; 
    private $mysqli = null;
    private $host = 'localhost';
    private $usuario = 'root';
    private $cont = '';
    private $nomBD = 'Farmacia';
    
    private function __construct()
    {
        $this->mysqli = new mysqli
        (
            $this->host, 
            $this->usuario, 
            $this->cont, 
            $this->nomBD
        );  
    }
    
    public static function instancia() : BaseDeDatos
    {
        self::$instancia = self::$instancia ?? new BaseDeDatos();
        return self::$instancia;
    }
    
    public function sqli() : mysqli { return $this->mysqli; }
    
    public function obtenMedicamento(Medicamento &$medicamento)
    {
        $consulta = "SELECT * FROM InfoMedicamentos WHERE IdMedicamento = '".$medicamento->idMedicamento()."'";
        $resultado = $this->mysqli->query($consulta);
        
        if ($resultado->num_rows == 1)
        {
            $renglon = $resultado->fetch_assoc();
            $medicamento = $this->creaMedicamento($renglon);
        }
    }
    
    private function creaSustancia($renglon)
    {
        $sustancia = new Sustancia();
        $sustancia->cambiaId($renglon['IdSustancia']);
        $sustancia->cambiaNombre($renglon['NombreSustancia']);
        
        return $sustancia;
    }
    
    private function creaLaboratorio($renglon)
    {
        $laboratorio = new Laboratorio();
        $laboratorio->cambiaId($renglon['IdLaboratorio']);
        $laboratorio->cambiaNombre($renglon['NombreLaboratorio']);
        
        return $laboratorio;
    }
    
    private function creaMedicamento($renglon)
    {
        $medicamento = new Medicamento();
        $medicamento->cambiaId($renglon['IdMedicamento']);
        $medicamento->cambiaSustancia($this->creaSustancia($renglon));
        $medicamento->cambiaLaboratorio($this->creaLaboratorio($renglon));
        $medicamento->cambiaFormaPresentacion($renglon['Forma']);
        $medicamento->cambiaDosis($renglon['Dosis_mg']);
        $medicamento->cambiaCantidad($renglon['Cantidad']);
        $medicamento->cambiaFoto($renglon['Foto']);
        $medicamento->cambiaCosto($renglon['Costo']);
        $medicamento->cambiaStock($renglon['Stock']);
        
        return $medicamento;
    }
    
    public function obtenMedicamentos()
    {
        $arregloMedicamentos = array();
        $consulta = "SELECT * FROM InfoMedicamentos";
        $resultado = $this->mysqli->query($consulta);
        $arreglo = $resultado->fetch_all(MYSQLI_ASSOC);
        
        foreach($arreglo as $renglon)
            array_push($arregloMedicamentos, $this->creaMedicamento($renglon));
        
        return $arregloMedicamentos;
    }
    
    public function borraMedicamento($id)
    {
        $consulta = "DELETE FROM Medicamento WHERE IdMedicamento = '".$id."'";
        $this->mysqli->query($consulta);
    }
}