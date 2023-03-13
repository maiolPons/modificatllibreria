<?php
require_once 'config/database.php';

class Cliente extends Database{
    //atributos
    private $id;
    private $email;
    private $nombre;
    private $apellido;
    private $direccion;
    private $dni;
    private $contrasenya;
    //gets y sets
    //id client
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    //email Client
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    //nombre cliente
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    //Apellido cliente
    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    //direccion cliente
    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    //dni cliente
    public function getDni(){
        return $this->dni;
    }

    public function setDni($dni){
        $this->dni = $dni;
    }
    //nom d'usuari
    public function getContrasenya(){
        return $this->contrasenya;
    }

    public function setContrasenya($contrasenya){
        $this->contrasenya = $contrasenya;
    }
    //metodos
    public function mostrarCliente(){
        $sql = "SELECT * FROM clientes WHERE id='".$this->getId()."'";
        $rows = $this->db->query($sql);
        return($rows);
    }

    public function existeCliente($email, $passwd){
        $sql = "SELECT * FROM clientes WHERE email = '$email' and passwd=md5('$passwd')";
        $ejecutar = $this->db->query($sql);
        $filas = $ejecutar->rowCount();

        if ($filas>0){
            $existeCliente = true;
        }
        else{
            $existeCliente = false;
        }
        return $existeCliente;
    }

    //Añadir cliente
    public function anyadirCliente(){
        $sql = "INSERT INTO clientes (email,nombre,apellido,direccion,dni,passwd) VALUES ('".$this->email."','".$this->nombre."','".$this->apellido."','".$this->direccion."','".$this->dni."',md5('".$this->contrasenya."'))";
        $ejecutar = $this->db->query($sql);

        if($ejecutar){
            return true;
        }
        else{
            return false;
        }
    }   

    //Mostrar todos los datos cliente
    public function mostrarDatos(){
        $sql = "SELECT * FROM clientes WHERE email = '".$this->email."'";
        $rows = $this->db->query($sql);
        return $rows;
    }

    //Comprobar repeticiones
    public function comprobarDuplicados(){
        $sql = "SELECT * FROM clientes WHERE email = '".$this->email."' OR dni='".$this->dni."' ";
        $ejecutar = $this->db->query($sql);
        $filas = $ejecutar->rowCount();

        if ($filas>0){
            $duplicado = true;
        }
        else{
            $duplicado = false;
        }
        return $duplicado;
    }

    //Update Usuarios 
    public function modificarUsuario(){
        $sql="UPDATE clientes SET nombre='".$this->getNombre()."',apellido='".$this->getApellido()."',direccion='".$this->getDireccion()."' WHERE email='".$this->getEmail()."'";

        $rows = $this->db->query($sql);
    }

    //Actualizar contrasenya modificar perfil
    public function actualizarContrasenya(){
        $sql="UPDATE clientes SET nombre='".$this->getNombre()."',apellido='".$this->getApellido()."',direccion='".$this->getdireccion()."',passwd=md5('".$this->getContrasenya()."') WHERE email='".$this->getEmail()."'";
        $rows = $this->db->query($sql);
    }

    public function salir(){
        session_destroy();
    }
}