<?php
echo "<div id='mostrarTodosAdmin'>";
    echo "<h3>Tabla pedidos</h3>";
    echo "<div id='buscadorPedido'>";
        ?>
        <form action="index.php?controller=pedido&action=mostrarReservas" method="post">
            <span>Buscador: </span>
            <input type="text" name="query">
            <span>Todos: </span>
            <input type="radio" name="estado" value="todos" checked>
            <span>Pendiente: </span>
            <input type="radio" name="estado" value="pendiente">
            <span>Enviado: </span>
            <input type="radio" name="estado" value="enviado">
            <input type="submit" value="Buscar">
        </form>
        <?php
    echo "</div>";
    echo "<div id='mostrarTodosAdminTabla'>";
        echo "<table>";
        echo "<tr><th>Id Pedido</th><th>Dni Cliente</th><th>Email Cliente</th><th>Importe Total</th><th>Fecha Peticion</th><th>Estado del Pedido</th><th>Cambiar estado</th><th>Mostrar Detalles</th></tr>";
        $id="0";
        foreach ($todosLosPedidos as $pedido) {
            if($pedido['idPedido'] != $id){
                $id=$pedido["idPedido"];
                $info=self::mostrarDetalles($id);

                $fechaDato = explode("-",$pedido['fechaPeticion']);
                $fechaFinal = $fechaDato[2] . "/" . $fechaDato[1] . "/" . $fechaDato[0];

                echo "<tr>";
                echo "<td>". $pedido['idPedido'] . "</td>";
                echo "<td>".$pedido['dni'] . "</td>";
                echo "<td>".$pedido['email'] . "</td>";
                echo "<td>".$pedido['ImporteTotal'] . "</td>";
                echo "<td>".$fechaFinal . "</td>";
                echo "<td>".$pedido['estado'] . "</td>";
                echo '<td><a href="index.php?controller=pedido&action=cambiarEstado&idPedido='.$id.'">Cambiar estado del pedido</a></td>';
                echo "<td><button onclick='mostrarDetalles(".json_encode($info).")'>Mostrar Detalles</button></td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    echo "</div>";
echo "</div>";
?>