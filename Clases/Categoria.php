<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author mickey
 */
class Categoria 
{
    //put your code here
    public $idCategoria;
    public $nombre;
    public $descripcion;
    
    public function __construct($idCategoria, $nombre, $descripcion) 
    {
        $this->idCategoria = $idCategoria;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }
}
