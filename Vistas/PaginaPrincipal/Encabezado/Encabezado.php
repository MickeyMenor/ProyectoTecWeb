<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="ml-2 mt-3 row align-items-center">
    <div class="col-sm">
        <div class="row">
            <div class="col-xs">
                <img class="rounded-circle" src="http://localhost:8080/ProyectoTecWeb/Fotos/chabelo.jpeg" alt="Chabelo" width="150" height="100"> 
            </div>
            <div class="col-xs"> 
                <img src="http://localhost:8080/ProyectoTecWeb/Fotos/logo.png" alt="Chabelo" width="220" height="100"> 
            </div>
        </div>
    </div>
    <div class="col-md"> 
        <div class="pl-5 row justify-content-end">
            <div class="px-2 col-xs"> 
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <?php 
                        $controlador->cargaMenuPerfil();
                    ?>
                    </div>
                </div>
            </div>
            <div class="px-2 col-xs"> 
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="ml-2 mt-3 row align-items-center">
    <div class="col-xl">
        <nav class="navbar navbar-dark bg-success">
            <a class="px-1 navbar-brand" href="#"> Nuestros productos </a>
            <a class="px-1 navbar-brand" href="#"> Nuestras ofertas </a>
            <a class="px-1 navbar-brand" href="#"> Busque un producto </a>
            <a class="px-1 navbar-brand" href="#"> Contáctenos </a>
            <?php
                $controlador->verificaMenuNavegacion();
            ?>
        </nav>
    </div>
</div>