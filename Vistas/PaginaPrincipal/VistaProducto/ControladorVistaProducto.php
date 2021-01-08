<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorVistaProducto
 *
 * @author mickey
 */
include('/opt/lampp/htdocs/ProyectoTecWeb/Controladores/Controlador.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/BaseDeDatos.php');

class ControladorVistaProducto extends Controlador 
{
    private $ruta;
    private $rutaValidacion;
    
    public function __construct()
    {
        parent::__construct();
        $this->ruta = 'Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/VistaProducto/VistaProducto.php';
        $this->rutaValidacion = 'Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/Productos/Productos.php';
    }
    
    private function publicaComentario($idM, $comentario)
    {
        $idUsuario = $this->usuario->idUsuario();
        $fecha = date('Y-m-d', time());
        $sqli = BaseDeDatos::instancia()->sqli();
        $statement = $sqli->prepare("INSERT INTO Comentario (IdMedicamento, IdUsuario, Comentario, FechaComentario) VALUES (?, ?, ?, ?)");        
        $statement->bind_param('iiss', $idM, $idUsuario, $comentario, $fecha);
        $statement->execute();
    }
    
    private function muestraComentarios($arreglo)
    {
        ?><div class="col-md-6 mt-5 ml-2"><h5> Comentarios: </h5><?php
        
        foreach ($arreglo as $renglon)
        {
            ?>
            <div class="mt-5 col-xs-2 col-md-1">
                <img src="http://localhost:8080/ProyectoTecWeb/Fotos/notKnown.jpeg" class="img-circle img-responsive" width="80" height="80"> 
            </div>
            <div class="mt-5 col-xs-10 col-md-11">
                <h4><strong> <?php echo $renglon['Alias']; ?>  </strong></h4>
                <div class="mic-info"> 
                    <?php echo $renglon['FechaComentario']; ?> 
                    <p class="h5"> <?php echo $renglon['Comentario']; ?></p>
                </div>
                <?php 
                if (isset($this->usuario) && ($this->usuario->rol() == 1 
                 || $this->usuario->idUsuario() == $renglon['IdUsuario']))
                {?>
                    <div class="action">
                        <a href="./borraComentario.php?id=<?php echo $renglon['IdComentario']; ?>">
                            <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                Borra este comentario
                            </button>
                        </a>
                    </div>
                    <?php
                }?>
            </div>
            <?php
        }
        ?></div><?php
    }
    
    
    
    private function muestraPanelEscribirComentario($renglon)
    {
        ?>
        <div class="col-md-6 mt-5 ml-2">
            <div class="widget-area no-padding blank">
                <div class="status-upload">
                    <form method="post" action="./VistaProducto.php?id=<?php echo $renglon['IdMedicamento']; ?>">
                        <input type="hidden" name="IdMedicamento" value="<?php echo $renglon['IdMedicamento']; ?>">
                        <div class="row align-items-start">
                            <textarea name="comentario" placeholder="Escribe un comentario al respecto" ></textarea>
                        </div>
                        <div class="row mt-3 align-items-start">
                            <button name="escbribeComentario" type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Escribir </button>
                        </div>
                    </form>   
                </div>
            </div>
        </div>
        <?php
    }
    
    private function muestraLayoutProducto($renglon)
    {   
        ?>
        <div class="col-sm-6 mb-4 mb-md-0">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($renglon['Foto']);?>"width="300" height="300"/>
        </div>
        <div class="ml-5 col-sm-6 mb-4 mb-md-0">
            <div class="row">
                <div class="ml-2 col-xs">
                    <h5> <?php echo $renglon['NombreSustancia']; ?> </h5>
                    <p class="mb-2 text-muted text-uppercase small"> Dosis de <?php echo $renglon['Dosis'].'mg'; ?> </p>
                    <p class="mb-2 text-muted text-uppercase small"> Laboratorio: <?php echo $renglon['NombreLaboratorio']; ?> </p>
                </div>
            </div>
            <div class="mt-3 row">
                <div class="ml-2 mt-2 col-xs">
                    <?php
                    if ($renglon['CostoOriginal'] != $renglon['CostoConDescuento'])
                        echo '<h4><del>$'.$renglon['CostoOriginal'].'</del></h4>'.'<h4 class="text-danger"><strong>$'.$renglon['CostoConDescuento'].'</strong></h4>';
                    else
                        echo '<h4><strong>$'.$renglon['CostoConDescuento'].'</strong></h4>';
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="mt-2 ml-2 col-xs">
                    <a href="./AgregaACarrito.php?id=<?php echo $renglon['IdMedicamento']; ?>">
                        <button type="button" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                            </svg>
                            Agregar al carrito
                        </button>
                    </a>
                </div>
            </div>
        </div>  
            
        <?php      
    }
    
    public function obtenProducto()
    {
        $consultas = array();
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        
        if (isset($consultas['id']))
        {
            $sqli = BaseDeDatos::instancia()->sqli();
            $resultado = $sqli->query("SELECT * FROM VistaBusquedas WHERE IdMedicamento=".$consultas['id']);
            $renglon = $resultado->fetch_assoc();
            $resultado = $sqli->query("SELECT * FROM VistaComentarios WHERE IdMedicamento=".$consultas['id']);
            $arreglo = !$resultado ? array() : $resultado->fetch_all(MYSQLI_ASSOC);

            $this->muestraLayoutProducto($renglon);
            $this->muestraComentarios($arreglo);

            if (isset($_SESSION['usuario']))
                $this->muestraPanelEscribirComentario($renglon);
            else 
                echo '<div class="col-md-6 mt-5 ml-2"><h6> Inicia sesión para escribir <br> un comentario. </h6></div>';
        
        }
    }
    
    public function agregaACarrito()
    {
        $consultas = array();
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        
        if (!isset($consultas['id']))
            header ($this->rutaValidacion);
        
        parent::validaCarrito();
        $carrito = $_SESSION['carrito'];
        
        if (!in_array($consultas['id'], $carrito))
            array_push($carrito, $consultas['id']);
        
        $_SESSION['carrito'] = $carrito;
        header($this->rutaValidacion);
    }
    
    
    public function validaPublicarComentario()
    {
        if (isset($_POST['IdMedicamento']) && isset($_POST['comentario']) && isset($_POST['escbribeComentario']))
        {
            $this->publicaComentario($_POST['IdMedicamento'], $_POST['comentario']);
            header($this->ruta.'?id='.$_POST['IdMedicamento']);
        }
    }
    
    public function borraComentario()
    {
        $consultas = array();
        $idProd = 0;
        parse_str($_SERVER['QUERY_STRING'], $consultas);
        
        if (isset($this->usuario))
        {
            $sqli = BaseDeDatos::instancia()->sqli();
            $statement = $sqli->prepare("SELECT IdMedicamento, IdUsuario FROM VistaComentarios WHERE IdComentario = ?");        
            $statement->bind_param('i', $consultas['id']);
            $statement->execute();
            $resultado = $statement->get_result();
            $renglon = $resultado->fetch_assoc();
            $statement->close();
            
            if ($this->usuario->idUsuario() == $renglon['IdUsuario'])
            {
                $statement2 = $sqli->prepare("DELETE FROM Comentario WHERE IdComentario = ?");        
                $statement2->bind_param('i', $consultas['id']);
                $statement2->execute();
            }
            
            $idProd = $renglon['IdMedicamento'];
        }
        
        header($this->ruta.'?id='.$idProd);
    }
}