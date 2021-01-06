<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Medicamento
 *
 * @author mickey
 */
class Medicamento 
{
    public $idMedicamento;
    public $sustancia;
    public $laboratorio;
    public $formaPresentacion;
    public $dosis;
    public $cantidad;
    public $foto;
    public $costo;
    public $stock;
    
    public function __construct($idMedicamento, $sustancia, $laboratorio, $formaPresentacion, $dosis, $cantidad, $foto, $costo, $stock) 
    {
        $this->idMedicamento = $idMedicamento;
        $this->sustancia = $sustancia;
        $this->laboratorio = $laboratorio;
        $this->costo = $costo;
        $this->formaPresentacion = $formaPresentacion;
        $this->dosis = $dosis;
        $this->cantidad = $cantidad;
        $this->foto = $foto;
        $this->stock = $stock;
    }
    
    public function aArreglo()
    {
        return array
        (
            $this->idMedicamento,
            $this->sustancia,
            $this->laboratorio,
            $this->costo,
            $this->formaPresentacion,
            $this->dosis,
            $this->cantidad,
            $this->foto,
            $this->stock,
        );
    }
    
    public function aMedicamento($arreglo)
    {
        $this->idMedicamento = $arreglo[0];
        $this->sustancia = $arreglo[1];
        $this->laboratorio = $arreglo[2];
        $this->costo = $arreglo[3];
        $this->formaPresentacion = $arreglo[4];
        $this->dosis = $arreglo[5];
        $this->cantidad = $arreglo[6];
        $this->foto = $arreglo[7];
        $this->stock = $arreglo[8];
    }
} 