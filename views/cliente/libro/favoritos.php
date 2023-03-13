<h1 class="favorTitle">Mis favoritos</h1>
<div class="divMenuVertival" id="supr">
    <ul class="menuVertival">
        <li id="buscador">
            <!---------------- Buscador ---------------->
            <form class="buscMenu" action="index.php?controller=libro&action=favoritos" method="post">
                <div class="">
                    <input type="text" name="busc" id="search2" placeholder="  Busca en tus favoritos..." />
                    <input class="lupaMenu" alt="" src="pic/lupa.png" type="image" />
                </div>
            </form>
		<!-- ---------------------------------------- -->
        </li>
        <li id="first">
            <img src="pic/usuario.png" alt="">
            <a class="profile" href="index.php?controller=cliente&action=miPerfil">Mi perfil</a>
        </li>
        <li id="second">
            <img src="pic/news.png" alt="">
            <a class="messages" href="index.php">Novedades </a>
        </li>
        <li id="third">
            <img src="pic/corazon.png" alt="">
            <a class="favoritos" href="index.php?controller=libro&action=favoritos">Mis favoritos</a>
        </li>
        <li id="fourth">
            <img src="pic/sent.png" alt="">
            <a class="pedidos" href="index.php?controller=pedido&action=misPedidos">Mis pedidos</a>
        </li>
    </ul>
</div>
<?php
    echo "<h4 class='numFav'>".$num." ARTÍCULOS</h4></br>";
?>
<!-- ------------------------------------------------------------------------------------------------ -->
<div class="books">
    <?php
    // Si no hay ningun favorito
    if($num==0){?>
        <p class="zeroRows" style="display:block;width:300%;">No se ha encontrado ningún resultado !</p>
    <?php
    }
    else{
        foreach ($rows as $row) {
            $isbn = $row['ISBN'];
            echo "<div class='books'>";?>
            <a href="index.php?controller=libro&action=NoEsFavorito&fav=1&isbn=<?php echo $isbn; ?>"><img src="pic/corazonRojo.png" class="corason"></a>            
            <?php
            ?>
            <!-- Imagen -->
            <div>
                <a href="index.php?controller=libro&action=detalleLibro&isbn=<?php echo $isbn; ?>"> <img  src="<?php echo $row['foto']?>" ></a>
            </div>
            <div class="divCategories">
                <p> <?php echo $row['titulo']?> </p>
                <p> Autor/a: <?php echo $row['autor']?> </p>
                <p>Editorial: <?php echo $row['editorial']?>  </p>
                <p> <?php echo $row['precioUni']?>€ </p>
            </div>
        </div>

        <?php
        }
    }  
    ?>
</div>