<?php
require_once 'config/database.php';

class Categoria extends Database{
    //atributos
    private $id;
    private $nombre;
    private $activo;

    //gets y sets
    //id categoria
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    //nombre categoria
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    //activo 
    public function getActivo(){
        return $this->activo;
    }

    public function setActivo($activo){
        $this->activo = $activo;
    }

    //metodos
    public function mostrar(){
        $sql = "SELECT * FROM categorias";
        $rows = $this->db->query($sql);
        return $rows;
    }

    public function mostrarDatosCategorias(){
        $sql = "SELECT * FROM categorias WHERE activo=1";
        $rows = $this->db->query($sql);
        return $rows;
    }

    public function anyadirCategoria(){
        $sql1="SELECT * FROM categorias WHERE nombre='$this->nombre'";
        $comprobar= $this->db->query($sql1);
        $filas = $comprobar->rowCount();
        if ($filas>0){
            $rows= false;
        }
        else{
            $consult="INSERT INTO categorias (nombre) VALUES ('".$this->nombre."')";
            $rows = $this->db->query($consult);
        }
        return $rows;
    }

    public function estadoCategoria(){
        $query="UPDATE categorias SET activo='$this->activo' WHERE id='$this->id'";
        $rows = $this->db->query($query);
        return $rows;
    }

    public function Buscador(){
        $query="SELECT * FROM categorias WHERE nombre LIKE '%$this->nombre%'";
        $rows = $this->db->query($query);
        return $rows;
    }
    
    public function editarCategoria(){
        $sql1="SELECT * FROM categorias WHERE nombre='$this->nombre'";
        $comprobar= $this->db->query($sql1);

        $filas = $comprobar->rowCount();
        if ($filas>0){
            $rows= false;
        }
        else{
            $query="UPDATE categorias SET nombre='$this->nombre' WHERE id='$this->id'";
            $rows = $this->db->query($query);
        }
        return $rows;
    }
  
}