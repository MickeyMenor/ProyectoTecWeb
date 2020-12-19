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
    private $idUsuario;
    private $alias;
    private $nombre;
    private $contraseña;
    private $correo;
    
    function __construct() 
    {
        $this->idUsuario = -1;
        $this->alias = '';
        $this->nombre = '';
        $this->contraseña = '';
        $this->correo = '';
    }
    
    public function idUsuario() { return $this->idUsuario; }
    public function alias() { return $this->alias; }
    public function nombre() { return $this->nombre; }
    public function contraseña() { return $this->contraseña; }
    public function correo() { return $this->correo; }
    
    public function cambiaId($id) { $this->idUsuario = $id; }
    public function cambiaAlias($alias) { $this->alias = $alias; }
    public function cambiaNombre($nombre) { $this->nombre = $nombre; }
    public function cambiaContraseña($pass) { $this->contraseña = $pass; }
    public function cambiaCorreo($correo) { $this->correo = $correo; }
}