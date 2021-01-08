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
include('/opt/lampp/htdocs/ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/ControladorGestorFarmacia.php');

class ControladorGestorUsuarios extends ControladorGestorFarmacia
{
    private $ruta;
    
    public function __construct()
    {
        parent::__construct();
        $this->ruta = "Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/GestorUsuarios/GestorUsuarios.php";
    }
    
    private function creaTarjetaCategoria($renglon)
    {
        $tarjeta = '<div class="col-xs"><div class="ml-5 mt-5 card">';
        $tarjeta .= '<div class="card-body"><h5 class="card-title"> Nombre: </h5>';
        $tarjeta .= '<h6 class="card-subtitle mt-2 mb-2">'.$renglon['Alias'].'</h6>';
        $tarjeta .= '<h5 class="mt-4 card-title"> Correo: </h5>';
        $tarjeta .= '<h6 class="card-subtitle mt-2 mb-2">'.$categoria->descripcion.'</h6>';
        $tarjeta .= '<a class="btn btn-primary" href="./ModificaCategoria/ModificaCategoria.php';
        $tarjeta .= '?id='.$categoria->idCategoria.'" role="button"> Modificar </a></td>';
        $tarjeta .= '<a class="ml-2 btn btn-primary" href="./borraCategoria.php';
        $tarjeta .= '?id='.$categoria->idCategoria.'" role="button" onClick="return verificaEliminacion();"> Eliminar </a></td>';
        $tarjeta .= '</div></div></div>';
        
        return $tarjeta;
    }
    
    protected function creaBoton($renglon) 
    { ?> 
        <td class="align-middle" scope="row"> 
            <a class="btn btn-primary" href="./VerUsuario/VerUsuario.php?id=<?php echo $renglon['IdUsuario'] ?>" role="button"> 
                Ver Usuario
            </a>
        </td> <?php  
    }
    
    public function muestraTarjetaUsuario()
    {
        $consultas = array();
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        
        $sqli = BaseDeDatos::instancia()->sqli();
        $resultado = $sqli->query("SELECT * FROM Usuario WHERE IdUsuario = '".$consultas['id']."'");
        $renglon = $resultado->fetch_assoc();
        
        echo $this->creaTarjetaUsuario($renglon);
    }
    
    public function muestraUsuarios()
    {
        $nombres = array
        (
            'Nombre Usuario' => 'Nombre',  'Alias' => 'Alias',
            'Contraseña' => 'Contrasenia', 'Email' => 'Email', 
            'Rol' => 'Rol'
        );
        
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "SELECT * FROM Usuario";
        $resultado = $sqli->query($consulta);
        $arreglo = !$resultado ? array() : $resultado->fetch_all(MYSQLI_ASSOC);
        parent::creaTabla($arreglo, $nombres);
    } 
}