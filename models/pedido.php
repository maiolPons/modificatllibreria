<?php
require_once 'config/database.php';

class Pedido extends Database{
    //atributos
    private $id;
    private $idCliente;
    private $estado;
    private $fechaCompra;
    private $importe;
    //private $fechaEnvio;
    //private $fechaEntrega;
    //atributo array
    private $detallesPedido=[];

    //gets y sets
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getIdCliente(){
        return $this->idCliente;
    }
 
    public function setIdCliente($idCliente){
        $this->idCliente = $idCliente;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getFechaCompra(){
        return $this->fechaCompra;
    }
    
    public function setFechaCompra($fechaCompra){
        $this->fechaCompra = $fechaCompra;
    }
    /*
    public function getFechaEnvio(){
        return $this->fechaEnvio;
    }
    public function setFechaEnvio($fechaEnvio){
        $this->fechaEnvio = $fechaEnvio;
    }
    public function getFechaEntrega(){
        return $this->fechaEntrega;
    }
    public function setFechaEntrega($fechaEntrega){
        $this->fechaEntrega = $fechaEntrega;
    }
    */
    public function getImporte(){
        return $this->importe;
    }
    public function setImporte($importe){
        $this->importe = $importe;
    }
    //Array de detalles de pedido
    public function & getDetallesPedido(){
        return $this->detallesPedido;
    }

    public function setDetallesPedido($detallesPedido){
        $this->detallesPedido = $detallesPedido;
    }
    //metodos
    //muestra todos los pedidos
    public function mostrarTodosPedidos(){
        $sql = "SELECT * FROM lineapedidos AS l INNER JOIN pedidos AS p ON l.idPedido = p.id INNER JOIN clientes AS c ON p.idCliente = c.id";
        $rows = $this->db->query($sql);
        return $rows;
    }
    //mustra peidos en base a lo que se ha introducido en el buscador
    public function mostrarBuscador($query){
        $query= "%".$query."%";
        if($this->getEstado()=="todos"){
            $sql = "SELECT * FROM lineapedidos AS l INNER JOIN pedidos AS p ON l.idPedido = p.id INNER JOIN clientes AS c ON p.idCliente = c.id WHERE p.id LIKE '$query' OR c.dni LIKE '$query' OR c.email LIKE '$query' OR p.importeTotal LIKE '$query' OR p.fechaPeticion LIKE '$query'";
        }else{
            $sql = "SELECT * FROM lineapedidos AS l INNER JOIN pedidos AS p ON l.idPedido = p.id INNER JOIN clientes AS c ON p.idCliente = c.id WHERE (p.id LIKE '$query' OR c.dni LIKE '$query' OR c.email LIKE '$query' OR p.importeTotal LIKE '$query' OR p.fechaPeticion LIKE '$query') AND p.estado='".$this->getEstado()."'";
        }
        $rows = $this->db->query($sql);
        return $rows;
    }
    //muestra un pedido basado en la id del objeto
    public function mostrarPedido(){
        $sql = "SELECT * FROM pedidos WHERE id='".$this->getId()."'";
        $rows = $this->db->query($sql);
        return($rows);
    }
    //cambia el estado en base a un parametro i la id del objeto
    public function cambiarEstadoPedido($nuevoEstado){
        $sql = "UPDATE `pedidos` SET estado='$nuevoEstado' WHERE id='".$this->getId()."'";
        $count = $this->db->exec($sql);
        return($count);
    }

    public function mostrarPedidoCliente($email){
        $sql1="SELECT id FROM clientes WHERE email='".$email."'";
        $rows = $this->db->query($sql1);
        foreach($rows as $row){
            // echo $row['id'];
            $sql="SELECT * FROM pedidos WHERE idCliente='".$row['id']."'";
            $pedidos = $this->db->query($sql);
        }
        return $pedidos;
    }
    public function crearPedido(){
        $sql = "INSERT INTO pedidos (`idCliente`, `fechaPeticion`, `ImporteTotal`) VALUES ('".$this->getIdCliente()."','".$this->getFechaCompra()."','".$this->getImporte()."')";
        $this->db->exec($sql);
    }
    public function mostrarUltimoPedidoDeCliente(){
        $sql = "SELECT * FROM pedidos WHERE idCliente='".$this->getIdCliente()."' ORDER BY id DESC LIMIT 1";
        $rows = $this->db->query($sql);
        return($rows);
    }
}

?>