<?php
    include('ControladorCarritoDeCompras.php');
    $controlador = new ControladorCarritoDeCompras();
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
            <?php include '/opt/lampp/htdocs/ProyectoTecWeb/Vistas/PaginaPrincipal/Encabezado/Encabezado.php'; ?>
<!------ Include the above in your HEAD tag ---------->

            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-md-offset-1">
                        <form method="post">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Medicamento</th>
                                        <th>Cantidad</th>
                                        <th class="text-center"> Precio Unitario </th>
                                        <th class="text-center"> Total </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <input type="hidden" name="NumProductos" id="NumProductos" value="<?php $controlador->numItemsCarrito() ?>">
                                    <?php $controlador->creaSketchCarrito(); ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>