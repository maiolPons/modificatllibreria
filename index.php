<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>libreriaBDN : comprar libros online</title>
    <meta name="description" content="Comprar libro | venta libros digital | libros baratos | compra de libros a domicilio">
    <link href="/libreria/views/styles/styles.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="views/admin/pedidos/pedidos.js"></script>
    <script src="views/cliente/libro/scripts.js"></script>
</head>
<body>

    <?php
        session_start();
        require_once "autoload.php";

        //Scripts
        include('views/scripts/scripts.php');

        //--------------------------------------------------------//

            //Si el administrador se ha logeado , le muestra su menu
        if(isset($_SESSION['admin'])){
            require_once "views/admin/commonAdmin/headerAdmin.html";
        }
            //Lo mismo con el cliente , le muestra un menu diferente
        else if(isset($_SESSION['cliente'])){
            require_once "models/categoria.php";
            $categoria = new Categoria();
            $categorias=$categoria->mostrarDatosCategorias();
            // Para sacar el nombre del cliente
            require_once "models/cliente.php";
            $cliente = new Cliente();
            $cliente ->setEmail($_SESSION['cliente']);
            $datosCliente = $cliente->mostrarDatos();
            require_once "views/admin/commonAdmin/headerCliente.php";
            
        }
            //Sino se ha logeado ningun usuario , se muestra el menu general
        else{
            require_once "models/categoria.php";
            $categoria = new Categoria();
            $categorias=$categoria->mostrarDatosCategorias();
            require_once "views/admin/commonAdmin/header.php";
        }
        
        //--------------------------------------------------------//

        
        if (isset($_GET['controller'])){
            $nombreController = $_GET['controller']."Controller";
        }
        else{
            $nombreController="libroController";
        }
        if (class_exists($nombreController)){
            $controlador = new $nombreController(); 
        if(isset($_GET['action'])){
            $action = $_GET['action'];
        }
        else{
            $action = "MostrarpaginaPrincial";
        }
            $controlador->$action();   
        }else{
            echo "La pagina no existe";
        } 
        ?> 
        <?php
        //---------------------FOOTER-----------------------------------//
        if(isset($_SESSION['admin'])){
            require_once "views/admin/commonAdmin/footerAdmin.html";
        }
        else if(isset($_SESSION['cliente'])){
            require_once "views/admin/commonAdmin/footerAdmin.html";
        }
        else{
            require_once "views/admin/commonAdmin/footer.html";
        }
        //--------------------------------------------------------//
    ?>
</body>
</html>