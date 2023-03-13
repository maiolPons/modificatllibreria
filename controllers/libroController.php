<?php

require_once "models/libro.php";
class LibroController{
//**************************************************************************************************************************************************************//
    //Muestra todos los libros
    public function mostrarLibros(){
        if(isset($_SESSION['admin'])){
            $libro = new Libro;
            if(isset($_POST["busc"])){
                $rows = $libro->mostrarBuscador($_POST["busc"]);
            }else{
                $rows = $libro->mostrarLibros();
            }
            $num = $rows->rowCount();
            require_once "views/admin/productos/mostrarLibros.php";
        }
        //Si el admin no esta logeado , no puede ver las paginas
        else{
            LogAdmin();
        }
    }
//**************************************************************************************************************************************************************//
    //Funcion que muestra la informacion detallada del libro seleccionado
    public function infoLibro(){
        if(isset($_SESSION['admin'])){
            if(isset($_GET['isbn'])){
                $isbn = $_GET['isbn'];
                $libro = new Libro();
                $libro -> setIsbn($isbn);
                $rows = $libro -> infoLibro();
                require_once "views/admin/productos/infoLibro.php";
            }
        }
        //Si el admin no esta logeado , no puede ver las paginas
        else{
            LogAdmin();
        }
    }
//**************************************************************************************************************************************************************//
    public function mostrarDescripcion(){
        if(isset($_SESSION['admin'])){
            if(isset($_GET['isbn'])){
                $isbn = $_GET['isbn'];
                $libro = new Libro();
                $libro -> setIsbn($isbn);
    
                $rows = $libro -> infoLibro();
                require_once "views/admin/productos/descripcion.php";
            }
        }
        //Si el admin no esta logeado , no puede ver las paginas
        else{
            LogAdmin();
        }
    }
//**************************************************************************************************************************************************************//
    public function formAñadir(){
        if(isset($_SESSION['admin'])){
            //---------Para mostrar las categorias------
            require_once "models/categoria.php";
            $categorias = new Categoria;
            $rows = $categorias->mostrar();
            //-----------------------------------------
            require_once "views/admin/productos/añadir.php";
        }
        //Si el admin no esta logeado , no puede ver las paginas
        else{
            LogAdmin();
        }
    }
//**************************************************************************************************************************************************************//
    // Insertar nuevo libro
    public function añadir(){
        if(isset($_SESSION['admin'])){
            if(isset($_POST)){
                require_once "models/libro.php";
                $libro = new Libro();
                //----------------------------Imagen------------------------------------------//
                if (is_uploaded_file ($_FILES['archivo']['tmp_name'])){
                    $nombreDirectorio = "img/";
                    $archivo=$_FILES['archivo']['name'];
                    move_uploaded_file ($_FILES['archivo']['tmp_name'],$nombreDirectorio .$archivo );
                }
                else{
                    print ("No se ha podido subir el fichero\n");
                }
                $ruta = $nombreDirectorio.$archivo;
                //---------------------------------------------------------------------------//
                //------------------Obtener los datos enviados por el formulario-------------//
                $libro->setIsbn($_POST['isbn']);
                $resultado = $libro->isbnDuplicado();
                
                //Controlar la entrada duplicada del ISBN 
                if($resultado==0){
                    $libro->setTitulo($_POST['titulo']);
                    $libro->setAutor($_POST['autor']);
                    $libro->setEditorial($_POST['editorial']);
                    $libro->setDescripcion($_POST['descri']);
                    $libro->setFoto($ruta);
                    $libro->setStock($_POST['stock']);
                    $libro->setPrecioUni($_POST['preU']);
                    $libro->setCategoria($_POST['categ']);
                    
                    if($_POST['dest']=='si'){
                        $libro->setDestacado(1);
                    }
                    $libro->setNovedades(date('Y-m-d'));
                    //---------------------------------------------------------------------------//
                    if(comprobarIsbn($_POST['isbn'])==false){
                        formatoInvalido();
                        ?>
                        <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=/libreria/formAñadir">
                        <?php
                    }
                    else{
                        $libro->insertar();
                        añadirProducto();
                        ?>
                        <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=index.php?controller=libro&action=mostrarLibros">
                        <?php
                    }
                }
                else{
                    isbnDuplicado();
                    ?>
                    <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=index.php?controller=libro&action=formAñadir">
                    <?php
                }

                
            }
        }
        //Si el admin no esta logeado , no puede ver las paginas
        else{
            LogAdmin();
        }
    }

//**************************************************************************************************************************************************************//
    //Mostrar el formulario para editar los datos de libro
    public function formEditar(){
        if(isset($_SESSION['admin'])){
            //Para mostrar las categorias
            if(isset($_GET['isbn'])){
                $isbn = $_GET['isbn'];
    
                require_once "models/categoria.php";
                $categorias = new Categoria();
                $filas = $categorias->mostrar();
    
                $libro = new Libro();
                $libro -> setIsbn($isbn);
                $rows = $libro -> infoLibro();
                require_once "views/admin/productos/editar.php";
            }
        }
        //Si el admin no esta logeado , no puede ver las paginas
        else{
            LogAdmin();
        }
    }

//**************************************************************************************************************************************************************//
    //Editar datos
    public function editar(){
        if(isset($_SESSION['admin'])){
            if(isset($_POST)){
                $isbn = $_POST['isbn'];
                $libro = new Libro();
    
                //------------------Obtener los datos enviados por el formulario-------------//
                $libro->setIsbn($isbn);
                $libro->setTitulo($_POST['titulo']);
                $libro->setAutor($_POST['autor']);
                $libro->setEditorial($_POST['editorial']);
                $libro->setDescripcion($_POST['descri']);
                $libro->setStock($_POST['stock']);
                $libro->setPrecioUni($_POST['preU']);
                $libro->setCategoria($_POST['categ']);
                
                if($_POST['dest']=='si'){
                    $libro->setDestacado(1);
                }
                //---------------------------------------------------------------------------//
                $libro->modificar();
                modificarProducto();
                ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=index.php?controller=libro&action=infoLibro&isbn=<?php echo $isbn  ?>">
                <?php
            }
        }
        //Si el admin no esta logeado , no puede ver las paginas
        else{
            LogAdmin();
        }
    }

//**************************************************************************************************************************************************************//
    public function formEditFoto(){
        if($_SESSION['admin']){
            if(isset($_GET['isbn'])){
                $isbn = $_GET['isbn'];
                require_once "views/admin/productos/editFoto.php";
            }
        }
        //Si el admin no esta logeado , no puede ver las paginas
        else{
            LogAdmin();
        }
    }

//**************************************************************************************************************************************************************//
    //Editar imagen
    public function editarFoto(){
        if(isset($_SESSION['admin'])){
            if(isset($_POST)){
                $isbn = $_POST['isbn'];
                $libro = new Libro();
    
                //----------------------------Imagen------------------------------------------//
                if (is_uploaded_file ($_FILES['archivo']['tmp_name'])){
                    $nombreDirectorio = "img/";
                    $archivo=$_FILES['archivo']['name'];
                    move_uploaded_file ($_FILES['archivo']['tmp_name'],$nombreDirectorio .$archivo );
                }
                else{
                    print ("No se ha podido subir el fichero\n");
                }
                $ruta = $nombreDirectorio.$archivo;
                //---------------------------------------------------------------------------//
                $libro->setIsbn($isbn);
                $libro->setFoto($ruta);
                $libro->modificarFoto();
                modificarImagen();
                ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=index.php?controller=libro&action=infoLibro&isbn=<?php echo $isbn ?>">
                <?php
            }
        }
        //Si el admin no esta logeado , no puede ver las paginas
        else{
            LogAdmin();
        }
    }

//**************************************************************************************************************************************************************//
    public function activar(){
        if(isset($_SESSION['admin'])){
            if(isset($_GET)){
                require_once "models/libro.php";
                $isbn = $_GET['isbn'];
                $libro = new Libro();
                $libro->setIsbn($isbn);
                $libro->activarLibro();
                ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=infoLibro&isbn=<?php echo $isbn ?>">
                <?php
            }
        }
        //Si el admin no esta logeado , no puede ver las paginas
        else{
            LogAdmin();
        }
    }

//**************************************************************************************************************************************************************//
    public function desactivar(){
        if(isset($_SESSION['admin'])){
            if(isset($_GET)){
                require_once "models/libro.php";
                $isbn = $_GET['isbn'];
                $libro = new Libro();
                $libro->setIsbn($isbn);
                $libro->desactivarLibro();
                ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=infoLibro&isbn=<?php echo $isbn ?>">
                <?php
            }
        }
        //Si el admin no esta logeado , no puede ver las paginas
        else{
            LogAdmin();
        }
    }

//**************************************************************************************************************************************************************//
    //-----------------------------------CLIENTE----------------------------------------------//
    
