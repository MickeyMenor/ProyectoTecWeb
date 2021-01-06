<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorProductos
 *
 * @author mickey
 */
include('/opt/lampp/htdocs/ProyectoTecWeb/Controladores/Controlador.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/BaseDeDatos.php');

class ControladorProductos extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function creaItemSlider($renglon, $i)
    {
        ?>
        <div class="carousel-item <?php echo ($i == 0 ? 'active' : '');?>">
            <div class="card" style="width: 18rem; margin-left: 100px;">
                <img class="pl-5 d-block w-100" width="400" height="250" src="data:image/jpeg;base64,<?php echo base64_encode($renglon['Foto']); ?>"/>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $renglon['NombreSustancia'].' '.$renglon['Dosis_mg'].' mg'; ?></h5>
                    <p class="card-text"> Laboratorio: <?php echo $renglon['NombreLaboratorio']; ?> </p>
                    <p class="card-text"> Precio: <?php echo '$'.$renglon['Costo']; ?> </p>
                    <a href="#" class="btn btn-primary"> Ver </a>
                </div>
            </div>
        </div>
        <?php
    }
    
    public function muestraMedicamentos()
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "SELECT * FROM InfoMedicamentos";
        $resultado = $sqli->query($consulta);
        $arreglo = !$resultado ? array() : $resultado->fetch_all(MYSQLI_ASSOC);
        $i = 0;
        
        foreach ($arreglo as $renglon)
        {
            $this->creaItemSlider($renglon, $i);
            $i++;
        }
    }
}
