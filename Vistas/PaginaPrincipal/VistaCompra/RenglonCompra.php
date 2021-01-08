<tr style="border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
    <td>
        <tr>
            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> 
                <img src="data:image/jpeg;base64,<?php echo base64_encode($renglon['Foto']);?>"width="100" height="100"/>  
            </td>
        </tr>
        <tr>
            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> 
                Cantidad Comprada:
            </td>
            <td> 
                <?php echo $renglon['Cantidad']; ?>
            </td>
        </tr>
        <tr>
            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> 
                Total:
            </td>
            <td> 
                <?php echo number_format($renglon['Costo'] * $renglon['Cantidad'], 2); ?>
            </td>
        </tr>
    </td>
</tr>