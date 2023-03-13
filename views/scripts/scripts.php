<?php
    //Session Admin
    function LogAdmin(){
        ?>
        <script>
            swal("","Tienes que logearte primero para ver esta página!","error",{buttons : ["ok"]});
        </script>
        <META HTTP-EQUIV="REFRESH" CONTENT="2.5;URL=index.php?controller=admin&action=logear"> 
        <?php
    }

    function adminValido(){
        ?>
        <script>
            swal("","Nombre de usuario o contraseña incorrectos!","error",{buttons : ["ok"]});
        </script>
        <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=index.php?controller=admin&action=logear"> 
        <?php
    }

    //Session Cliente
    function LogCliente(){
        ?>
        <script>
            swal("","Tienes que logearte primero para ver esta página!","error",{buttons : ["ok"]});
        </script>
        <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=index.php?controller=cliente&action=logearCliente"> 
        <?php
    }

    function añadirProducto(){
        ?>
        <script>swal("","Producto añadido correctamente!","success",{buttons : ["ok"]})</script>
        <?php
    }

    function modificarProducto(){
        ?>
        <script>swal("","Producto modifcado correctamente!","success",{buttons : ["ok"]})</script>
        <?php
    }

    function modificarImagen(){
        ?>
        <script>swal("","Imagen modifcada correctamente!","success",{buttons : ["ok"]})</script>
        <?php
    }

    function usuarioNoValido(){
        ?>
        <script>swal("","Usuario inválido , intenta otra vez!","error",{buttons : ["ok"]})</script>
        <?php
    }

    function duplicados(){
        ?>
        <script>swal("","Este e-mail o DNI ya han sido registrados.Vuelve a rellenar los campos.","error",{buttons : ["ok"]})</script>
        <?php
    }

    function usuarioCreado(){
        ?>
        <script>swal("","Usuario creado satisfactoriamente! Ya puedes iniciar sesión!","success",{buttons : ["ok"]})</script>
        <?php
    }

    function usuarioNoCreado(){
        ?>
        <script>swal("","Algo no ha ido como esperabamos, por favor vuelve a rellenar los campos!","error",{buttons : ["ok"]})</script>
        <?php
    }

    function datosActualizados(){
        ?>
        <script>swal("","Datos actualizados con éxito!","success",{buttons : ["ok"]})</script>
        <?php
    }

    function comprobarIsbn($isbn) {
        $ExpReg = "/[0-9]{13}/";
        if(preg_match($ExpReg, $isbn)){
            return true;
        }
        return false;
    }
    function formatoInvalido(){
        ?>
        <script>swal("","Formato del ISBN es inválido.Debe contener 13 dígitos!","error",{buttons : ["ok"]})</script>
        <?php
    }

    function isbnDuplicado(){
        ?>
        <script>swal("","Existe un libro con el mismo ISBN, intenta otra vez!","error",{buttons : ["ok"]})</script>
        <?php
    }
?>

