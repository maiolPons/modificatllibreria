<?php
    echo "<h2> Categorias </h2>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<td> Id </td>";
    echo "<td> Nombre </td>";
    echo "</tr>";

    foreach ($categorias as $categoria){
        echo "<tr>";
        echo "<td>" .$categoria['id']. "</td>";
        echo "<td>" .$categoria['nombre']. "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<a href='#'> Añadir categoría </a>";
?>