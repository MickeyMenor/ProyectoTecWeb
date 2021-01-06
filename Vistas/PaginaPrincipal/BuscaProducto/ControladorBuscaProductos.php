<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorProductos
 *
 * @author mickey
 */
include('/opt/lampp/htdocs/ProyectoTecWeb/Controladores/Controlador.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/BaseDeDatos.php');

class ControladorBuscaProductos extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        
    }
    
    private function creaCadenaOpcion($arreglo, $atributo)
    {
        $funcion = function($valor) use ($atributo){ return $atributo.' = '."'".$valor."'"; };
        
        $arreglo2 = array_map($funcion, $arreglo);
        return '('.implode(' OR ', $arreglo2).')'; 
    }
    
    private function creaCadenaConsulta($cadenaBusqueda, $cadenaCategorias, $cadenaLaboratorios)
    {
        $consulta = "SELECT * FROM VistaBusquedas";
        
        if (isset($cadenaBusqueda) || isset($cadenaCategorias) || isset($cadenaLaboratorios))
            $consulta .= " WHERE ";
            
        if (isset($cadenaBusqueda))
        {
            $consulta .= '`NombreSustancia` LIKE \'%'.$cadenaBusqueda.'%\'';
                
            if (isset($cadenaCategorias) || isset($cadenaLaboratorios))
                $consulta .= ' AND ';
        }
        
        if (!isset($cadenaCategorias) && isset($cadenaLaboratorios))
            $consulta .= $cadenaLaboratorios;
        else if (isset($cadenaCategorias) && !isset($cadenaLaboratorios))
            $consulta .= $cadenaCategorias;
        else if (isset($cadenaCategorias) && isset($cadenaLaboratorios))
            $consulta .= $cadenaCategorias." AND ".$cadenaLaboratorios;
        
        return $consulta;
    }
    
    private function creaCheckbox($id, $nombre, $postNom)
    {
        ?>
        <div class="mt-2 form-check">
            <input class="form-check-input" name="<?php echo $postNom; ?>" type="checkbox" value="<?php echo $nombre; ?>" id="<?php echo $id; ?>">
            <label class="ml-1 form-check-label" for="<?php echo $id; ?>"> <?php echo $nombre; ?> </label>
        </div>
        <?php
    }
    
    private function creaTarjetaMedicamento($renglon)
    {
        ?>
        <div class="col-sm-5">
            <div class="ml-1 mt-5 card">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($renglon['Foto']);?>"width="100" height="100"/>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $renglon['NombreSustancia'];?></h5>
                    <h6 class="card-subtitle mt-2 mb-2"><?php echo $renglon['Dosis'].'mg';?></h6>
                    <h6 class="card-subtitle mt-2 mb-2"><?php echo $renglon['NombreLaboratorio'];?></h6>
                    <h6 class="card-subtitle mt-2 mb-2"> 
                        <?php
                        if ($renglon['CostoOriginal'] != $renglon['CostoConDescuento'])
                        {
                            echo '<p><del>$'.$renglon['CostoOriginal'].'</del></p>';
                            echo '<p class="text-danger"><strong>$'.$renglon['CostoConDescuento'].'</strong></p>';
                        }
                        else
                        {
                            echo '<p><strong>$'.$renglon['CostoConDescuento'].'</strong></p>';
                        }
                        ?>
                    </h6>
                    <a class="btn btn-primary" href="../VistaProducto/VistaProducto.php?id=<?php echo $renglon['IdMedicamento'];?>" role="button">
                        Ver más
                    </a>
                </div>
            </div>
        </div>
        <?php
    }
    
    private function buscaMedicamentos($consulta)
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        $resultado = $sqli->query($consulta);
        $arreglo = !$resultado ? array() : $resultado->fetch_all(MYSQLI_ASSOC);
        
        foreach ($arreglo as $renglon)
        {
            $this->creaTarjetaMedicamento($renglon);
        }
    }
    
    public function muestraMedicamentos()
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "SELECT * FROM InfoMedicamentos";
        $resultado = $sqli->query($consulta);
        $arreglo = !$resultado ? array() : $resultado->fetch_all(MYSQLI_ASSOC);
        $i = 0;
        
        foreach ($arreglo as $renglon)
        {
            $this->creaItemSlider($renglon, $i);
            $i++;
        }
    }
    
    public function muestraCheckboxCategoria()
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "SELECT * FROM Categoria";
        $resultado = $sqli->query($consulta);
        $arreglo = !$resultado ? array() : $resultado->fetch_all(MYSQLI_ASSOC);
        
        foreach ($arreglo as $renglon)
        {
            $id = 'categoria'.$renglon['IdCategoria'];
            $nombre = $renglon['Nombre'];
            $postNom = 'categoria[]';
            $this->creaCheckbox($id, $nombre, $postNom);
        }
    }
    
    public function muestraCheckboxLaboratorio()
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "SELECT * FROM Laboratorio";
        $resultado = $sqli->query($consulta);
        $arreglo = !$resultado ? array() : $resultado->fetch_all(MYSQLI_ASSOC);
        
        foreach ($arreglo as $renglon)
        {
            $id = 'laboratorio'.$renglon['IdLaboratorio'];
            $nombre = $renglon['Nombre'];
            $postNom = 'laboratorio[]';
            $this->creaCheckbox($id, $nombre, $postNom);
        }
    }
    
    public function validaBusqueda()
    {
        if (isset($_POST['boton']))
        {
            $cadenaBusqueda = null;
            $cadenaCategorias = null;
            $cadenaLaboratorios = null;
            
            if (isset($_POST['textoBuscar']) && strlen($_POST['textoBuscar']) > 0)
                $cadenaBusqueda = $_POST['textoBuscar'];
            
            if (!empty($_POST['categoria']))
                $cadenaCategorias = $this->creaCadenaOpcion($_POST['categoria'], 'NombreCategoria');
               
            if (!empty($_POST['laboratorio']))
                $cadenaLaboratorios = $this->creaCadenaOpcion($_POST['laboratorio'], '`NombreLaboratorio`');
            
            $consulta = $this->creaCadenaConsulta($cadenaBusqueda, $cadenaCategorias, $cadenaLaboratorios);
            $this->buscaMedicamentos($consulta);
        }
    }
}
