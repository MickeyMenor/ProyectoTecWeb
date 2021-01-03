<?php
    include('ControladorPaginaPrincipal.php');
    $controlador = new ControladorPaginaPrincipal();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php 
        include 'Metadatos/Metadatos.php';
    ?>
    <body>
        <div class="container">
            <?php 
                include 'Encabezado/Encabezado.php';
            ?>
            <!--
            <div class="ml-2 mt-3 row align-items-center">
                <div class="col-lg">
                    <nav class="navbar navbar-dark bg-success">
                        <a class="px-1 navbar-brand" href="#"> Antibióticos </a>
                        <a class="px-1 navbar-brand" href="#"> Antidepresivos </a>
                        <a class="px-1 navbar-brand" href="#"> Antivirales </a>
                        <a class="px-1 navbar-brand" href="#"> Analgésicos </a>
                        <a class="px-1 navbar-brand" href="#"> Estéticos </a>
                        <?php
                            $controlador->verificaMenuNavegacion();
                        ?>
                    </nav>
                </div>
            </div>-->
        </div>
    </body>
</html>