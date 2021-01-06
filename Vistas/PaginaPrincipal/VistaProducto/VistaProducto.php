<?php
    include('ControladorVistaProducto.php');
    $controlador = new ControladorVistaProducto();
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
            <section class="ml-5 mt-5" id="main-section">
                <h2 class="section-heading mb-4">
                    Detalle del producto: 
                </h2>
                <section class="mb-5">
                    <div class="row">
                        <?php $controlador->obtenProducto(); ?>
                    </div>
                </section> 
            </section> 
        </div>
    </body>
</html>
