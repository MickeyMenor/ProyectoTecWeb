<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorCarritoDeCompras
 *
 * @author mickey
 */
include('/opt/lampp/htdocs/ProyectoTecWeb/Controladores/Controlador.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/BaseDeDatos.php');

class ControladorCarritoDeCompras extends Controlador 
{
    private $ruta;
    private $rutaVistaCompra;
    
    public function __construct()
    {
        parent::__construct();
        parent::validaCarrito();
        $this->ruta = 'Location: CarritoDeCompras.php';
        $this->rutaVistaCompra = 'Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/VistaCompra/VistaCompra.php';
    }
    
    private function registraCompra($importe)
    {
        $idUsuario = $this->usuario->idUsuario();
        $fecha = date('Y-m-d', time());
        $sqli = BaseDeDatos::instancia()->sqli();
        $statement = $sqli->prepare("INSERT INTO Venta (IdUsuario, Fecha, Importe) VALUES (?, ?, ?)");        
        $statement->bind_param('isd', $idUsuario, $fecha, $importe);
        $statement->execute();
        return $sqli->insert_id;
    }
    
    private function registraDetalleCompra($idCompra, $idMedicamento, $cantidad)
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        $statement = $sqli->prepare("INSERT INTO DetalleVenta (IdVenta, IdMedicamento, Cantidad) VALUES (?, ?, ?)");        
        $statement->bind_param('iii', $idCompra, $idMedicamento, $cantidad);
        $statement->execute();
    }
    
    public function creaSketchCarrito()
    {
        if(isset($_SESSION['carrito']) && is_array($_SESSION['carrito']))
        {
            $sqli = BaseDeDatos::instancia()->sqli();
            $total = 0;

            foreach ($_SESSION['carrito'] as $idMed)
            {
                $resultado = $sqli->query("SELECT * FROM VistaBusquedas WHERE IdMedicamento=".$idMed);
                $renglon = $resultado->fetch_assoc();
                $id = $renglon['IdMedicamento'];
                
                include 'DiseñoCarrito/RenglonArticulo.php';
                $total += $renglon['CostoConDescuento'];
            }

            include 'DiseñoCarrito/RenglonCosto.php';
        }
    }
    
    public function numItemsCarrito()
    {
        $numItemsCarrito = 0;
        
        if (isset($_SESSION['carrito']) && is_array($_SESSION['carrito'])) 
            $numItemsCarrito = count($_SESSION['carrito']);
        
        echo $numItemsCarrito;
    }
    
    public function quitaDeCarrito()
    {
        $consultas = array();
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        
        if (isset($_SESSION['carrito']) && is_array($_SESSION['carrito'])
         && isset($consultas['id'])) 
        {
            $pos = array_search($_SESSION['carrito'], $consultas['id']);
            unset($_SESSION['carrito'][$pos]);
            header($this->ruta);
        }
    }
    
    public function validaCompra()
    {
        if (isset($_POST['realizaCompra']) && isset($_POST['IdSustancia']) 
         && isset($_POST['cantidad']) && isset($this->usuario))
        {
            $importe = $_POST['CostoTotal'];
            $idCompra = $this->registraCompra($importe);
            
            $tam = count($_POST['IdSustancia']);
            
            
            for ($i = 0; $i < $tam; $i++)
            {
                $idMedicamento = $_POST['IdSustancia'][$i];
                $cantidad = $_POST['cantidad'][$i];
                
                $this->registraDetalleCompra($idCompra, $idMedicamento, $cantidad);
            }
            
            header($this->rutaVistaCompra.'?id='.$idCompra);
        }
    }
}