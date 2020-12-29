<?php
    include('/opt/lampp/htdocs/ProyectoTecWeb/Controladores/ControladorPaginaPrincipal.php');
    $controlador = ControladorPaginaPrincipal::instancia();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> Farmacias de Chabelo </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="./Estilos/Estilos.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <?php 
                include 'Encabezado/Encabezado.php';
            ?>
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
            </div>
        </div>
    </body>
</html>