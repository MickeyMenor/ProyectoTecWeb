<?php 
    include('/opt/lampp/htdocs/ProyectoTecWeb/Controladores/ControladorBienvenida.php'); 
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
        <div class="container">
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
            <form class="row" action="http://localhost:8080/ProyectoTecWeb/Vistas/Bienvenida/Bienvenida.php" method="post">
                <div class="col">
                    <div class="row ml-2 mt-2 mb-2">
                        <div class="col">
                            <div class="row">
                                <label for="nomUsuario"> Usuario: </label>
                            </div>
                            <div class="row">
                                <div class="col-xs">
                                    <input type="text" class="form-control" placeholder="Ingresa tu Alias" id="nomUsuario" name="nomUsuario" required> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ml-1 mt-4 mb-2">
                        <div class="col-xs">
                            <label for="pwd" class="form-label positoion-relative"> Contraseña: </label>
                            <input type="password" class="form-control" id="pwd" name="passwrd" required>
                        </div>
                    </div>
                    <div class="row ml-2 mt-2 mb-2">
                        <div class="col">
                            <div class="row">
                                <div class="col-xs">
                                    <input class="btn btn-primary" name="botonInicioSesion" type="submit" style="margin-top: 20px;" value="Inicia sesión">
                                </div>
                                <div class="ml-2 col-xs">
                                    <input class="btn btn-primary" name="botonRegistro" type="submit" style="margin-top: 20px;" value="Regístrate">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs">
                                    <button type="submit" name="botonAyuda" style="margin-top: 20px" class="btn btn-primary"> Olvidé la contraseña </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form> 
        </div>
    </body>
</html>