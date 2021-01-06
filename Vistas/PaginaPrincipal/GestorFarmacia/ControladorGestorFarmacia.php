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
include('/opt/lampp/htdocs/ProyectoTecWeb/Controladores/Controlador.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/BaseDeDatos.php');

class ControladorGestorFarmacia extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        
        if (isset($this->usuario))
        {
            if ($this->usuario->rol() != 1)
                header("Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/Productos/Productos.php");
        }
        else
        {
            session_unset(); 
            session_destroy(); 
            header("Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/Productos/Productos.php");
        }
    }
    
    protected function creaBoton($renglon) {}
    
    protected function creaTabla($arreglo, $nombres)
    {
    ?>  <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr> <?php 
                    
                    foreach ($nombres as $clave => $valor) 
                    {
                    ?>  <th scope="col"> <?php echo $clave ?> </th> <?php 
                    }
                    
                    ?>  <th scope="col"> Info. </th>
                    </tr>
                </thead>
                <tbody> <?php 
                    foreach ($arreglo as $renglon) 
                    {
                    ?>  <tr> <?php 
                    
                        foreach ($nombres as $clave => $valor) 
                        {
                        ?>  <td class="align-middle" scope="row"> <?php
                            if ($valor === 'Foto')
                                echo '<img src="data:image/jpg;base64,'.base64_encode($renglon[$valor]).'" width="180" height="180"/>';
                            else 
                                echo $renglon[$valor]; 
                        ?>  </td> <?php 
                        }
                        
                        $this->creaBoton($renglon); ?>
                    </tr>
              <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}