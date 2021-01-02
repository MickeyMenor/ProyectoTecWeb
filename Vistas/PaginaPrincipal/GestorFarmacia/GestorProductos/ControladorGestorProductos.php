<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorGestorProductos
 *
 * @author mickey
 */
include('/opt/lampp/htdocs/ProyectoTecWeb/Controladores/ControladorGestorFarmacia.php');

class ControladorGestorProductos extends ControladorGestorFarmacia
{
    private $ruta;
    
    public function __construct()
    {
        parent::__construct();
        $this->ruta = "Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/GestorFarmacia/GestorProductos/GestorProductos.php";
    }
    
    private function creaTabla($arreglo, $nombres)
    {
        $cadena = '<div class="table-responsive"><table class="table align-middle"><thead><tr>';
        
        foreach ($nombres as $clave => $valor)
            $cadena .= '<th scope="col">'.$clave.'</th>';
        
        $cadena .= '<th scope="col"> Info. </th></tr></thead><tbody>';
        
        foreach($arreglo as $renglon)
        {
            $cadena .= '<tr>';
            
            foreach ($nombres as $clave => $valor)
                $cadena .= '<td class="align-middle" scope="row">'
                .($valor === 'Foto' 
                ? '<img src="data:image/jpg;base64,'.base64_encode($renglon[$valor]).'" width="180" height="180"/>' 
                : $renglon[$valor]).'</td>';
            
            $cadena .= '<td class="align-middle" scope="row">';
            $cadena .= '<a class="btn btn-primary" href="./VerProducto/VerProducto.php';
            $cadena .= '?id='.$renglon['IdMedicamento'].'" role="button"> Ver Producto </a></td></tr>';
        }
        
        $cadena .= '</tbody></table></div>';
        return $cadena;
    }
    
    private function creaTarjetaMedicamento(Medicamento $medicamento)
    {
        $tarjeta = '<div class="col-xs"><div class="ml-5 mt-5 card">';
        $tarjeta .= '<img src="data:image/jpeg;base64,';
        $tarjeta .= base64_encode($medicamento->foto).'" width="180" height="180"/>';
        $tarjeta .= '<div class="card-body"><h5 class="card-title">'.$medicamento->sustancia->nombre.'</h5>';
        $tarjeta .= '<h6 class="card-subtitle mt-2 mb-2">'.$medicamento->dosis.'mg'.'</h6>';
        $tarjeta .= '<h6 class="card-subtitle mt-2 mb-2"> Caja con '.$medicamento->cantidad;
        $tarjeta .= ' '.$medicamento->formaPresentacion.'</h6>';
        $tarjeta .= '<h6 class="card-subtitle mt-2 mb-2"> Precio: $'.$medicamento->costo.'</h6>';
        $tarjeta .= '<h6 class="card-subtitle mt-2 mb-2"> Stock: '.$medicamento->stock.'</h6>';
        $tarjeta .= '<a class="btn btn-primary" href="./ModificarProducto/ModificarProducto.php';
        $tarjeta .= '?id='.$medicamento->idMedicamento.'" role="button"> Modificar </a></td>';
        $tarjeta .= '<a class="ml-2 btn btn-primary" href="./borrarArchivo.php';
        $tarjeta .= '?id='.$medicamento->idMedicamento.'" role="button" onClick="return verificaEliminacion();"> Eliminar </a></td>';
        $tarjeta .= '</div></div></div>';
        
        return $tarjeta;
    }
    
    private function agregaSustancia($sqli, $nombre)
    {    
        $sqli->query("INSERT INTO Sustancia(Nombre) VALUES ('".$nombre."')");
        return $sqli->insert_id;
    }
    
    private function agregaLaboratorio($sqli, $nombre)
    {    
        $sqli->query("INSERT INTO Laboratorio(Nombre) VALUES ('".$nombre."')");
        return $sqli->insert_id;
    }
    
