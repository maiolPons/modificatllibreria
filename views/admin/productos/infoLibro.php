
<div class="desc">
    <p><a href="index.php?controller=libro&action=mostrarLibros">Todos los libros</a></p>
</div>
<h1 class="prod">Productos</h1>

<!-- Imrimir la tabla con los datos de todos los libros -->
<table>
    <tr>
        <th>ISBN</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Editorial</th>
        <th>Descripcion</th>
        <th>Imagen</th>
        <th>Stock</th>
        <th>Precio</th>
        <th>Categoria</th>
        <th>Destacado</th>
        <th>Editar</th>
        <th>Estado</th>

    <?php
    
    foreach ($rows as $row) {
        $isbn = $row['ISBN'];

        echo "<tr>";
            echo "<td>". $row['ISBN'] . "</td>";
            echo "<td>".$row['titulo'] . "</td>";
            echo "<td>".$row['autor'] . "</td>";
            echo "<td>".$row['editorial'] . "</td>";
            echo "<td class='descri'><a class='dd' href='index.php?controller=libro&action=mostrarDescripcion&isbn=$isbn'>Descripción detallada</a></td>";
            ?>
            <td>
                <img class="pic" src="<?php echo $row['foto'] ?>"/>
            </td>
            <?php
            echo "<td>".$row['stock'] . "</td>";
            echo "<td>".$row['precioUni'] . " €</td>";

            //mostrar la categoria
            if($row['activo']==0){
                echo "<td>Sin categoria</td>";
            }
            else{
                echo "<td>".$row['nombre'] . "</td>";
            }
            //Destacado 
            if($row['destacado']==0){
                echo "<td>No</td>";
            }
            else{
                echo "<td>Sí</td>"; 
            }
            
            echo "<td>
                <a href='index.php?controller=libro&action=formEditar&isbn=$isbn'><img class='edit' src='pic/datos.png'></a>
                <a href='index.php?controller=libro&action=formEditFoto&isbn=$isbn'><img class='edit' src='pic/image.png'></a>
            </td>";

            if($row['estadoL']==1){?>
                <td>
                    <a href="index.php?controller=libro&action=desactivar&isbn=<?php echo $isbn ?>"><img class="act" src="pic/activado.png"></a>
                </td><?php
            }
            else{?>
                <td>
                    <a href="index.php?controller=libro&action=activar&isbn=<?php echo $isbn ?>"><img class="desac" src="pic/desactivado.png"></a>
                </td><?php
            }
        echo "</tr>";
    }
    ?>
    </tr>
</table>


