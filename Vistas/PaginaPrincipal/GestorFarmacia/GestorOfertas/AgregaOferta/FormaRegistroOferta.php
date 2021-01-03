<div class="col-sm">
    <form class="mt-5 ml-5" enctype="multipart/form-data" method="post" action="/ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/GestorOfertas/AgregaOferta/AgregaOferta.php">
        <div class="row align-items-center">
            <div class="mt-3 col-xs">
                <label for="porcentajeDescuento"> Porcentaje de descuento </label>
                <input id="porcentajeDescuento" class="form-control" type="number" min="1" max="35" name="porcentajeDescuento" required>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="mt-3 col-xs">
                <label for="MedicamentoOferta"> Medicamento </label>
                <select class="form-control" id="MedicamentoOferta" onchange="cambiaIdMedicamentoOferta(this);" required>
                    <option id="-1"></option>
                    <?php
                        $controlador->muestraMedicamentos();
                    ?>
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