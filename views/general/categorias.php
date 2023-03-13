<?php
    ?>
    <h1 class="bksh1"><?php echo $nombreCategoria?></h1>
    <div class="divMenuVertival" >
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
                <li id="first">
                    <img src="pic/libr.png" alt="">
                    <a class="messages" href="index.php">Principal</a>
                </li>
                <li id="second">
                    <img src="pic/news.png" alt="">
                    <a class="favoritos" href="index.php">Novedades</a>
                </li>
                <li id="third">
                    <img src="pic/corazon.png" alt="">
                    <a class="favoritos" href="index.php?controller=libro&action=favoritos">Favoritos</a>
                </li>


        <?php } 
        else{?>
                <li id="first">
                    <img src="pic/libr.png" alt="">
                    <a class="messages" href="index.php">Página Principal</a>
                </li>
                <li id="second">
                    <img src="pic/news.png" alt="">
                    <a class="favoritos" href="index.php">Novedades</a>
                </li>
                <li id="third">
                    <img src="pic/perfil.png" alt="">
                    <a class="favoritos" href="index.php?controller=cliente&action=logearCliente">Iniciar sesión</a>
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

                <!-- Imagen -->

                    <?php
                    $id=$libro['idCategoria'];
                    $isbn=$libro['ISBN'];
                    if($libro['favorito']==1){?>
                        <a href="index.php?controller=libro&action=NoEsFavorito&isbn=<?php echo $isbn ?>&flag=1&nombre=<?php echo $nombreCategoria ?>&id=<?php echo $id ?>"><img class="corason" src="pic/corazonRojo.png" alt=""></a>
                        <?php
                    }
                    else{?>
                        <a href="index.php?controller=libro&action=esFavorito&isbn=<?php echo $isbn ?>&flag=1&nombre=<?php echo $nombreCategoria ?>&id=<?php echo $id ?>"><img class="corason" src="pic/corazonNegro.png" alt=""></a>
                        <?php
                    }
                    ?>


                <?php
    
                    ?> <!-- Imagen -->
                    <div>
                    <a href="index.php?controller=libro&action=detalleLibro&isbn=<?php echo $isbn; ?>"> <img  src="<?php echo $libro['foto']?>" alt=""> </a>
                    </div>
                    <div class="divCategories">
                        <p> <?php echo $libro['titulo']?> </p>
                        <p> Autor/a: <?php echo $libro['autor']?> </p>
                        <p>Editorial: <?php echo $libro['editorial']?>  </p>
                        <p> <?php echo $libro['precioUni']?>€ </p>
                    </div><?php
                
                ?>
            </div>
        <?php
    
    }
    if ($num==0){
        echo "<h4 class='numFav'>".$num." ARTÍCULOS</h4></br>";
        ?>
        <p></p><p></p><P class="zeroRows" style="display:block;width:300%;">No se ha encontrado ningún resultado</P><?php
    }
    ?> 
    </div> <?php
?>