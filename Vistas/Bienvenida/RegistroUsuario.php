<?php 
    include('ControladorRegistroUsuario.php'); 
    $controlador = new ControladorRegistroUsuario();
    $controlador->validaCreacionUsuario();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php 
        include('/opt/lampp/htdocs/ProyectoTecWeb/Vistas/Metadatos/Metadatos.php'); 
    ?>
    <body>
        <div class="container-fluid">
            <header>
            <?php 
                include('/opt/lampp/htdocs/ProyectoTecWeb/Vistas/Logo/Logo.php'); 
            ?>
                <div class="row ml-2 mt-5 mb-3">
                    <h3> 
                        Regístrate <br>
                    </h3>
                </div>
            </header>
            <form action="http://localhost:8080/ProyectoTecWeb/Vistas/Bienvenida/RegistroUsuario.php" method="post">
                <div class="row ml-2 mt-2 mb-2">
                    <div class="col-xs">
                        <label for="nomCompleto"> Nombre completo: </label>
                        <input type="text" class="form-control" placeholder="Ingresa tu Alias" id="nomCompleto" name="nomCompleto" required>    
                    </div>
                </div>
                <div class="row ml-2 mt-2 mb-2">
                    <div class="col-xs">
                        <label for="nomUsuario"> Nombre de usuario: </label>
                        <input type="text" class="form-control" placeholder="Ingresa tu Alias" id="nomUsuario" name="nomUsuario" required>    
                    </div>
                </div>
                <div class="row ml-2 mt-4 mb-2">
                    <div class="col-xs">
                        <label for="pwd" class="form-label positoion-relative"> Contraseña: </label>
                        <input type="password" class="form-control" id="pwd" name="passwrd" required>
                    </div>
                </div>
                <div class="row ml-2 mt-4 mb-2">
                    <div class="col-xs">
                        <label for="correoUsuario" class="form-label positoion-relative"> Correo Electrónico: </label>
                        <input type="email" class="form-control" id="correoUsuario" name="correoUsuario" required>
                    </div>
                </div>
                <div class="row ml-2 mt-2 mb-2">
                    <div class="col-xs">
                        <input class="btn btn-primary" name="boton" type="submit" style="margin-top: 20px;" value="Regístrate">
                    </div>
                </div>
            </form> 
            <form action="http://localhost:8080/ProyectoTecWeb/Vistas/PaginaPrincipal/Productos/Productos.php" method="post">
                <div class="row ml-2 mt-4 mb-2 mb-2">
                    <div class="col-xs">
                        <input class="btn btn-primary" name="botonRegreso" type="submit" value="Regresar">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>