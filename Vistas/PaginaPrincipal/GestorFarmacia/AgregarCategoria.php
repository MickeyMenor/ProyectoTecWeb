<?php
    include('/opt/lampp/htdocs/ProyectoTecWeb/Controladores/ControladorGestorCategorias.php');
    $controlador = new ControladorGestorCategorias();
    $controlador->validaCategoria();
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
        <div class="container">
            <?php 
                include '/opt/lampp/htdocs/ProyectoTecWeb/Vistas/PaginaPrincipal/Encabezado/Encabezado.php';
            ?>
            <div class="row align-items-start">
                <?php 
                    include '/opt/lampp/htdocs/ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/NavBar/NavBar.php';
                ?>
                <div class="col-lg">
                    <div class="mt-5 ml-5 row align-items-center">
                        <form method="post" action="/ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/AgregarCategoria.php">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="mt-3 col-xs">
                                        <label for="textoCategoria"> Nombre categoría </label>
                                        <input id="textoCategoria" class="form-control" type="text" name="textoCategoria" required>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="mt-3 col-xs">
                                        <label for="textoDescripción"> Descripción </label>
                                        <input id="textoDescripción" class="form-control" type="text" name="textoDescripción" required>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="mt-3 col-xs">
                                        <input class="btn btn-primary" name="botonAltaMedicamento" type="submit" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>