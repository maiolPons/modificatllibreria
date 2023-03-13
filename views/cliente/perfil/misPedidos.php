<div class="divMenuVertival" id="supr" >
    <ul class="menuVertival">
    <li id="first">
            <img src="pic/usuario.png" alt="">
            <a class="profile" href="miPerfil">Mi perfil</a>
        </li>
        <li id="second">
            <img src="pic/news.png" alt="">
            <a class="messages" href="paginaPrincipal">Novedades </a>
        </li>
        <li id="third">
            <img src="pic/corazon.png" alt="">
            <a class="favoritos" href="favoritos">Mis favoritos</a>
        </li>
        <li id="fourth">
            <img src="pic/sent.png" alt="">
            <a class="pedidos" href="misPedidos">Mis pedidos</a>
        </li>
    </ul>
</div>
<div class="mP">
    <?php
    // Si no hay ningun favorito
    if($num==0){?>
        <P>Actualmente no hay ningún pedido. Puedes empezar a comprar en nuestra web</P>
    <?php
    }
    else{
        echo "<h2 style='text-align:center; padding-top:3%;margin-bottom:3%; border-bottom: 2px solid;padding-bottom:1%;'> Mis pedidos </h2>";
        echo "<div class='tablaP0'>";
            echo "<table class='tb'>"; ?>
            <tr>
                <td>ID PEDIDO  </td>
                <td>FECHA DE PETICIÓN</td>
                <td>ESTADO</td>
                <td>IMPORTE TOTAL</td>
                <td>DETALLE DEL PEDIDO</td>
            </tr>
        <?php
        foreach ($pedidos as $pedido) { 
            //girar fechas
            $objeto_DateTime = date_create_from_format('Y-m-d', $pedido['fechaPeticion']);
            $cadena_nuevo_formato = date_format($objeto_DateTime, "d/m/Y");
            ?>
        
            <tr>
                <?php $id=$pedido['id']?>
                <td><?php echo $pedido['id']?></td>
                <td><?php echo $cadena_nuevo_formato?></td>
                <?php 
                if ($pedido['estado']=='pendiente'){
                    ?><td><p style="color:orange";><?php echo $pedido['estado']?></p></td><?php
                }
                else if($pedido['estado']=='enviado'){
                    ?><td><p style="color:green";><?php echo $pedido['estado']?></p></td><?php
                }
                else{
                    ?><td><p><?php echo $pedido['estado']?></p></td><?php
                }
                ?>
                <td><?php echo $pedido['ImporteTotal']?>€</td>
                <td><a id="detalleP" href="index.php?controller=pedido&action=detalledelPedido&id=<?php echo $id ?>">Detalle</a></td>
            </tr> <?php
            
        }
            echo "</table>"; 
        echo "</div>";
    }  
    ?>
</div>