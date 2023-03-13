<?php
class categoriaController{
    public function mostrarCategorias(){
        if (isset ($_SESSION['admin'])){
            require_once "models/categoria.php";
            $categoria = new Categoria();
            if(isset($_POST['buscar'])){
                $categoria -> setNombre($_POST['nombre']);
                $categorias = $categoria->Buscador();
            }
            else{
                $categorias = $categoria->mostrarDatosCategorias();
            }
            require_once "views/admin/categorias/tablaPrincipal.php";
        }
        else{
            LogAdmin();
        }
    }

    public function anyadirCategoria(){
        if (isset ($_SESSION['admin'])){
            require_once "views/admin/categorias/anyadirCategoria.php";
            if (isset($_POST['envio'])){
                require_once "models/categoria.php";
                $categoria = new Categoria();
                $categoria ->setNombre($_POST['nombre']);
                if ($categoria ->anyadirCategoria()==false){
                    ?><script>swal("","Esta categoria ya existe!","error",{buttons : ["ok"]});</script><?php
                    
                }
                else{
                    $categoria ->anyadirCategoria();
                    ?><script>swal("","Categoria añadida con exito","success",{buttons : ["ok"]})</script><?php
                
                }
            }
        }
        else{
            LogAdmin();
        }
    }

    public function estadoCategoria(){
        if (isset ($_SESSION['admin'])){
            if (isset($_GET['id'])){
                require_once "models/categoria.php";
                $categoria = new Categoria();
                $categoria ->setId($_GET['id']);
                if($_GET['estado']==0){
                    $categoria ->setActivo(1);
                }
                if($_GET['estado']==1){
                    $categoria ->setActivo(0);
                }
                $categoria ->estadoCategoria();

                //redirect
                ?>
                    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=categoria&action=mostrarCategorias">
                <?php
            } 
        }
        else{
            LogAdmin();
        }
    }

    public function editarCategoria(){
        if (isset ($_SESSION['admin'])){
            require_once "views/admin/categorias/editarCategoria.php";
            if (isset ($_POST['envio'])){
                require_once "models/categoria.php";
                $categoria = new Categoria();
                $categoria -> setNombre($_POST['nombre']);
                $categoria->setId($_GET['id']);
                $id=$_GET['id'];
                $nombre=$_POST['nombre'];
                if ($categoria ->editarCategoria()==false){
                    ?><script>swal("","Esta categoria ya existe!","error",{buttons : ["ok"]});</script><?php
                    header('Location: index.php?controller=categoria&action=editarCategoria&id='.$id.'&nombre='.$nombre.'');
                }
                else{
                    $categoria ->editarCategoria();
                    ?><script>swal("","Categoria modificada con exito","success",{buttons : ["ok"]});</script><?php
                    header('Location: index.php?controller=categoria&action=mostrarCategorias&id='.$id.'&nombre='.$nombre.'');
               
                }

            }
        }
        else{
            LogAdmin();
        }
    }

    //Mostrar categorias en header

    public function categoriasHeader(){
        if(isset($_SESSION['admin'])){
            require_once "models/categoria.php";
            $categoria = new Categoria();
            $categorias=$categoria->mostrarDatosCategorias();
            require_once "views/admin/commonAdmin/headerCliente.php";
            require_once "views/admin/commonAdmin/header.php";
        }
        else{
            LogCliente();
        }
    }
}
?>