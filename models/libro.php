<?php
require_once 'config/database.php';

class Libro extends Database{
    //atributos
    private $isbn;
    private $titulo;
    private $autor;
    private $editorial;
    private $descripcion;
    private $foto;
    private $stock;
    private $precioUni;
    private $categoria;
    private $destacado;
    private $novedades;
    private $estadoL;
    private $favorito;
    //gets y sets
    //isbn libro
    public function getIsbn(){
        return $this->isbn;
    }

    public function setIsbn($isbn){
        $this->isbn = $isbn;
    }
    //titulo libro
    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    //autor libro
    public function getAutor(){
        return $this->autor;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }
    //editorial libro
    public function getEditorial(){
        return $this->editorial;
    }

    public function setEditorial($editorial){
        $this->editorial = $editorial;
    }
    //descripcion libro
    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    //foto libro
    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($foto){
        $this->foto = $foto;
    }
    //stock libro
    public function getStock(){
        return $this->stock;
    }

    public function setStock($stock){
        $this->stock = $stock;
    }
    //libro precio por unidad 
    public function getPrecioUni(){
        return $this->precioUni;
    }

    public function setPrecioUni($precioUni){
        $this->precioUni = $precioUni;
    }
    //libro categoria
    public function getCategoria(){
        return $this->categoria;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }
    //libro destacado
    public function getDestacado(){
        return $this->destacado;
    }

    public function setDestacado($destacado){
        $this->destacado = $destacado;
    }
    //novedades libro
    public function getNovedades(){
        return $this->novedades;
    }

    public function setNovedades($novedades){
        $this->novedades = $novedades;
    }
    //estado libro
    public function getEstadoL(){
        return $this->estadoL;
    }

    public function setEstadoL($estadoL){
        $this->esatdoL = $estadoL;
    }
    //Favorito
    public function getFavotito(){
        return $this->favorito;
    }
    public function setFavorito($favorito){
        $this->favorito = $favorito;
    }

//metodos
    public function mostrarLibros(){
        $sql = "SELECT * FROM libros";
        $rows = $this->db->query($sql);
        return $rows;
    }

    public function mostrarLibrosActivos(){
        $sql = "SELECT * FROM libros WHERE estadoL=1";
        $rows = $this->db->query($sql);
        return $rows;
    }

    public function mostrarBuscador($buscador){
        $query= "%".$buscador."%";
        $sql = "SELECT * FROM libros INNER JOIN categorias ON id = idCategoria WHERE ISBN LIKE '$query' OR titulo LIKE '$query' OR autor LIKE '$query' OR editorial LIKE '$query' OR descripcion LIKE '$query' OR stock LIKE '$query' OR novedades LIKE '$query' OR idCategoria LIKE '$query' OR nombre LIKE '$query'";
        $rows = $this->db->query($sql);
        return $rows;
    }

    public function infoLibro(){
        $sql = "SELECT * FROM libros AS l INNER JOIN categorias AS c ON idCategoria = id WHERE ISBN = '".$this ->getIsbn()."'";
        $rows = $this->db->query($sql);
        return $rows;
    }
    public function insertar(){
        $sql = "INSERT INTO libros(ISBN,titulo,autor,editorial,descripcion,foto,stock,precioUni,idCategoria,destacado,novedades) VALUES ('".$this->getIsbn()."','".$this->getTitulo()."','".$this->getAutor()."','".$this->getEditorial()."','".$this->getDescripcion()."','".$this->getFoto()."','".$this->getStock()."','".$this->getPrecioUni()."','".$this->getCategoria()."','".$this->getDestacado()."','".$this->getNovedades()."')";
        $rows = $this->db->query($sql);
    }

    public function modificar(){
        $sql = "UPDATE libros SET titulo='".$this->getTitulo()."',autor='".$this->getAutor()."',editorial='".$this->getEditorial()."',descripcion='".$this->getDescripcion()."',stock='".$this->getStock()."',precioUni='".$this->getPrecioUni()."',idCategoria='".$this->getCategoria()."',destacado='".$this->getDestacado()."' WHERE ISBN='".$this->getIsbn()."'";
        $rows = $this->db->query($sql);
    }

