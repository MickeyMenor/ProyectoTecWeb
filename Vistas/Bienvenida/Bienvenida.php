<?php 
    include('ControladorBienvenida.php'); 
    $controlador = new ControladorBienvenida();
    $controlador->validaInicioSesion();
?>

<!DOCTYPE html>
<!--
    Encabezado para el inicio de sesión en la página de la
    farmacia.
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
                        Por favor inicia sesión <br> 
                        o regístrate <br>
                    </h3>
                </div>
            </header>
            <form action="http://localhost:8080/ProyectoTecWeb/Vistas/Bienvenida/Bienvenida.php" method="post">
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
                <div class="row ml-2 mt-4 mb-2 mb-2">
                    <div class="col-xs">
                        <input class="btn btn-primary" name="botonInicioSesion" type="submit" value="Inicia sesión">
                    </div>
                </div>
            </form> 
            <form action="http://localhost:8080/ProyectoTecWeb/Vistas/Bienvenida/RegistroUsuario.php" method="post">
                <div class="row ml-2 mt-4 mb-2 mb-2">
                    <div class="col-xs">
                        <input class="btn btn-primary" name="botonRegistro" type="submit" value="Regístrate">
                    </div>
                </div>
            </form>
            <form action="http://localhost:8080/ProyectoTecWeb/Vistas/PaginaPrincipal/PaginaPrincipal.php" method="post">
                <div class="row ml-2 mt-4 mb-2 mb-2">
                    <div class="col-xs">
                        <input class="btn btn-primary" name="botonRegreso" type="submit" value="Regresar">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>