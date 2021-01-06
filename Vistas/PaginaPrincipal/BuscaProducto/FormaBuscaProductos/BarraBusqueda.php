<div class="ml-3 col-sm">
    <div class="row align-items-center">
        <div class="col-xs">
            <label for="textoDescripcion"> Descripción </label>
        </div> 
    </div> 
    <div class="row align-items-center">
        <div class="col-xs">
            <input id="textoBuscar" class="form-control" type="text" name="textoBuscar">
        </div>    
        <div class="ml-3 col-xs">
            <input class="btn btn-primary" name="boton" type="submit" value="Buscar">
        </div>
    </div> 
    <div class="row align-items-center">
        <?php $controlador->validaBusqueda(); ?>
    </div> 
</div> 