    public function favoritos(){
        if(isset($_SESSION['cliente'])){
            $libro = new Libro();
            if(isset($_POST["busc"])){
                $rows = $libro->buscadorFav($_POST["busc"]);
            }else{
                $rows = $libro->favoritos();
            }
            $num = $rows->rowCount();
            require_once "views/cliente/libro/favoritos.php";
        }
        else{
            LogCliente();
        }
    }
//**************************************************************************************************************************************************************//
    public function esFavorito(){
        if(isset($_SESSION['cliente'])){
            if(isset($_GET)){
                require_once "models/libro.php";
                $isbn = $_GET['isbn'];
                $libro = new Libro();
                $libro->setIsbn($isbn);
                $libro->esFavorito();

                /***** DIANA *****/
                if(isset($_GET['flag'])){
                    $nombre=$_GET['nombre'];
                    $id=$_GET['id'];
                    ?>
                    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=infoCategorias&id=<?php echo $id?>&nombre=<?php echo $nombre?>"> 
                    <?php
                }
                else{
                    ?>
                    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=detalleLibro&isbn=<?php echo $isbn?>"> 
                    <?php
                }
                
            }
        }

        
        //Si el admin no esta logeado , no puede ver las paginas
        else{
            LogCliente();
        }

    }

//**************************************************************************************************************************************************************//
    public function NoEsFavorito(){
        if(isset($_SESSION['cliente'])){
            if(isset($_GET)){
                require_once "models/libro.php";
                $isbn = $_GET['isbn'];
                $libro = new Libro();
                $libro->setIsbn($isbn);
                $libro->NoesFavorito();
            }
            if(isset($_GET['flag'])){
                $nombre=$_GET['nombre'];
                $id=$_GET['id'];
                ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=infoCategorias&id=<?php echo $id?>&nombre=<?php echo $nombre?>"> 
                <?php
            }
            else if(isset($_GET['fav'])){
                ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=favoritos"> 
                <?php
            }
            else{
                ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=detalleLibro&isbn=<?php echo $isbn?>"> 
                <?php
            }
        }
        //Si el admin no esta logeado , no puede ver las paginas
        else{
            LogCliente();
        }
    }

//**************************************************************************************************************************************************************//
    public function detalleLibro(){
        if(!(isset($_SESSION['admin']))){
            if(isset($_GET['isbn'])){
                $isbn = $_GET['isbn'];
                $libro = new Libro();
                $libro -> setIsbn($isbn);
                $rows = $libro -> infoLibro();
                require_once "views/cliente/libro/detalleLibro.php";
            }
        }
        else{
            LogCliente();
        }

    }

/*******************************************************************************************************************************************************************/
    //Mostrar libros por Categorias