    public function modificarFoto(){
        $sql = "UPDATE libros SET foto='".$this->getFoto()."' WHERE ISBN='".$this->getIsbn()."'";
        $rows = $this->db->query($sql);
    }

    public function activarLibro(){
        $sql = "UPDATE libros SET estadoL=1 WHERE ISBN='".$this->getIsbn()."'";
        $rows = $this->db->query($sql);
    }

    public function desactivarLibro(){
        $sql = "UPDATE libros SET estadoL=0 WHERE ISBN='".$this->getIsbn()."'";
        $rows = $this->db->query($sql);
    }

    public function favoritos(){
        $sql = "SELECT * FROM libros INNER JOIN categorias ON idCategoria = id WHERE favorito=1 AND estadoL=1";
        $rows = $this->db->query($sql);
        return $rows;
    }

    public function esFavorito(){
        $sql = "UPDATE libros SET favorito=1 WHERE ISBN='".$this->getIsbn()."'";
        $rows = $this->db->query($sql);
    }

    public function NoEsFavorito(){
        $sql = "UPDATE libros SET favorito=0 WHERE ISBN='".$this->getIsbn()."'";
        $rows = $this->db->query($sql);
    }

    public function novedades(){
        $sql = "SELECT * FROM `libros` AS L INNER JOIN `categorias` as C ON L.idCategoria = C.id WHERE C.activo=1 AND estadoL = 1 ORDER BY novedades DESC LIMIT 5";
        $rows = $this->db->query($sql);
        return $rows;
    }
    
    public function sienteUltimosFavoritos(){
        $sql = "SELECT * FROM `libros` WHERE favorito=1 AND estadoL=1 ORDER BY novedades DESC LIMIT 5";
        $rows = $this->db->query($sql);
        return $rows;
    }
    //Diana Categorias

    public function categoriasLibros($categoria){
        $sql="SELECT * FROM libros WHERE idCategoria=$categoria AND estadoL=1";
        $rows = $this->db->query($sql);
        return $rows;
    }

    public function buscadorFav($buscador){
        $query= "%".$buscador."%";
        $sql = "SELECT * FROM libros INNER JOIN categorias ON id = idCategoria WHERE (ISBN LIKE '$query' OR titulo LIKE '$query' OR autor LIKE '$query' OR editorial LIKE '$query' OR nombre LIKE '$query') AND favorito=1 AND estadoL=1";
        $rows = $this->db->query($sql);
        return $rows;
    }

    //Mostrar libros x categorias
    public function buscadorCat($buscador,$categoria){
        $sqlini="SELECT * FROM categorias WHERE nombre='".$categoria."'";
        $results = $this->db->query($sqlini);
        $result = $results->fetch(PDO::FETCH_ASSOC);

        
        $query= "%".$buscador."%";
        $sql = "SELECT * FROM libros INNER JOIN categorias ON '".$result['id']."' = idCategoria WHERE (titulo LIKE '$query' OR autor LIKE '$query' OR editorial LIKE '$query' OR descripcion LIKE '$query') AND estadoL=1  AND nombre='".$categoria."'";
        $rows = $this->db->query($sql);
        return $rows;
    }

    //actualizar stock
    public function restarStock($cantidad){
        $sql = "UPDATE libros SET `stock`= `stock` - $cantidad WHERE ISBN='".$this->getIsbn()."'";
        $this->db->exec($sql);
    }

    //Entrad duplicada de un libro
    public function isbnDuplicado(){
        $sql = "SELECT ISBN FROM libros WHERE ISBN='".$this->getIsbn()."'";
        $resultado = $this->db->query($sql);
        $filasIsbn = $resultado->rowCount();
        return $filasIsbn;
    }
}
?>
