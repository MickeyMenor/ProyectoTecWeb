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
        $this->rutaValidacion = 'Location: Vistas/PaginaPrincipal/Productos/Productos.php';
    }
    
    private function muestraLayoutProducto($renglon)
    {   
        ?>
        <div class="col-sm-6 mb-4 mb-md-0">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($renglon['Foto']);?>"width="400" height="400"/>
        </div>
        <div class="col-sm-6 mb-4 mb-md-0">
            <div class="row">
                <div class="ml-5 col-xs">
                    <h5> <?php echo $renglon['NombreSustancia']; ?> </h5>
                    <p class="mb-2 text-muted text-uppercase small"> Dosis de <?php echo $renglon['Dosis'].'mg'; ?> </p>
                    <p class="mb-2 text-muted text-uppercase small"> Laboratorio: <?php echo $renglon['NombreLaboratorio']; ?> </p>
                </div>
            </div>
            <div class="mt-5 row">
                <div class="ml-5 mt-5 col-xs">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default btn-number bg-info" data-type="plus" data-field="quant[1]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="white" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"></path>
                                </svg>
                            </button>
                        </span>
                        <input style="width:60px;" type="text" name="cantidad" class="form-control input-number" value="1" min="1" max="<?php echo $renglon['Stock']; ?>">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default btn-number bg-danger" data-type="plus" data-field="quant[1]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="white" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                                </svg>
                            </button>
                        </span>
                    </div>
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
}
