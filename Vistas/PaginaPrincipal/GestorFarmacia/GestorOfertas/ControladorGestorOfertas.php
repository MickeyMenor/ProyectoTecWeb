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

class ControladorGestorOfertas extends ControladorGestorFarmacia
{
    private $ruta;
    
    public function __construct()
    {
        parent::__construct();
        $this->ruta = 'Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/GestorOfertas/GestorOfertas.php';
    }
    
    private function agregaOferta($idMedicamento, $porcentaje)
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "INSERT INTO Promocion(IdMedicamento, Porcentaje) VALUES (?, ?)";
        
        $statement = $sqli->prepare($consulta);
        $statement->bind_param('id', $idMedicamento, $porcentaje);
        $statement->execute();
    }
    
    private function actualizaOferta($idOferta, $idMedicamento, $porcentaje)
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "UPDATE Promocion SET IdMedicamento=?, Porcentaje=? WHERE IdPromocion=?";
        
        $statement = $sqli->prepare($consulta);
        $statement->bind_param('idi', $idMedicamento, $porcentaje, $idOferta);
        $statement->execute();
    }
    
    private function creaTarjetaOferta($renglon)
    {
        $tarjeta = '<div class="col-xs"><div class="ml-5 mt-5 card">';
        $tarjeta .= '<img src="data:image/jpeg;base64,';
        $tarjeta .= base64_encode($renglon['Foto']).'" width="180" height="180"/>';
        $tarjeta .= '<div class="card-body"><h5 class="card-title"> Costo Original: </h5>';
        $tarjeta .= '<h6 class="card-subtitle mt-2 mb-2">'.$renglon['CostoOriginal'].'</h6>';
        $tarjeta .= '<h5 class="mt-4 card-title"> Descuento: </h5>';
        $tarjeta .= '<h6 class="card-subtitle mt-2 mb-2">'.$renglon['Porcentaje'].'%</h6>';
        $tarjeta .= '<h5 class="mt-4 card-title"> Costo con descuento: </h5>';
        $tarjeta .= '<h6 class="card-subtitle mt-2 mb-2">'.$renglon['Costo'].'</h6>';
        $tarjeta .= '<a class="btn btn-primary" href="./ModificaOferta/ModificaOferta.php';
        $tarjeta .= '?id='.$renglon['IdPromocion'].'" role="button"> Modificar </a></td>';
        $tarjeta .= '<a class="ml-2 btn btn-primary" href="./borraOferta.php';
        $tarjeta .= '?id='.$renglon['IdPromocion'].'" role="button" onClick="return verificaEliminacion();"> Eliminar </a></td>';
        $tarjeta .= '</div></div></div>';
        
        return $tarjeta;
    }
    
    protected function creaBoton($renglon) 
    {
        ?> 
        <td class="align-middle" scope="row"> 
            <a class="btn btn-primary" href="./VerOferta/VerOferta.php?id=<?php echo $renglon['IdPromocion'] ?>" role="button"> 
                Ver Oferta
            </a>
        </td> 
        <?php   
    }
    
    public function muestraOfertas()
    {
        $nombres = array
        (
            'Foto del medicamento' => 'Foto',  'Costo Original' => 'CostoOriginal', 
            'Porcentaje de Descuento' => 'Porcentaje', 'Costo Final' => 'Costo'
        );
        
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "SELECT * FROM VistaPromociones";
        $resultado = $sqli->query($consulta);
        $arreglo = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : array();
        
        echo parent::creaTabla($arreglo, $nombres);
    }
    
    public function muestraTarjetaOferta()
    {
        $consultas = array();
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        
        $sqli = BaseDeDatos::instancia()->sqli();
        $resultado = $sqli->query("SELECT * FROM VistaPromociones WHERE IdPromocion = '".$consultas['id']."'");
        $renglon = $resultado->fetch_assoc();
        
        echo $this->creaTarjetaOferta($renglon);
    }
    
    public function muestraMedicamentos()
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "SELECT IdMedicamento, NombreSustancia, NombreLaboratorio, "
                ."Forma, Dosis_mg FROM InfoMedicamentos";
        
        $resultado = $sqli->query($consulta);
        $arreglo = !$resultado ? array() : $resultado->fetch_all(MYSQLI_ASSOC);
        
        foreach ($arreglo as $renglon)
        {
            echo '<option id="'.$renglon['IdMedicamento'].'">';
            echo $renglon['IdMedicamento'].' - '.$renglon['NombreSustancia'].' ';
            echo $renglon['Dosis_mg'].'mg </option>';
        }
    }
    
    public function nuevaOferta()
    {
        if (isset($_POST['porcentajeDescuento']) && isset($_POST['IdMedicamento']))
        {
            $this->agregaOferta($_POST['IdMedicamento'], $_POST['porcentajeDescuento']);
            header($this->ruta);
        }
    }
    
    public function modificaOferta()
    {
        if (isset($_POST['porcentajeDescuento']) && isset($_POST['IdMedicamento']))
        {
            $this->actualizaOferta($_POST['IdOferta'], $_POST['IdMedicamento'], $_POST['porcentajeDescuento']);
            header($this->ruta);
        }
    }
    
    public function agregaIdOferta()
    {
        $consultas = array();
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        
        if (isset($consultas['id']))
            echo '<input type="hidden" name="IdOferta" id="IdOferta" value="'.$consultas['id'].'">';
        else
            header($this->ruta);
    }
}