    private function agregaMedicamento($sqli, Medicamento $medicamento)
    {
        $parametro = null;
        
        $statement = $sqli->prepare("INSERT INTO Medicamento (IdSustancia, IdLaboratorio, Costo, "
            ."Forma, Dosis_mg, Cantidad, Foto, Stock) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        $statement->bind_param
        (
            'iidsiibi', $medicamento->sustancia->idSustancia, 
            $medicamento->laboratorio->idLaboratorio, $medicamento->costo,
            $medicamento->formaPresentacion, $medicamento->dosis,
            $medicamento->cantidad, $parametro, $medicamento->stock
        );
        
        $statement->send_long_data(6, $medicamento->foto);
        $statement->execute();
        $medicamento->idMedicamento = $sqli->insert_id;
    }
    
    private function actualizaMedicamento($sqli, Medicamento $medicamento)
    {
        $medicamento->idMedicamento = $_POST['IdMedicamento'];
        $parametro = null;
        $statement = $sqli->prepare
        (
            "UPDATE Medicamento SET IdSustancia=?,IdLaboratorio=?,"
            ."Costo=?,Forma=?,Dosis_mg=?,Cantidad=?,Foto=?,"
            ."Stock=? WHERE IdMedicamento=?"
        );
        
        $statement->bind_param
        (
            'iidsiibii',  
            $medicamento->sustancia->idSustancia, $medicamento->laboratorio->idLaboratorio,
            $medicamento->costo, $medicamento->formaPresentacion, $medicamento->dosis,
            $medicamento->cantidad, $parametro, $medicamento->stock,
            $medicamento->idMedicamento
        );
        
        $statement->send_long_data(6, $medicamento->foto);
        $statement->execute();
    }
    
    public function nuevoMedicamento()
    {
        if (isset($_POST['textoSustancia']) && isset($_POST['textoLaboratorio'])
         && isset($_POST['textoPresentacion']) && isset($_POST['textoDosis'])
         && isset($_POST['textoCantidad']) && isset($_POST['textoCosto'])
         && isset($_POST['textoStock']) && !empty($_FILES['fotoProducto']['name']))
        {
            $sqli = BaseDeDatos::instancia()->sqli();
            $idSustancia = $_POST['IdSustancia'] === "s-1" 
            ? $this->agregaSustancia($sqli, $_POST['textoSustancia']) 
            : str_replace('s', '', $_POST['IdSustancia']);
        
            $idLaboratorio = $_POST['IdLaboratorio'] === 'l-1' 
            ? $this->agregaLaboratorio($sqli, $_POST['textoLaboratorio']) 
            : str_replace('l', '', $_POST['IdLaboratorio']);
            
            $medicamento = new Medicamento
            (
                -1, 
                new Sustancia($idSustancia, $_POST['textoSustancia']),
                new Laboratorio($idLaboratorio, $_POST['textoLaboratorio']),
                $_POST['textoPresentacion'], $_POST['textoDosis'], 
                $_POST['textoCantidad'],  file_get_contents($_FILES["fotoProducto"]['tmp_name']),
                $_POST['textoCosto'], $_POST['textoStock']
            );
            
            $this->agregaMedicamento($sqli, $medicamento);
            header($this->ruta);
        }
    }
    
    public function borraMedicamento()
    {
        $consultas = array();
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        
        $sqli = BaseDeDatos::instancia()->sqli();
        $statement = $sqli->prepare("DELETE FROM Medicamento WHERE IdMedicamento = ?");
        $statement->bind_param('i', $consultas['id']);
        $statement->execute();
            
        header($this->ruta);
    }
    
    public function modificaMedicamento()
    {
        if (isset($_POST['textoSustancia']) && isset($_POST['textoLaboratorio'])
         && isset($_POST['textoPresentacion']) && isset($_POST['textoDosis'])
         && isset($_POST['textoCantidad']) && isset($_POST['textoCosto'])
         && isset($_POST['textoStock']) && !empty($_FILES['fotoProducto']['name']))
        {
            $sqli = BaseDeDatos::instancia()->sqli();
            $idSustancia = $_POST['IdSustancia'] === "s-1" 
            ? $this->agregaSustancia($sqli, $_POST['textoSustancia']) 
            : str_replace('s', '', $_POST['IdSustancia']);
        
            $idLaboratorio = $_POST['IdLaboratorio'] === 'l-1' 
            ? $this->agregaLaboratorio($sqli, $_POST['textoLaboratorio']) 
            : str_replace('l', '', $_POST['IdLaboratorio']);
            
            $medicamento = new Medicamento
            (
                -1, 
                new Sustancia($idSustancia, $_POST['textoSustancia']),
                new Laboratorio($idLaboratorio, $_POST['textoLaboratorio']),
                $_POST['textoPresentacion'], $_POST['textoDosis'], 
                $_POST['textoCantidad'],  file_get_contents($_FILES["fotoProducto"]['tmp_name']),
                $_POST['textoCosto'], $_POST['textoStock']
            );
            
            $this->actualizaMedicamento($sqli, $medicamento);
            header($this->ruta);
        }
    }
    
    public function muestraTarjetaMedicamento()
    {
        $consultas = array();
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        
        $sqli = BaseDeDatos::instancia()->sqli();
        $resultado = $sqli->query("SELECT * FROM InfoMedicamentos WHERE IdMedicamento = '".$consultas['id']."'");
        $renglon = $resultado->fetch_assoc();
        
        $medicamento = new Medicamento
        (
            $renglon['IdMedicamento'],
            new Sustancia($renglon['IdSustancia'], $renglon['NombreSustancia']),
            new Laboratorio($renglon['IdLaboratorio'], $renglon['NombreLaboratorio']),
            $renglon['Forma'],
            $renglon['Dosis_mg'],
            $renglon['Cantidad'],
            $renglon['Foto'],
            $renglon['Costo'],
            $renglon['Stock']
        );
        
        echo $this->creaTarjetaMedicamento($medicamento);
    }
    
    public function muestraMedicamentos()
    {
        $nombres = array
        (
            'Sustancia' => 'NombreSustancia',  'Presentación' => 'Forma',
            'Dosis' => 'Dosis_mg', 'Cantidad' => 'Cantidad', 
            'Costo' => 'Costo', 'Stock' => 'Stock', 'Foto' => 'Foto'
        );
        
        $sqli = BaseDeDatos::instancia()->sqli();
        $consulta = "SELECT * FROM InfoMedicamentos";
        $arreglo = $sqli->query($consulta)->fetch_all(MYSQLI_ASSOC);
        echo $this->creaTabla($arreglo, $nombres);
    }
    
    public function muestraSustancias()
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        
        $consulta = "SELECT * FROM Sustancia";
        $resultado = $sqli->query($consulta);
        $arreglo = $resultado->fetch_all(MYSQLI_ASSOC);
        
        foreach ($arreglo as $renglon)
        {
            echo '<option id="s'.$renglon['IdSustancia'].'">';
            echo $renglon['Nombre'].'</option>';
        }
    }
    
    public function muestraLaboratorios()
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        
        $consulta = "SELECT * FROM Laboratorio";
        $resultado = $sqli->query($consulta);
        $arreglo = $resultado->fetch_all(MYSQLI_ASSOC);
        
        foreach ($arreglo as $renglon)
        {
            echo '<option id="l'.$renglon['IdLaboratorio'].'">';
            echo $renglon['Nombre'].'</option>';
        }
    }
    
    public function agregaIdMedicamento()
    {
        $consultas = array();
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        
        if (isset($consultas['id']))
            echo '<input type="hidden" name="IdMedicamento" id="IdMedicamento" value="'.$consultas['id'].'">';
        else
            header($this->ruta);
    }
}