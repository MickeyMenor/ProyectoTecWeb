<tr id="<?php echo $id; ?>">
    <input type="hidden" name="IdSustancia[]" value="<?php echo $id; ?>">
    <td class="col-sm-8 col-md-6">
        <div class="media">
            <a class="thumbnail pull-left" href="#"> 
                <img src="data:image/jpeg;base64,<?php echo base64_encode($renglon['Foto']);?>" width="72" height="72"/>
            </a>
            <div class="ml-3 media-body">
                <h4 class="media-heading"><?php echo $renglon['NombreSustancia']; ?></h4>
                <h6 class="media-heading"> <?php echo $renglon['Dosis'].'mg'; ?> </h6>
                <h6 class="media-heading"> Laboratorio: <?php echo $renglon['NombreLaboratorio']; ?> </h6>
            </div>
        </div>
    </td>
    <td class="col-sm-1 col-md-1" style="text-align: center">
        <input onchange="modificaProducto('cu-<?php echo $id; ?>', 'ct-<?php echo $id; ?>', this);" type="number" class="form-control" name="cantidad[]"  id="cantidad-<?php echo $renglon['IdMedicamento'];?>" value="1" min="1" max="<?php echo $renglon['Stock']; ?>">
    </td>
    <td id="cu-<?php echo $id;?>" class="col-sm-1 col-md-1 text-center" value="<?php echo $renglon['CostoConDescuento']; ?>">
        <strong> <?php echo $renglon['CostoConDescuento']; ?> </strong>
    </td>
    <td name="ImporteArticulos[]" id="ct-<?php echo $id;?>" class="col-sm-1 col-md-1 text-center" value="<?php echo $renglon['CostoConDescuento']; ?>">
        <strong> <?php echo $renglon['CostoConDescuento']; ?> </strong>
    </td>
    <td class="col-sm-1 col-md-1">
        <a href="#" onclick="quitaProducto('<?php echo $id;?>', 'ct-<?php echo $id;?>')">
            <button type="button" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span> Quitar </button>
        </a>
    </td>
</tr>   