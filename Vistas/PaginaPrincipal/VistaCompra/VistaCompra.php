<?php
    include('ControladorVistaCompra.php');
    $controlador = new ControladorVistaCompra();
    
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php include '/opt/lampp/htdocs/ProyectoTecWeb/Vistas/PaginaPrincipal/Metadatos/Metadatos.php'; ?>
    <body>
        <div class="container-fluid">
            <?php include '/opt/lampp/htdocs/ProyectoTecWeb/Vistas/PaginaPrincipal/Encabezado/Encabezado.php'; ?>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                <tr>
                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"> 
                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> Muchas gracias por tu compra!! </h2>
                    </td>
                </tr>
                <tr>
                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                        <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;"> Agradecemos tu preferencia. <br> Aquí están los detalles de tu compra: </p>
                    </td>
                </tr>
                <tr>
                    <td align="left" style="padding-top: 20px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Número de pepido </td>
                                <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> <?php echo $controlador->idCompra; ?> </td>
                            </tr>
                            <?php $controlador->muestraDetalleCompra(); ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" style="padding-top: 20px;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> 
                                    TOTAL 
                                </td>
                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> 
                                    <?php echo number_format($controlador->total, 2); ?> 
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" style="padding-top: 20px; padding-bottom: 50px">
                        <a href="../Productos/Productos.php">
                            <button type="button" class="btn btn-success"> <span class="glyphicon glyphicon-remove"></span> Regresar a la página principal </button>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
