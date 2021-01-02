<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sustancia
 *
 * @author mickey
 */
class Sustancia 
{
    public $idSustancia;
    public $nombre;
    
    function __construct($idSustancia, $nombre) 
    {
        $this->idSustancia = $idSustancia;
        $this->nombre = $nombre;
    }
    
    public function idSustancia() { return $this->idSustancia; }
    public function nombre() { return $this->nombre; }
    
    public function cambiaId($id) { $this->idSustancia = $id; }
    public function cambiaNombre($nombre) { $this->nombre = $nombre; }

}