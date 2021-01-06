<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorVistaProducto
 *
 * @author mickey
 */
include('/opt/lampp/htdocs/ProyectoTecWeb/Controladores/Controlador.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/BaseDeDatos.php');

class ControladorVistaProducto extends Controlador 
{
    private $ruta;
    private $rutaValidacion;
    
    public function __construct()
    {
        parent::__construct();
        $this->ruta = 'Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/VistaProducto/VistaProducto.php';
        $this->rutaValidacion = 'Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/Productos/Productos.php';
    }
    
    private function muestraLayoutProducto($renglon)
    {   
        ?>
        <div class="col-sm-6 mb-4 mb-md-0">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($renglon['Foto']);?>"width="300" height="300"/>
        </div>
        <div class="ml-5 col-sm-6 mb-4 mb-md-0">
            <div class="row">
                <div class="ml-2 col-xs">
                    <h5> <?php echo $renglon['NombreSustancia']; ?> </h5>
                    <p class="mb-2 text-muted text-uppercase small"> Dosis de <?php echo $renglon['Dosis'].'mg'; ?> </p>
                    <p class="mb-2 text-muted text-uppercase small"> Laboratorio: <?php echo $renglon['NombreLaboratorio']; ?> </p>
                </div>
            </div>
            <div class="mt-3 row">
                <div class="ml-2 mt-2 col-xs">
                    <?php
                    if ($renglon['CostoOriginal'] != $renglon['CostoConDescuento'])
                    {
                        echo '<h4><del>$'.$renglon['CostoOriginal'].'</del></h4>';
                        echo '<h4 class="text-danger"><strong>$'.$renglon['CostoConDescuento'].'</strong></h4>';
                    }
                    else
                    {
                        echo '<h4><strong>$'.$renglon['CostoConDescuento'].'</strong></h4>';
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="mt-2 ml-2 col-xs">
                    <a href="./AgregaACarrito.php?id=<?php echo $renglon['IdMedicamento']; ?>">
                        <button type="button" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                            </svg>
                            Agregar al carrito
                        </button>
                    </a>
                </div>
            </div>
        </div>  
            
        <?php      
    }
    
    public function obtenProducto()
    {
        $consultas = array();
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        
        if (!isset($consultas['id']))
            header ($this->rutaValidacion);
        
        $sqli = BaseDeDatos::instancia()->sqli();
        $resultado = $sqli->query("SELECT * FROM VistaBusquedas WHERE IdMedicamento=".$consultas['id']);
        $renglon = $resultado->fetch_assoc();
        $this->muestraLayoutProducto($renglon);
    }
    
    public function agregaACarrito()
    {
        $consultas = array();
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        
        if (!isset($consultas['id']))
            header ($this->rutaValidacion);
        
        parent::validaCarrito();
        $carrito = $_SESSION['carrito'];
        
        if (!in_array($consultas['id'], $carrito))
            array_push($carrito, $consultas['id']);
        
        $_SESSION['carrito'] = $carrito;
        header($this->rutaValidacion);
    }
}
