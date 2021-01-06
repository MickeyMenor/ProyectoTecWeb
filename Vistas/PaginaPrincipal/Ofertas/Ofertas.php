<?php
    include('ControladorOfertas.php');
    $controlador = new ControladorOfertas();
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
            <div class="ml-2 mt-3 row align-items-center">
                <div class="ml-5 col-xs">
                    <h2 class="ml-5">
                        Algunas de nuestras ofertas:
                    </h2>
                </div>
            </div>
            <div class="ml-2 mt-3 row align-items-center">
                <div class="col-sm">
                    <div id="carouselExampleControls" class="ml-5 carousel slide" data-ride="carousel" style="width:500px; height: 400px">
                        <div class="carousel-inner">
                            <?php //$controlador->muestraMedicamentos(); ?>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"></path>
                                </svg>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                                    <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>