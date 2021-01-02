<div class="col-sm">
    <form class="mt-5 ml-5" enctype="multipart/form-data" method="post" action="/ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/GestorProductos/AgregaProducto/AgregarProducto.php">
        <div class="row align-items-center">
            <div class="col-xs">      
                <label for="selectorSustancias">  Escoge una sustancia </label>   
                <select class="form-control" id="selectorSustancias" onchange="cambiaTexto(this, 'textoSustancia', 'IdSustancia');">
                    <option id="s-1"> Nueva Sustancia </option>
                    <?php
                        $controlador->muestraSustancias();
                    ?>
                </select>
                <input type="hidden" name="IdSustancia" id="IdSustancia" value="s-1">
                <input class="mt-3" id="textoSustancia" class="form-control" type="text" value="" name="textoSustancia" required>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="mt-3 col-xs">      
                <label for="selectorLaboratorios">  Escoge un laboratorio </label>   
                <select class="form-control" id="selectorLaboratorios" onchange="cambiaTexto(this, 'textoLaboratorio', 'IdLaboratorio');">
                    <option id="l-1"> Nuevo Laboratorio </option>
                    <?php
                        $controlador->muestraLaboratorios();
                    ?>
                </select>
                <input type="hidden" name="IdLaboratorio" id="IdLaboratorio" value="l-1">
                <input class="mt-3" id="textoLaboratorio" class="form-control" type="text" value="" name="textoLaboratorio" required>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="mt-3 col-xs">
                <label for="textoPresentacion"> Presentación </label>
                <input id="textoPresentacion" class="form-control" type="text" name="textoPresentacion" required>
            </div>
            <div class="ml-3 mt-3 col-xs">
                <label for="textoDosis"> Dosis en miligramos </label>
                <input id="textoDosis" class="form-control" type="number" name="textoDosis" required>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="mt-3 col-xs">
                <label for="textoCantidad"> Cantidad </label>
                <input id="textoCantidad" class="form-control" type="number" name="textoCantidad" required>
            </div>
            <div class="ml-3 mt-3 col-xs">
                <label for="textoCosto"> Costo </label>
                <input id="textoCosto" class="form-control" type="number" name="textoCosto" required>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="mt-3 col-xs">
                <label for="textoStock"> Stock </label>
                <input id="textoStock" class="form-control" type="number" name="textoStock" required>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="mt-3 col-xs">
                <label class="form-label" for="fotoProducto"> Escoge una foto </label>
                <input type="file" class="form-control" id="fotoProducto" name="fotoProducto" /> 
            </div>
        </div>
        <div class="row align-items-center">
            <div class="mt-3 col-xs">
                <input class="btn btn-primary" name="boton" type="submit" style="margin-top: 20px;" value="Agregar">
            </div>
        </div>
    </form>
</div>