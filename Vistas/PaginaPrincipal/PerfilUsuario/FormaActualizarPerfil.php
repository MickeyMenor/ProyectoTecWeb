<?php
    include('ControladorPerfilUsuario.php');
    $controlador = new ControladorPerfilUsuario();
    $controlador->validaActualizarPerfil();
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
            <div class="ml-2 row align-items-center">
            <div class="mt-3 col-xs">
                <form class="mt-5 ml-5" enctype="multipart/form-data" method="post" action="./FormaActualizarPerfil.php">
                    <div class="row align-items-center">
                        <div class="mt-3 col-xs">
                            <label for="textoNombre"> Nombre: </label>
                            <input id="textoNombre" class="form-control" type="text" name="textoNombre" required>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="mt-3 col-xs">
                            <label for="textoAlias"> Alias nuevo: </label>
                            <input id="textoAlias" class="form-control" type="text" name="textoAlias" required>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="mt-3 col-xs">
                            <label for="textoCorreo"> Correo nuevo: </label>
                            <input id="textoCorreo" class="form-control" type="email" name="textoCorreo" required>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="mt-3 col-xs">
                            <label for="textoPwdOld"> Contraseña vieja: </label>
                            <input id="textoPwdOld" class="form-control" type="password" name="textoPwdOld" required>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="mt-3 col-xs">
                            <label for="textoPwd"> Contraseña nueva: </label>
                            <input id="textoPwd" class="form-control" type="password" name="textoPwd" required>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="mt-3 col-xs">
                            <input class="btn btn-primary" name="boton" type="submit" style="margin-top: 20px;" value="Modifica">
                        </div>
                    </div>
                </form>
            </div>        
        </div>
        </div>
    </body>
</html>