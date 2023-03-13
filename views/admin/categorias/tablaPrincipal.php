<?php
    echo "<div class='maincat'>";
    //Buscador
    echo "<div class='maincatdiv'>";
    echo "<nav>";

    ?>
    <form action="index.php?controller=categoria&action=mostrarCategorias" method="post">
        <span>Buscador: </span>
        <input type="text" name="nombre">

        <input type="submit" value="Buscar" name="buscar">
    </form>

    <?php
    echo "</nav>";
    echo "<a href='index.php?controller=categoria&action=anyadirCategoria'> Añadir categoría </a>";
    echo "</div>";


    echo "<h2> Categorias </h2>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<td> Id </td>";
    echo "<td> Nombre </td>";
    echo "<td> Editar </td>";
    echo "<td> Eliminar </td>";
    echo "</tr>";

    foreach ($categorias as $categoria){
        echo "<tr>";
        echo "<td>" .$categoria['id']. "</td>";
        echo "<td>" .$categoria['nombre']. "</td>";

        $id=$categoria['id'];
        $estado=$categoria['activo'];
        $nombre=$categoria['nombre'];

        echo "<td> <a href='index.php?controller=categoria&action=editarCategoria&id=$id&nombre=$nombre'> <img class='icon' src='pic/modificar.png'> </a> </td>"; 

        if($categoria['activo']==1){
            echo "<td> <a href='index.php?controller=categoria&action=estadoCategoria&id=$id&estado=$estado'>  <img src='pic/activado.png'  class='icon'> </a> </td>"; 
        }
        else if ($categoria['activo']==0){
            echo "<td> <a href='index.php?controller=categoria&action=estadoCategoria&id=$id&estado=$estado'> <img src='pic/desactivado.png' class='icon'> </a> </td>"; 
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "</div>";
    
?>