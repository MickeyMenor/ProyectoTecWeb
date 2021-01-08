<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorVistaCompra
 *
 * @author mickey
 */
include('/opt/lampp/htdocs/ProyectoTecWeb/Controladores/Controlador.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/BaseDeDatos.php');

class ControladorVistaCompra extends Controlador 
{
    private $ruta;
    private $rutaValidacion;
    public $idCompra;
    public $total;
    
    public function __construct()
    {
        parent::__construct();
        $this->ruta = 'Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/VistaProducto/VistaProducto.php';
        $this->rutaValidacion = 'Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/Productos/Productos.php';
        $consultas = array();
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        $this->idCompra = $consultas['id'];
        $this->total = 0;
    }
    
    
    
    public function muestraDetalleCompra()
    {
        $this->total = 0;
        $sqli = BaseDeDatos::instancia()->sqli();
        $statement = $sqli->prepare("SELECT Venta.IdVenta AS IdVenta, NombreSustancia, Dosis_mg, DetalleVenta.Cantidad, "
                . "Foto, InfoMedicamentos.Costo AS Costo, Importe FROM DetalleVenta "
                . "INNER JOIN Venta ON DetalleVenta.IdVenta = Venta.IdVenta "
                . "INNER JOIN InfoMedicamentos ON InfoMedicamentos.IdMedicamento = DetalleVenta.IdMedicamento "
                . "WHERE Venta.IdVenta = ?");    
        
        echo $sqli->error;
        $statement->bind_param('i', $this->idCompra);
        $statement->execute();
        $resultado = $statement->get_result();
        $arreglo = !$resultado ? array() : $resultado->fetch_all(MYSQLI_ASSOC);
        
        foreach ($arreglo as $renglon)
        {
            include 'RenglonCompra.php';
            $this->total += $renglon['Costo'] * $renglon['Cantidad'];
        }
        
        $this->recreaCarrito();
    }
}