<?php
echo "<div id='cambiarEstadoPedido'>";
    echo "<h3>Cambiar estado del Pedido</h3>";
    echo "<p> Id pedido: ".$pedido->getId()."</p>";
    echo "<p> Estado pedido: ".$pedido->getEstado()."</p>";
    echo "<p> Fecha de compra pedido: ".$pedido->getFechaCompra()."</p>";
    echo "<p> Importe total pedido: ".$pedido->getImporte()."</p>";

    echo "<h4>Estas seguro que quieres cambiar el estado del pedido?</h4>";
    echo '<form action="index.php?controller=pedido&action=confirmarEstado" method="post">';
    echo '<div>';
        echo "<p>Si - No</p>";
        echo '<input type="radio" name="confirmacion" value="si">';
        echo '<input type="radio" name="confirmacion" value="no" checked>';
    echo '</div>';
    echo '<div>';      
        echo '<input type="hidden" name="idPedido" value="'.$pedido->getId().'">'; 
        echo '<input type="hidden" name="estadoPedido" value="'.$pedido->getEstado().'">'; 
        echo '<p><input id="submitCambiarEstado" type="submit" value="Aceptar"></p>';
    echo '</div>';
    echo "</form>";
echo "</div>";
?>