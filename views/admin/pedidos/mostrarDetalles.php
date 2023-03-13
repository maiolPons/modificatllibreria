<?php
    echo "<div class='detallesPedido'>";
        echo "<div>";
            echo "<h4>Informacion del pedido</h4>";
            echo "<p>Numero del Pedido: ".$pedido->getId()."</p>";
            echo "<p>Pedido: ".$pedido->getImporte()."</p>";
            echo "<p>Fecha de compra: ".$pedido->getFechaCompra()."</p>";
            echo "<p>Estado del pedido: ".$pedido->getEstado()."</p>";
        echo "</div>";
        echo "<div>";
            echo "<h4>Informacion del Cliente</h4>";
            echo "<p>Numero del Pedido: ".$cliente->getEmail()."</p>";
            echo "<p>Numero del Pedido: ".$cliente->getDni()."</p>";
            echo "<p>Numero del Pedido: ".$cliente->getDireccion()."</p>";
            echo "<p>Numero del Pedido: ".$cliente->getNombre()."</p>";
            echo "<p>Numero del Pedido: ".$cliente->getApellido()."</p>";
        echo "</div>";
        echo "<div>";
            echo "<h4>Libros pedidos</h4>";
            echo "<table>";
                    echo "<tr>";
                        echo "<th>ISBN</th><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Precio por unidad</th><th>Cantidad</th>";
                    echo "</tr>";
                foreach ($pedido->getDetallesPedido() as $pedidoInfo) {
                    echo "<tr>";
                        echo "<td>". $pedidoInfo->getlibro()->getIsbn() . "</td>";
                        echo "<td>". $pedidoInfo->getlibro()->getTitulo() . "</td>";
                        echo "<td>". $pedidoInfo->getlibro()->getAutor() . "</td>";
                        echo "<td>". $pedidoInfo->getlibro()->getEditorial() . "</td>";
                        echo "<td>". $pedidoInfo->getlibro()->getPrecioUni() . "</td>";
                        echo "<td>". $pedidoInfo->getCantidad() . "</td>";
                    echo "</tr>";
                }
            echo "</table>";
        echo "</div>";
        echo "<div>";       
                echo '<a href="index.php?controller=pedido&action=cambiarEstado&idPedido='.$_GET["idPedido"].'">Cambiar estado del pedido</a>';
        echo "</div>";
    echo "</div>";
    echo '<a href="index.php?controller=pedido&action=mostrarReservas">Atras</a>';
?>