<?php
    include('ControladorBuscaProductos.php');
    $controlador = new ControladorBuscaProductos();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php include '/opt/lampp/htdocs/ProyectoTecWeb/Vistas/PaginaPrincipal/Metadatos/Metadatos.php'; ?>
    <body>
        <div class="container-fluid">
            <?php 
                include '/opt/lampp/htdocs/ProyectoTecWeb/Vistas/PaginaPrincipal/Encabezado/Encabezado.php'; 
            ?>
            <div class="ml-2 mt-3 row align-items-center">
                <div class="col-lg">
                    <form class="mt-2 ml-5" enctype="multipart/form-data" method="post" action="/ProyectoTecWeb/Vistas/PaginaPrincipal/BuscaProducto/BuscaProducto.php">
                        <div class="row align-items-start">
                            <?php 
                                include 'FormaBuscaProductos/Categorias.php';
                                include 'FormaBuscaProductos/BarraBusqueda.php';
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>