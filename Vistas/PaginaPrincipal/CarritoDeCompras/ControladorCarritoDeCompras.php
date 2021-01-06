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
    private $carrito;
    
    public function __construct()
    {
        parent::__construct();
        parent::validaCarrito();
    }
    
    private function creaRenglonCarrito($renglon)
    {
        $id = $renglon['IdMedicamento'];
        ?>
        <tr id="<?php echo $id; ?>">
            <td class="col-sm-8 col-md-6">
                <div class="media">
                    <a class="thumbnail pull-left" href="#"> 
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($renglon['Foto']);?>"width="72" height="72"/>
                    </a>
                    <div class="ml-3 media-body">
                        <h4 class="media-heading"><?php echo $renglon['NombreSustancia']; ?></h4>
                        <h6 class="media-heading"> <?php echo $renglon['Dosis'].'mg'; ?> </h6>
                        <h6 class="media-heading"> Laboratorio: <?php echo $renglon['NombreLaboratorio']; ?> </h6>
                    </div>
                </div>
            </td>
            <td class="col-sm-1 col-md-1" style="text-align: center">
                <input onchange="modificaProducto('cu-<?php echo $id; ?>', 'ct-<?php echo $id; ?>', this);" type="number" class="form-control" id="cantidad-<?php echo $renglon['IdMedicamento'];?>" value="1" min="1" max="<?php echo $renglon['Stock']; ?>">
            </td>
            <td id="cu-<?php echo $id;?>" class="col-sm-1 col-md-1 text-center" value="<?php echo $renglon['CostoConDescuento']; ?>">
                <strong> <?php echo $renglon['CostoConDescuento']; ?> </strong>
            </td>
            <td id="ct-<?php echo $id;?>" class="col-sm-1 col-md-1 text-center" value="<?php echo $renglon['CostoConDescuento']; ?>">
                <strong> <?php echo $renglon['CostoConDescuento']; ?> </strong>
            </td>
            <td class="col-sm-1 col-md-1">
                <a href="#" onclick="quitaProducto('<?php echo $id;?>', 'ct-<?php echo $id;?>')">
                    <button type="button" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Quitar </button>
                </a>
            </td>
        </tr>   
        <?php
    }
    
    private function creaRenglonPrecio($renglon, $total)
    {
        ?>
        <tr>
            <td>   </td>
            <td>   </td>
            <td>   </td>
            <td><h3>Importe</h3></td>
            <td id="ImporteTotal" class="text-right" value="<?php echo $total; ?>"><h3><strong><?php echo $total; ?></strong></h3></td>
        </tr>
        <tr>
            <td>   </td>
            <td>   </td>
            <td>   </td>
            <td>
                <button type="button" class="btn btn-primary">
                    Continuar comprando
                    <span class="glyphicon glyphicon-shopping-cart"></span> 
                </button>
            </td>
            <td>
                <button type="button" class="btn btn-success">
                    Finalizar compra
                    <span class="glyphicon glyphicon-play"></span>
                </button>
            </td>
        </tr>
        <?php
    }
    
    public function creaSketchCarrito()
    {
        if(isset($_SESSION['carrito']) && is_array($_SESSION['carrito']))
        {
            $sqli = BaseDeDatos::instancia()->sqli();
            $suma = 0;

            foreach ($_SESSION['carrito'] as $idMed)
            {
                $resultado = $sqli->query("SELECT * FROM VistaBusquedas WHERE IdMedicamento=".$idMed);
                $renglon = $resultado->fetch_assoc();
                $this->creaRenglonCarrito($renglon);
                $suma += $renglon['CostoConDescuento'];
            }

            $this->creaRenglonPrecio($renglon, $suma);
        }
    }
    
    public function numItemsCarrito()
    {
        $numItemsCarrito = 0;
        
        if (isset($_SESSION['carrito']) && is_array($_SESSION['carrito'])) 
        {
            $numItemsCarrito = count($_SESSION['carrito']);
        }

        echo $numItemsCarrito;
    }
    
    public function quitaDeCarrito($id)
    {
        
    }
}