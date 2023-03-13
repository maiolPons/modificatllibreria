<?php
    if($resultados){
        echo "<h3 class='tituloPantallaBuscar'>Resultado de la busqueda!</h3><br>";
        echo "<div class='mostrarProductos'>";
        foreach($rows as $info){
            echo "<a href='index.php?controller=libro&action=detalleLibro&isbn=".$info["ISBN"]."'><div class='displayItem'><img src='".$info["foto"]."'><hr><p>".$info["titulo"]."</p><hr><p>Autor: ".$info["autor"]."</p><p>Editorial: ".$info["editorial"]."</p><p>Precio: ".$info["precioUni"]."€</p></div></a>";
        }
        echo "</div>";
    }else{
        echo "<h3 class='tituloPantallaBuscar'>No hay resultados en la busqueda!</h3>";
        echo "<h3 class='tituloPantallaBuscar'>Pero quizá te interesa esto!</h3><br>";
        echo "<div class='mostrarProductos'>";
        foreach($rows as $info){
            echo "<a href='index.php?controller=libro&action=detalleLibro&isbn=".$info["ISBN"]."'><div class='displayItem'><img src='".$info["foto"]."'><hr><p>".$info["titulo"]."</p><hr><p>Autor: ".$info["autor"]."</p><p>Editorial: ".$info["editorial"]."</p><p>Precio: ".$info["precioUni"]."€</p></div></a>";
        }
        echo "</div>";
    }
?>