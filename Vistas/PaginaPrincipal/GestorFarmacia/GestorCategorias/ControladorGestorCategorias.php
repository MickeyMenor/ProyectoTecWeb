<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorGestorCategorias
 *
 * @author mickey
 */
include('/opt/lampp/htdocs/ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/ControladorGestorFarmacia.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/Categoria.php');

class ControladorGestorCategorias extends ControladorGestorFarmacia
{
    private $ruta;
    
    public function __construct()
    {
        parent::__construct();
        $this->ruta = 'Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/GestorCategorias/GestorCategorias.php';
    }
    
    private function creaTarjetaCategoria(Categoria $categoria)
    {
        $tarjeta = '<div class="col-xs"><div class="ml-5 mt-5 card">';
        $tarjeta .= '<div class="card-body"><h5 class="card-title"> Nombre: </h5>';
        $tarjeta .= '<h6 class="card-subtitle mt-2 mb-2">'.$categoria->nombre.'</h6>';
        $tarjeta .= '<h5 class="mt-4 card-title"> Descripción: </h5>';
        $tarjeta .= '<h6 class="card-subtitle mt-2 mb-2">'.$categoria->descripcion.'</h6>';
        $tarjeta .= '<a class="btn btn-primary" href="./ModificaCategoria/ModificaCategoria.php';
        $tarjeta .= '?id='.$categoria->idCategoria.'" role="button"> Modificar </a></td>';
        $tarjeta .= '<a class="ml-2 btn btn-primary" href="./borraCategoria.php';
        $tarjeta .= '?id='.$categoria->idCategoria.'" role="button" onClick="return verificaEliminacion();"> Eliminar </a></td>';
        $tarjeta .= '</div></div></div>';
        
        return $tarjeta;
    }
    
    private function agregaCategoria()
    {
        $sqli = BaseDeDatos::instancia()->sqli();
            
        $statement = $sqli->prepare("INSERT INTO Categoria (Nombre, Descripcion) VALUES (?, ?)");        
        $statement->bind_param
        (
            'ss', $_POST['textoNombre'],
            $_POST['textoDescripcion']    
        );

        $statement->execute();
    }
    
    private function actualizaCategoria()
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        $statement = $sqli->prepare
        (
            'UPDATE Categoria SET Nombre=?,Descripcion=? '
            .'WHERE IdCategoria=?'
        );
        
        $statement->bind_param
        (
            'ssi', $_POST['textoNombre'],
            $_POST['textoDescripcion'],
            $_POST['IdCategoria']
        );
        
        $statement->execute();
    }
    
    protected function creaBoton($renglon) 
    {
        ?> 
        <td class="align-middle" scope="row"> 
            <a class="btn btn-primary" href="./VerCategoria/VerCategoria.php?id=<?php echo $renglon['IdCategoria'] ?>" role="button"> 
                Ver Categoria
            </a>
        </td> 
        <?php  
    }
    
    public function muestraCategorias()
    {
        $nombres = array('Nombre' => 'Nombre',  'Descripción' => 'Descripcion');
        
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "SELECT * FROM Categoria";
        $resultado = $sqli->query($consulta);
        $arreglo = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : array();
        
        echo parent::creaTabla($arreglo, $nombres);
    }
    
    public function nuevaCategoria()
    {
        if (isset($_POST['textoNombre']) && isset($_POST['textoDescripcion']))
        {
            $this->agregaCategoria();
            header($this->ruta);
        }
    }
    
    public function borraCategoria()
    {
        $consultas = array();
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        
        $sqli = BaseDeDatos::instancia()->sqli();
        $statement = $sqli->prepare("DELETE FROM Categoria WHERE IdCategoria = ?");
        $statement->bind_param('i', $consultas['id']);
        $statement->execute();
            
        header($this->ruta);
    }
    
    public function modificaCategoria()
    {
        if (isset($_POST['textoNombre']) && isset($_POST['textoDescripcion']))
        {
            $this->actualizaCategoria();
            header($this->ruta);
        }
    }
    
    public function muestraTarjetaCategoria()
    {
        $consultas = array();
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        
        $sqli = BaseDeDatos::instancia()->sqli();
        $resultado = $sqli->query("SELECT * FROM Categoria WHERE IdCategoria = '".$consultas['id']."'");
        $renglon = $resultado->fetch_assoc();
        
        $categoria = new Categoria
        (
            $renglon['IdCategoria'],
            $renglon['Nombre'],
            $renglon['Descripcion']
        );
        
        echo $this->creaTarjetaCategoria($categoria);
    }
    
    public function agregaIdCategoria()
    {
        $consultas = array();
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        
        if (isset($consultas['id']))
            echo '<input type="hidden" name="IdCategoria" id="IdCategoria" value="'.$consultas['id'].'">';
        else
            header($this->ruta);
    }
}