<div class="col-sm">
    <form class="mt-5 ml-5" enctype="multipart/form-data" method="post" action="./AgregarACategoria.php">
        <div class="row align-items-center">
            <div class="mt-3 col-xs">
                <label for="categoria"> Categoria </label>
                <select class="form-control" id="categoria" onchange="cambiaIdCategoriaSeleccionada(this);" required>
                    <option id="c-1"></option>
                    <?php $controlador->muestraOpcionesCategorias(); ?>
                </select>
                <input type="hidden" name="IdCategoria" id="IdCategoria" value="-1">
            </div>
        </div>
        <div class="row align-items-center">
            <div class="mt-3 col-xs">
                <label for="medicamento"> Medicamento </label>
                <select class="form-control" id="medicamento" onchange="cambiaIdMedicamentoSeleccionado(this);" required>
                    <option id="m-1"></option>
                    <?php $controlador->muestraOpcionesMedicamentos(); ?>
                </select>
                <input type="hidden" name="IdMedicamento" id="IdMedicamento" value="-1">
            </div>
        </div>
        <div class="row align-items-center">
            <div class="mt-3 col-xs">
                <input class="btn btn-primary" name="boton" type="submit" style="margin-top: 20px;" value="Agregar">
            </div>
        </div>
    </form>
</div>