    public function infoCategorias(){
        $libro = new Libro();
        if(isset($_POST['busc'])){
            $nombreCategoria=$_GET['nombre'];
            $buscador=$_POST['busc'];
            $libros=$libro ->buscadorCat($buscador,$nombreCategoria);
            $num= $libros -> rowCount();
            require_once "views/general/categorias.php";
        }
        else{
            $nombreCategoria=$_GET['nombre'];
            $idCategoria=$_GET['id'];
            $libros=$libro -> categoriasLibros($idCategoria);
            $num= $libros -> rowCount();
            require_once "views/general/categorias.php";
        }
    }

//**************************************************************************************************************************************************************//
    //muestra la pagina principal
    public function MostrarpaginaPrincial(){
        try{
            if(!isset($_SESSION["admin"])){
                $libro = new Libro();
                $novedades = $libro -> novedades();
                $favoritos = $libro -> sienteUltimosFavoritos();
                $libros = $libro -> mostrarLibros();
                $todosLibros = array();
                foreach($libros as $info){
                    array_push($todosLibros,$info);
                }
                require "views/cliente/general/paginaPrincipal.php";
            }
            else{
                require "views/admin/commonAdmin/paginaPrincipal.php";
            }
        }
        catch(Exception $e){
            require_once "views/general/error.php";
        }
        
    }

//**************************************************************************************************************************************************************//
    //muestra resultado de busqueda
    public function resultadoBusqueda(){
        if(isset($_POST["buscadorMenuPrincipalInput"])){
            $libro = new Libro();
            $resultados = true;
            $rows=$libro->mostrarBuscador($_POST["buscadorMenuPrincipalInput"]);
            if ($rows->rowCount() == 0) {
                $resultados = false;
                $rows=$libro->mostrarLibros();
            }
            require_once "views/cliente/general/resultadoBusqueda.php";
        }
    }

//**************************************************************************************************************************************************************//
    public function anyadirLibroCarrito(){
        try{
            require_once "models/libro.php";

            $libro = new Libro();
            
            $libro->setIsbn($_GET["isbn"]);
            $info=$libro->infoLibro();
            foreach($info as $infoLibro){
                $libro->setTitulo($infoLibro["titulo"]);
                $libro->setAutor($infoLibro["autor"]);
                $libro->setEditorial($infoLibro["editorial"]);
                $libro->setDescripcion($infoLibro["descripcion"]);
                $libro->setFoto($infoLibro["foto"]);
                $libro->setPrecioUni($infoLibro["precioUni"]);
                $libro->setCategoria($infoLibro["idCategoria"]);
                $libro->setStock($infoLibro["stock"]);
            }

            $flag = true;
            if(!isset($_SESSION["carritoCompra"])){
                $carritoCompra=array();
                $_SESSION["carritoCompra"]=$carritoCompra;
                array_push($_SESSION["carritoCompra"],[$_GET["isbn"],$_GET["cantidad"]]);
            }
            else{    
                for($i = 0; $i < count($_SESSION["carritoCompra"]);$i++){
                    if($_SESSION["carritoCompra"][$i][0]==$_GET["isbn"]){
                        $flag = false;
                        if($_SESSION["carritoCompra"][$i][1] + $_GET["cantidad"] > $libro->getStock()){
                            $_SESSION["carritoCompra"][$i][1]=$libro->getStock();
                        }
                        else{
                            $_SESSION["carritoCompra"][$i][1] = $_SESSION["carritoCompra"][$i][1] + $_GET["cantidad"];
                        }
                    }
                }
                if($flag){
                    array_push($_SESSION["carritoCompra"],[$_GET["isbn"],$_GET["cantidad"]]);
                } 
            } 
            require_once "views/cliente/libro/esperandoPeticion.php";
            ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/libreria/index.php?controller=libro&action=detalleLibro&done=yes&isbn=<?php echo $_GET["isbn"]?>">
            <?php
        }
        catch(Exception $e){
            require_once "views/general/error.php";
        } 
    }
}
?> 