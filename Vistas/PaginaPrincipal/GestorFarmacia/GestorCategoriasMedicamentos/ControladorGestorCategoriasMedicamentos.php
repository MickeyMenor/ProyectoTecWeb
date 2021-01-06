<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorGestorCategorias
 *
 * @author mickey
 */
include('/opt/lampp/htdocs/ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/ControladorGestorFarmacia.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/Categoria.php');

class ControladorGestorCategoriasMedicamentos extends ControladorGestorFarmacia
{
    private $ruta;
    
    public function __construct()
    {
        parent::__construct();
        $this->ruta = 'Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/GestorCategoriasMedicamentos/GestorCategoriasMedicamentos.php';
    }
    
    private function agregaDetalle()
    {
        $sqli = BaseDeDatos::instancia()->sqli();
            
        $statement = $sqli->prepare("INSERT INTO DetalleCategoria (IdCategoria, IdMedicamento) VALUES (?, ?)");        
        $statement->bind_param
        (
            'ii', $_POST['IdCategoria'],
            $_POST['IdMedicamento']    
        );

        $statement->execute();
    }
    
    
    protected function creaBoton($renglon) 
    {
        ?> 
        <td class="align-middle" scope="row"> 
            <a class="btn btn-primary" href="./QuitarDeCategoria/EliminarProducto.php?id=<?php echo $renglon['IdDetalle'] ?>" role="button"> 
                Borrar
            </a>
        </td> 
        <?php  
    }
    
    public function muestraCategorias()
    {
        $nombres = array
        (
            'Nombre Categoria' => 'Nombre Categoria',  'Nombre Sustancia' => 'Nombre Sustancia',
            'Nombre Laboratorio' => 'Nombre Laboratorio', 'Dosis' => 'Dosis', 
            'Foto' => 'Foto'
        );
        
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "SELECT * FROM VistaDetalleCategorias";
        $resultado = $sqli->query($consulta);
        $arreglo = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : array();
        
        parent::creaTabla($arreglo, $nombres);
    }
    
    public function muestraOpcionesCategorias()
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "SELECT * FROM Categoria";
        $resultado = $sqli->query($consulta);
        $arreglo = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : array();
        
        foreach ($arreglo as $renglon)
        {
            ?> 
            <option id="c<?php echo $renglon['IdCategoria']?>">
                <?php echo $renglon['Nombre']; ?> 
            </option>
            <?php 
        }
    }
    
    public function muestraOpcionesMedicamentos()
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "SELECT * FROM InfoMedicamentos";
        $resultado = $sqli->query($consulta);
        $arreglo = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : array();
        
        foreach ($arreglo as $renglon)
        {
            ?> 
            <option id="m<?php echo $renglon['IdMedicamento']?>">
                <?php echo $renglon['IdMedicamento'].' - '.$renglon['NombreSustancia'].' '.$renglon['Dosis_mg'].'mg'; ?> 
            </option>
            <?php 
        }
    }
    
    public function nuevoDetalle()
    {
        if (isset($_POST['IdCategoria']) && isset($_POST['IdMedicamento']))
        {
            $this->agregaDetalle();
            header($this->ruta);
        }
    }
    
    public function borraDetalle()
    {
        $consultas = array();
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        
        $sqli = BaseDeDatos::instancia()->sqli();
        $statement = $sqli->prepare("DELETE FROM DetalleCategoria WHERE IdDetalle = ?");
        $statement->bind_param('i', $consultas['id']);
        $statement->execute();
            
        header($this->ruta);
    }
}