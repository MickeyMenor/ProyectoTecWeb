<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Laboratorio
 *
 * @author mickey
 */
class Laboratorio 
{
    public $idLaboratorio;
    public $nombre;
    
    function __construct($idLaboratorio, $nombre) 
    {
        $this->idLaboratorio = $idLaboratorio;
        $this->nombre = $nombre;
    }
}
