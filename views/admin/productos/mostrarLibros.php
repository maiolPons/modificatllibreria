<!-- Vista que muestra todos los libros con solo la imagen , el titula , el autor y el precio -->
<a href="index.php?controller=libro&action=formAñadir"><img class="plus" src="pic/plus.png" alt=""></a>

<h1 class="prod">Productos</h1>

<!-- Formulario del buscador -->
<form class="buscador" action="index.php?controller=libro&action=mostrarLibros" method="post">
    <input type="text" name="busc" placeholder="ISBN, Título, Autor...">
    <input class="lupaAdmin" alt="" src="pic/lupa.png" type="image" />
</form>

<?php
if($num!=0){
    ?>
    <div class="contenedor">
        <?php
            foreach ($rows as $row) {
                echo "<a href='index.php?controller=libro&action=infoLibro&isbn=".$row["ISBN"]."'><div class='displayItem'><img src='".$row["foto"]."'><hr><p>".$row["titulo"]."</p><hr><p>Autor: ".$row["autor"]."</p><p>Editorial: ".$row["editorial"]."</p><p style='font-weight:bold;color:green'>".$row["precioUni"]."€</p></div></a>";
            }
        ?>
    </div>
    <?php
}
//Cuando aun no hay ningun libro
else{
    ?>
    <div class="noResult">
        <p>Lo sentimos, tu búsqueda no coincide con ningún producto !</p>
        <div><a href="index.php?controller=libro&action=formAñadir">Crea un nuevo libro</a></div>
    </div>
    <?php    
}

?>


