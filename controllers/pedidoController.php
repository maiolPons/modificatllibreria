<?php
class PedidoController{
    //mostrar listado de reservas
    public function mostrarReservas(){
        require_once "models/pedido.php";
        $pedido = new Pedido();
        if(isset($_POST["query"])){
            $pedido->setEstado($_POST["estado"]);
            $todosLosPedidos = $pedido->mostrarBuscador($_POST["query"]);
        }else{
            $todosLosPedidos = $pedido->mostrarTodosPedidos();
        }
        
        require_once "views/admin/pedidos/mostrarTodos.php";
    }
//***********************************************************************************************************
    //mostrar detalles del pedido seleccionado
    public function mostrarDetalles($id){
        try {
            $arrayPedido = array();
            $arrayLibros = array();
            require_once "models/pedido.php";
            $pedido = new Pedido();
            $pedido->setId($id);
            $rows=$pedido->mostrarPedido();
            foreach ($rows as $info) {
                $peidoInfo = array();
                $pedido->setIdCliente($info["idCliente"]);
                array_push($peidoInfo,$id,$info["idCliente"],$info["estado"],$info["fechaPeticion"],$info["ImporteTotal"]);
                array_push($arrayPedido,$peidoInfo);
            }
            
            //Crear objeto cliente
            require_once "models/cliente.php";
            $cliente = new Cliente();
            $cliente->setId($pedido->getIdCliente());
            $rows=$cliente->mostrarCliente();
            foreach ($rows as $info) {
                $ClienteInfo = array();
                array_push($ClienteInfo,$id,$info["email"],$info["nombre"],$info["apellido"],$info["direccion"],$info["dni"]);
                array_push($arrayPedido,$ClienteInfo);
            }
            //crear objeto detalles de pedido
            require_once "models/detallesPedido.php";
            $detallesPedido = new DetallesPedido();
            $rows=$detallesPedido->cogerDetallesPedido($id);
            //recoger datos libros
            foreach ($rows as $info) {
                require_once "models/libro.php";
                $libro = new Libro();
                $libro->setIsbn($info["ISBN"]);
                $rows=$libro->infoLibro();
                $librosInfo = array();
                foreach ($rows as $libroInfo) {
                    array_push($librosInfo,$info["ISBN"],$libroInfo["titulo"],$libroInfo["autor"],$libroInfo["editorial"],$libroInfo["descripcion"],$libroInfo["foto"],$libroInfo["stock"],$libroInfo["precioUni"],$libroInfo["idCategoria"]);
                }
                //acavar de rellenar objeto detalles de pedido
                array_push($librosInfo,$info["cantidad"]);
                array_push($arrayLibros,$librosInfo);
            }
            array_push($arrayPedido,$arrayLibros);
            return($arrayPedido);
        }
        catch(Exception $e){
            require_once "views/general/error.php";
        }
    }
//***********************************************************************************************************
    //muestra formulario para cambiar el estado 
    public function cambiarEstado(){
        try{
        //crear objeto pedido
            require_once "models/pedido.php";
            $pedido = new Pedido();
            $pedido->setId($_GET["idPedido"]);
            $rows=$pedido->mostrarPedido();
            foreach ($rows as $info) {
                $pedido->setidCliente($info["idCliente"]);
                $pedido->setEstado($info["estado"]);
                $pedido->setFechaCompra($info["fechaPeticion"]);
                $pedido->setImporte($info["ImporteTotal"]);
            }
            //mostrar formulario
            require_once "views/admin/pedidos/cambiarEstado.php";
        }
        catch(Exception $e){
            require_once "views/general/error.php";
        }
        
    }
//***********************************************************************************************************
    //confirma y cambia el estado del pedido
    public function confirmarEstado(){
        try{
            if(isset($_POST["confirmacion"])){
                if($_POST["confirmacion"]=="si"){
                    require_once "models/pedido.php";
                    $pedido = new Pedido();
                    $pedido->setId($_POST["idPedido"]);
                    if($_POST["estadoPedido"]=="pendiente"){
                        $pedido->cambiarEstadoPedido("enviado");
                    }else{
                        $pedido->cambiarEstadoPedido("pendiente");
                    }
                }
                echo '<meta http-equiv="refresh" content="0;url=index.php?controller=pedido&action=mostrarReservas" />';
            }
        }
        catch(Exception $e){
            require_once "views/general/error.php";
        }
    }
    
//*********************************************************************************************************** */
    public function verCarrito(){
        try{
            require_once "models/libro.php";
            $libro = new Libro();
            $arrayInfo = [];
            if(isset($_SESSION["carritoCompra"]) && count($_SESSION['carritoCompra'])!=0){
                for($i = 0; $i < count($_SESSION["carritoCompra"]); $i++){
                    $isbn = $_SESSION["carritoCompra"][$i][0];
                    $libro -> setIsbn($isbn);
                    $rows = $libro -> infoLibro();
                    array_push($arrayInfo , $rows);   

                    //Mostrar la cantidad actualizada por el usuario
                    if(isset($_POST['cantidadLibroCesta']) && isset($_GET['isbnC'])){
                        if($_SESSION["carritoCompra"][$i][0] == $_GET['isbnC']){
                            $_SESSION["carritoCompra"][$i][1] = $_POST['cantidadLibroCesta'];
                        }
                    }
                }
                
            }
            require_once "views/cliente/carrito/cesta.php";
        }
        catch(Exception $e){
            require_once "views/general/error.php";
        }
        
    }

//*********************************************************************************************************** */
    public function eliminarCarrito(){
        try{
            if (isset($_GET['isbn'])) {
                $isbnC = $_GET['isbn'];
                for($i = 0; $i < count($_SESSION["carritoCompra"]); $i++){    
                    $isbn = $_SESSION["carritoCompra"][$i][0];
                    if($isbn == $isbnC){
                        array_splice($_SESSION["carritoCompra"],$i,1);
                    }
                    echo '<meta http-equiv="refresh" content="0;url=index.php?controller=pedido&action=verCarrito" />';
                }
            }
        }
        catch(Exception $e){
            require_once "views/general/error.php";
        }
    }
//*********************************************************************************************************** */
    //Diana
    public function misPedidos(){
        require_once "models/pedido.php";
        $pedido = new Pedido();
        $email=$_SESSION['cliente'];
        $pedidos=$pedido -> mostrarPedidoCliente($email);
        $num=$pedidos->rowCount();
        require_once "views/cliente/perfil/misPedidos.php";
    }

//*********************************************************************************************************** */
    public function detalledelPedido(){
        $arrayPedido = array();
        $arrayLibros = array();
        require_once "models/pedido.php";
        $pedido = new Pedido();
        $id=$_GET['id'];
        $pedido->setId($id);
        $rows=$pedido->mostrarPedido();
        foreach ($rows as $info) {
            $peidoInfo = array();
            $pedido->setIdCliente($info["idCliente"]);
            array_push($peidoInfo,$id,$info["idCliente"],$info["estado"],$info["fechaPeticion"],$info["ImporteTotal"]);
            array_push($arrayPedido,$peidoInfo);
        }

        //crear objeto detalles de pedido
        require_once "models/detallesPedido.php";
        $detallesPedido = new DetallesPedido();
        $rows=$detallesPedido->cogerDetallesPedido($id);
        //recoger datos libros
        foreach ($rows as $info) {
            require_once "models/libro.php";
            $libro = new Libro();
            $libro->setIsbn($info["ISBN"]);
            $rows=$libro->infoLibro();
            $librosInfo = array();
            foreach ($rows as $libroInfo) {
                array_push($librosInfo,$info["ISBN"],$libroInfo["titulo"],$libroInfo["autor"],$libroInfo["editorial"],$libroInfo["descripcion"],$libroInfo["foto"],$libroInfo["stock"],$libroInfo["precioUni"],$libroInfo["idCategoria"]);
            }
            //acavar de rellenar objeto detalles de pedido
            array_push($librosInfo,$info["cantidad"]);
            array_push($arrayLibros,$librosInfo);
        }
        array_push($arrayPedido,$arrayLibros);
        require_once "views/cliente/perfil/detalledelPedido.php";

    }
//*********************************************************************************************************** */
    //mostrar pagina para confirmar pedido
    public function comprar(){
        require_once "models/detallesPedido.php";
        if(isset($_SESSION["carritoCompra"]) && isset($_SESSION["cliente"])){ 
            require_once "models/libro.php";
            //extrae informacion de los libros
            $librosInfo = array();
            $precioFinal=0;
            $contador=0;
            foreach($_SESSION["carritoCompra"] as $libros){
                $libro = new Libro();
                $libro->setIsbn($libros[0]);
                $rows=$libro->infoLibro();
                $librosInfo[] = $rows->fetch();
                $precioFinal+=$librosInfo[$contador]["precioUni"]*$_SESSION["carritoCompra"][$contador][1];
                $contador++;
            }
            require_once "views/cliente/carrito/confirmarCompra.php";
        }
        else{
            echo '<meta http-equiv="refresh" content="0;url=index.php"/>';
        }
    }

//*********************************************************************************************************** */
    public function pagar(){
        try{
            if(isset($_SESSION["carritoCompra"]) && isset($_SESSION["cliente"])){ 
                $errorResultado = false;
                $contador=0;
                $precioFinal=0;
                require_once "models/libro.php";
                foreach($_SESSION["carritoCompra"] as $libros){
                    $libro = new Libro();
                    $libro->setIsbn($libros[0]);
                    $rows=$libro->infoLibro();
                    $librosInfo[] = $rows->fetch();
                    if($librosInfo[0]["stock"] < $_SESSION["carritoCompra"][$contador][1]){
                        $errorResultado = true;
                    }
                    $precioFinal+=$librosInfo[$contador]["precioUni"]*$_SESSION["carritoCompra"][$contador][1];
                    $contador++;
                }
                if(!$errorResultado){
                    require_once "models/pedido.php";
                    require_once "models/cliente.php";
                    require_once "models/detallesPedido.php";
            
                    //id cliente
                    $cliente = new Cliente();
                    $cliente->setEmail($_SESSION["cliente"]);
                    $clienteInfopdo=$cliente->mostrarDatos();
                    $clienteInfo[] = $clienteInfopdo->fetch();
                    //crear pedido
                    $pedido = new Pedido();
                    $pedido->setFechaCompra(date("Y/m/d"));
                    $pedido->setIdCliente($clienteInfo[0]["id"]);
                    $pedido->setImporte($precioFinal);
                    $pedido->crearPedido();
                    $pedidoInfo=$pedido->mostrarUltimoPedidoDeCliente();
                    $pedidoInfoResult[] = $pedidoInfo->fetch();
                    $pedidoInfoResult[0]["id"];
                    //crear detalles de pedido
                    foreach($_SESSION["carritoCompra"] as $productos){
                        $detallesPedido = new DetallesPedido();
                        $detallesPedido->setIdPedido($pedidoInfoResult[0]["id"]);
                        $detallesPedido->setLibro($productos[0]);
                        $detallesPedido->setCantidad($productos[1]);
                        $detallesPedido->crearDetallePedido();
                    }
                    //cambiar stock producto
                    foreach($_SESSION["carritoCompra"] as $productos){
                        //restar cantidad
                        $libro = new Libro();
                        $libro->setIsbn($productos[0]);
                        $libro->restarStock($productos[1]);
                    }
                    unset($_SESSION["carritoCompra"]);
                    require_once "views/cliente/carrito/pedidoConfirmado.php";
                }
                else{
                    //echo '<meta http-equiv="refresh" content="0;url=index.php?controller=pedido&action=comprar"/>';
                }
            }
            else{
                //echo '<meta http-equiv="refresh" content="0;url=index.php"/>';
            }
        }
        catch(Exception $e){
            require_once "views/general/error.php";
        }
        
    }

//*********************************************************************************************************** */
    function noLogin(){
        ?><script>swal("","Hay que loguearse para realizar la compra!","error",{buttons : ["ok"]})</script><?php
        echo '<meta http-equiv="refresh" content="1;url=index.php?controller=pedido&action=verCarrito"/>';
    }
}
?>