<div class="divMenuVertival" id="supr">
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
<div id="tablaP1">
<?php
echo "<div class='tablaP'>";
echo "<h2 style='text-align:center; margin-bottom:3%; border-bottom: 2px solid;padding-bottom:1%;'> Detalle del pedido </h2>";
echo "<table>"; ?>
<tr>
    <td></td>
    <td>ISBN</td>
    <td>Titulo</td>
    <td>Autor</td>
    <td>Precio Uni</td>
    <td>Editorial</td>
    <td>Cantidad</td>
</tr> <?php
for($i=0;$i<count($arrayPedido);$i++){
    for($j=0;$j<count($arrayPedido[1]);$j++){
            if ($i!=0){?>
            <tr>
                <td><img class="imgDet" src="<?php echo $arrayPedido[$i][$j][5]?>"></td>
                <td><?php echo $arrayPedido[$i][$j][0]?></td>
                <td><?php echo $arrayPedido[$i][$j][1]?></td>
                <td><?php echo $arrayPedido[$i][$j][2]?></td>
                <td><?php echo $arrayPedido[$i][$j][7]?>€</td>
                <td><?php echo $arrayPedido[$i][$j][3]?></td>
                <td><?php echo $arrayPedido[$i][$j][9]?></td>
            </tr> <?php
        }    }
    }  
    echo "</table>"; 
    echo "</div>";
?>
</div>