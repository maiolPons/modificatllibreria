<div class="desc">
    <a href="index.php?controller=libro&action=infoLibro&isbn=<?php echo $isbn?>">Detalle libro</a>
    <a href="index.php?controller=libro&action=mostrarLibros">Todos los libros</a>
</div>

<?php
    foreach($rows as $row){
        ?>
        <div id="div1">
            <!-- Imagen -->
            <div class="divimagenLibro">
                <img class="img2" src="<?php echo $row['foto']?>" alt="">
            </div>

            <div class="textoDetalle">
                <!-- Titulo -->
                <div class="divTituloLibro">
                    <h1><?php echo $row['titulo']?></h1>
                </div>
                <!-- Descripcion -->
                <div class="divDescriLibro">
                    <p><?php echo $row['descripcion']?></p>
                </div>
            </div>
    <?php 
    }
?>



