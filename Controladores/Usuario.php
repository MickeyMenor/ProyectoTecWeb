<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author mickey
 */
class Usuario 
{
    //put your code here
    private $idUsuario;
    private $nombre;
    private $alias;
    
    public function __construct($idUsuario, $nombre, $alias)
    { 
        self::$idUsuario = $idUsuario;
        self::$nombre = $nombre;
        self::$alias = $alias;
    } 
    
    public function idUsuario() { return $idUsuario; }
    public function nombre() { return $nombre; }
    public function alias() { return $alias; }
}