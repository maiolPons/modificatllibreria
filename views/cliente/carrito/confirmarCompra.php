<div>
    <ul>
        <?php
            if($_SESSION["carritoCompra"] && $_SESSION["cliente"]){
                echo "<div id='listarSimplePedido'>";
                    echo "<h3>Confirmar Pedido</h3>";
                    echo "<table>";
                        echo "<tr><th>Isbn</th><th>Titulo</th><th>Cantidad</th><th>Precio por unidad</th></tr>";
                        $contador=0;
                        foreach($librosInfo as $libro){
                            echo "<tr>";
                                echo "<td>".$libro["ISBN"]."</td><td>".$libro["titulo"]."</td><td>".$_SESSION["carritoCompra"][$contador][1]."</td><td>".$libro["precioUni"]." €</td>";
                            echo "</tr>";
                            $contador++;
                        }
                    echo "</table>";
                    echo "<p>Total: ".$precioFinal."€</p>";
                echo "</div>";
                if(isset($_GET["errorCompra"])){
                    echo "<div id='errorCompra'>";

                    echo "</div>";
                }
                echo "<div id='ConfirmarPagar'>";
                    if(isset($_GET["errorCompra"])){
                        
                    }
                    else{
                        echo "<a href='index.php?controller=pedido&action=verCarrito'> < Modificar Pedido</a>";
                        echo "<a href='index.php?controller=pedido&action=pagar'>Confirmar Pago > </a>";
                    }
                echo "</div>";
            }
            else{
                echo '<meta http-equiv="refresh" content="0;url=index.php" />';
            }
        ?>
    </ul>
</div>