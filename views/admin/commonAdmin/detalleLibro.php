<div class="divMenuVertival">
    <ul class="menuVertival">
    <?php
        if(isset($_SESSION['cliente'])){?>

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
                <a class="pedidos" href="#">Mis pedidos</a>
            </li>
        <?php
        }
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
        }
        ?>
    </ul>
</div>
  <?php
    foreach($rows as $row){
        $isbn = $row['ISBN'];
        ?>
        <div id="div1">
            <!-- Imagen -->
            <div class="divimagenLibro">
                <img class="img2" src="<?php echo $row['foto']?>" alt="">
            </div>
            <?php
            if(isset($_SESSION['cliente'])){
                if($row['favorito']==1){?>
                    <a href="index.php?controller=libro&action=NoEsFavorito&isbn=<?php echo $isbn; ?>"><img class="img1" src="pic/corazonRojo.png" alt=""></a>
                    <?php
                }
                else{?>
                    <a href="index.php?controller=libro&action=esFavorito&isbn=<?php echo $isbn; ?>"><img class="img1" src="pic/corazonNegro.png" alt=""></a>
                    <?php
                }
            }
            ?>

            <div class="textoDetalle">
                <!-- Titulo -->
                <div class="divTituloLibro">
                    <h1><?php echo $row['titulo']?></h1>
                </div>
                <!-- Autor -->
                <div class="divAutorLibro">
                    <h2><?php echo $row['autor'] ?></h2>
                </div>
                <!-- Isbn y editorial -->
                <div class="divEditLibro">
                    <p><?php echo $row['editorial']." - ".$row['ISBN']?></p>
                </div>
                <!-- Descripcion -->
                <div class="divDescriLibro">
                    <p><?php echo $row['descripcion']?></p>
                </div>

                <!-- Stock -->
                <div class="divEditLibro">
                    <p>Stock : <?php echo $row['stock']?></p>
                </div>

                <!-- Precio -->
                <div class="divPrecioLibro">
                    <p><?php echo $row['precioUni']." €"?></p>
                </div>
                <?php echo '<input type="number" value="1" id="cantidadLibroInput" min="1" max="'.$row['stock'].'">'; ?>
                <!-- Añadir a la cesta -->
                    <?php $isbn=$row['ISBN']; ?>
                    <div>
                        <?php echo '<button class="botonAñadir" onclick="añadirProductoCarrito('.$row['ISBN'].','.$row['stock'].')">'; ?>
                            <img src="pic/cesta.png" alt="">
                            <p>AÑADIR A LA CESTA</p>
                        </button>
                    </div>
            </div>
    <?php 
    }
?>