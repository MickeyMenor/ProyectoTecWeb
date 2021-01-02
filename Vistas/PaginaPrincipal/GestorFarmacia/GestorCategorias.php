<?php
    include('/opt/lampp/htdocs/ProyectoTecWeb/Controladores/ControladorGestorFarmacia.php');
    $controlador = ControladorGestorFarmacia::instancia();
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
            <div class="row align-items-center">
<?php 
    include '/opt/lampp/htdocs/ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/NavBar/NavBar.php';
?>
                <div class="col-lg">
                    <div class="row align-items-center">
                        <div class="mt-5 ml-5 col-">
                            <a class="btn btn-primary" href="/ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/AgregarCategoria.php" role="button"> Agrega Categoria </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
