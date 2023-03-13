<?php
require_once "models/cliente.php";
class ClienteController{
    //Si los datos son correctos , muestra el menu del administrador
    public function logearCliente(){
        if($_POST){
            $cliente = new Cliente();
            $email = $_POST['email'];
            $passwd = $_POST['passwd'];
            //Si existe el usuario 
            if($cliente->existeCliente($email,$passwd)==true){
                //Crear variables de sessión 
                $_SESSION['cliente'] = $_POST['email'];//Nombre de usuario del admin
                ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php"> <!-- cuando entra el cliente , le redirige otra vez a la pagina principal -->
                <?php

            }
            
            else{
                usuarioNoValido();
                ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=index.php?controller=cliente&action=logearCliente">
                <?php
            }
        }
        else{
            require_once "views/cliente/login/formCliente.php";
        }
    }

    //Crear Cuenta
    public function crearCliente(){
        require_once "views/cliente/login/altaCliente.php";
        if (isset($_POST['enviar'])){
            $cliente= new Cliente();
            $cliente->setEmail($_POST['email']);
            $cliente->setNombre($_POST['nombre']);
            $cliente->setApellido($_POST['apellidos']);
            $cliente->setDireccion($_POST['direccion']);
            $cliente->setDni($_POST['dni']);
            $cliente->setContrasenya($_POST['passwd']);
            if($cliente->comprobarDuplicados()){
                duplicados();
                ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=index.php?controller=cliente&action=crearCliente">
                <?php
            }
            else{
                if ($cliente->anyadirCliente()==true){
                    usuarioCreado();
                    ?>
                    <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=index.php?controller=cliente&action=logearCliente">
                    <?php
                }
                else{
                    usuarioNocreado();
                    ?>
                    <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=index.php?controller=cliente&action=crearCliente">
                    <?php 
                }
            }
        }

    }

    //Mostrar datos del usuario
    public function miPerfil(){
        if(isset($_SESSION['cliente'])){
            $email = $_SESSION['cliente'];
            $cliente= new Cliente();
            $cliente->setEmail($email);
            $rows = $cliente->mostrarDatos();
            require_once "views/cliente/perfil/miPerfil.php";

        }
        else{
            logCliente();
        }
    }

    //Modificar perfil
    public function modificarPerfil(){
        if(isset($_SESSION['cliente'])){
            $email = $_SESSION['cliente'];
            $cliente= new Cliente();
            $cliente->setEmail($email);
            $rows = $cliente->mostrarDatos();
            require_once "views/cliente/perfil/modificar.php";
        }
    }

    public function modificarPerfilI(){
        if(isset($_SESSION['cliente'])){
            $cliente= new Cliente();
            $email = $_SESSION['cliente'];
            $cliente->setEmail($email);
            $cliente->setNombre($_POST['nombre']);
            $cliente->setApellido($_POST['apellidos']);
            $cliente->setDireccion($_POST['direccion']);
            if ($_POST['contrasenya']!=""){
                $cliente->setContrasenya($_POST['contrasenya']);
                $cliente->actualizarContrasenya();
                datosActualizados();
                ?>
                    <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=index.php?controller=cliente&action=miPerfil">
                <?php
            }
            else{
                $cliente->modificarUsuario();
                datosActualizados();
                 ?>
                   <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=index.php?controller=cliente&action=miPerfil"> 
                 <?php
            }
        }
    }
    
    //Cerrar sesion
    public function salir(){
        $salir = new Cliente;
        $salir->salir();
        header("Location: index.php?controller=cliente&action=logearCliente");

    }
}
?>