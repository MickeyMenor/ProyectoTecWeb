<?php
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Farmacias de Chabelo </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="http://localhost:8080/ProyectoTecWeb/CSS/HojasDeEstilo.css">
    </head>
    <body>
        <header>
            <div class="row align-items-center">
                <div class="col-">
                    <img class="rounded-circle" src="http://localhost:8080/ProyectoTecWeb/Fotos/chabelo.jpeg" alt="Chabelo" width="150" height="100"> 
                </div>
                <div class="col-"> 
                    <img src="http://localhost:8080/ProyectoTecWeb/Fotos/logo.png" alt="Chabelo" width="220" height="100"> 
                </div>
            </div>
        </header>
        <h2 class="encabezadoBienvenida"> 
            ¡Bienvenido! Por favor inicia <br>
            sesión o regístrate para acceder <br> 
            a la tienda <br>
        </h2>
        
        <form action="http://localhost:8080/ProyectoTecWeb/Vistas/Bienvenida.php" method="post">
            <input type="submit" name="botonInicioSesion" value="Iniciar Sesión">
            <input type="submit" name="botonRegistro" value="Registrarse">
        </form> 
    </body>
</html>

