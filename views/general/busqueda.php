<?php
    ?>
    <h1 class="bksh1"><?php echo $categoria?></h1>
    <link href="styles/styles.css" rel="stylesheet" type="text/css">
    <div class="divMenuVertival">
        <ul class="menuVertical">
            <!---------------- Buscador ---------------->
            <li id="buscador">
            <form class="buscMenu" action="index.php?controller=libro&action=infoCategorias&nombre=<?php echo $nombreCategoria?>" method="post">
                    <div class="">
                        <input type="text" name="busc" id="search2" placeholder="  Busca tus libros preferidos..." />
                        <input class="lupaMenu" alt="" src="pic/lupa.png" type="image" />
                    </div>
                </form>
            </li>
            <!-- ---------------------------------------- -->
    <?php

    if (isset($_SESSION['cliente'])){?>
            <li  id="first" class="novedades">
                <img src="pic/libr.png" alt="">
                <a class="messages" href="paginaPrincipal">Página Principal</a>
            </li>
            <li id="second">
                <img src="pic/news.png" alt="">
                <a class="favoritos" href="paginaPrincipal">Novedades</a>
            </li>
            <li id="third">
                <img src="pic/corazon.png" alt="">
                <a class="favoritos" href="logearCliente">Favoritos</a>
            </li>


    <?php } 
    else{?>
            <li id="first" class="novedades">
                <img src="pic/libr.png" alt="">
                <a class="messages" href="paginaPrincipal">Página Principal</a>
            </li>
            <li id="second">
                <img src="pic/news.png" alt="">
                <a class="favoritos" href="paginaPrincipal">Novedades</a>
            </li>
            <li id="third">
                <img src="pic/perfil.png" alt="">
                <a class="favoritos" href="logearCliente">Iniciar sesión</a>
            </li>

    <?php
    }?>
            </ul>
    </div>
    <div class="books">
        <?php
    foreach($libros as $libro){
        ?>  
            <div class="books">
            <div>
                <!-- Imagen -->
                <div class="divimagenLibro" id="imagenLibro">
                    <?php
                    $id=$libro['idCategoria'];
                    $isbn=$libro['ISBN'];
                    if($libro['favorito']==1){?>
                        <a href="index.php?controller=libro&action=NoEsFavorito&isbn=<?php echo $isbn ?>&flag=1&nombre=<?php echo $nombreCategoria ?>&id=<?php echo $id ?>"><img class="x" src="pic/corazonRojo.png" alt=""></a>
                        <?php
                    }
                    else{?>
                        <a href="index.php?controller=libro&action=esFavorito&isbn=<?php echo $isbn ?>&flag=1&nombre=<?php echo $nombreCategoria ?>&id=<?php echo $id ?>"><img class="x" src="pic/corazonNegro.png" alt=""></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
                <?php if ($libros -> rowCount()!=0){?>
                <!-- Imagen -->
                <div>
                <a href="index.php?controller=libro&action=detalleLibro&isbn=<?php echo $isbn; ?>"> <img  src="<?php echo $libro['foto']?>" alt=""> </a>
                </div>
                <div>
                    <p> <?php echo $libro['titulo']?> </p>
                    <p> Autor/a: <?php echo $libro['autor']?> </p>
                    <p> <?php echo $libro['precioUni']?>€ </p>
                </div>
                <?php } 
                else{
                    ?> <div>
                        <p>Aún no has añadido ningún artículo a tu lista de favoritos. Comienza a comprar y añade tus productos preferidos.</p> 
                </div><?php
                }
                ?>
            </div>
        <?php
    
    }
    ?> </div> <?php
?>