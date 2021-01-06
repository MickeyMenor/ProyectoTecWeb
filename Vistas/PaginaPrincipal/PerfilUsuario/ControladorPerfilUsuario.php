<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorPerfilUsuario
 *
 * @author mickey
 */
include('/opt/lampp/htdocs/ProyectoTecWeb/Controladores/Controlador.php');
include('/opt/lampp/htdocs/ProyectoTecWeb/Clases/BaseDeDatos.php');

class ControladorPerfilUsuario extends Controlador 
{

    public function __construct() 
    {
        parent::__construct();
    }

    private function actualizaPerfil() 
    {
        $sqli = BaseDeDatos::instancia()->sqli();
        $statement = $sqli->prepare
                (
                'UPDATE Usuario SET Nombre=?, Alias=?, Contrasenia=?,'
                . ' Email=? '
                . 'WHERE IdUsuario=?'
        );

        $statement->bind_param
                (
                'ssssi', $_POST['textoNombre'], $_POST['textoAlias'],
                $_POST['textoPwd'], $_POST['textoCorreo'], $this->usuario->idUsuario()
        );

        if ($statement->execute()) {
            $this->usuario->cambiaNombre($_POST['textoNombre']);
            $this->usuario->cambiaAlias($_POST['textoAlias']);
            $this->usuario->cambiaCorreo($_POST['textoCorreo']);
            $this->usuario->cambiaContraseña($_POST['textoPwd']);
            $_SESSION['usuario'] = serialize($this->usuario->aArreglo());
        }
    }

    public function creaTarjetaPerfilUsuario()
    {
        $usuario = $this->usuario;
        ?>
        <div class="ml-2 row align-items-center">
            <div class="mt-3 col-xs">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h4 class="card-title"> Mi Perfil </h4>
                        <h5 class="mt-4 card-title"> Nombre: </h5>
                        <h6 class="card-subtitle mb-2"> <?php echo $usuario->nombre(); ?> </h6>
                        <h5 class="mt-4 card-title"> Alias: </h5>
                        <h6 class="card-subtitle mb-2"> <?php echo $usuario->alias(); ?> </h6>
                        <h5 class="mt-4 card-title"> Correo: </h5>
                        <h6 class="card-subtitle mb-2"> <?php echo $usuario->correo(); ?> </h6>
                        <a class="mt-4 btn btn-primary" href="./FormaActualizarPerfil.php" role="button"> Modifica Perfil </a>
                    </div>
                </div>
            </div>        
        </div>
        <?php
    }

    public function validaActualizarPerfil()
    {
        if (isset($_POST['textoNombre']) && isset($_POST['textoCorreo']) && isset($_POST['textoPwdOld']) && isset($_POST['textoPwd']) && isset($_POST['textoAlias'])) 
        {
            $this->actualizaPerfil();
            header("Location: /ProyectoTecWeb/Vistas/PaginaPrincipal/PaginaPrincipal.php");
        }
    }
}
