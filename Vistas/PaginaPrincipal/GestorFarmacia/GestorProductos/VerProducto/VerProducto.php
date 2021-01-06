<?php
    include('/opt/lampp/htdocs/ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/GestorProductos/ControladorGestorProductos.php');
    $controlador = new ControladorGestorProductos();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php 
        include '/opt/lampp/htdocs/ProyectoTecWeb/Vistas/PaginaPrincipal/Metadatos/Metadatos.php';
    ?>
    <body>
        <div class="container-fluid">
            <?php 
                include '/opt/lampp/htdocs/ProyectoTecWeb/Vistas/PaginaPrincipal/Encabezado/Encabezado.php';
            ?>
            <div class="container-fluid">
                <div class="row align-items-start">
                    <?php 
                        include '/opt/lampp/htdocs/ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/NavBar/NavBar.php';
                        $controlador->muestraTarjetaMedicamento();
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
