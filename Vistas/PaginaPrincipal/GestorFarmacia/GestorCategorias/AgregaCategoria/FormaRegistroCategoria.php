<div class="col-sm">
    <form class="mt-5 ml-5" enctype="multipart/form-data" method="post" action="/ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/GestorCategorias/AgregaCategoria/AgregaCategoria.php">
        <div class="row align-items-center">
            <div class="mt-3 col-xs">
                <label for="textoNombre"> Nombre de la categoria </label>
                <input id="textoNombre" class="form-control" type="text" name="textoNombre" required>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="mt-3 col-xs">
                <label for="textoDescripcion"> Descripción </label>
                <input id="textoDescripcion" class="form-control" type="text" name="textoDescripcion" required>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="mt-3 col-xs">
                <input class="btn btn-primary" name="boton" type="submit" style="margin-top: 20px;" value="Agregar">
            </div>
        </div>
    </form>
</div>