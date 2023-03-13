<div class="divMenuVertival">
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

<div class="modUsu">
    <h1 class="favorTitle">Mi perfil</h1>
    <form class="loginAltaUsu" action="modificarPerfilI" method="POST">
        <?php
        foreach($rows as $row){?>
            <p>Nombre:</p>
            <input type="text" name="nombre" value="<?php echo $row['nombre']?>"> 
            <p>Apellidos:</p>
            <input type="text" name="apellidos" value="<?php echo $row['apellido']?>"> 
            <p>Dirección:</p>
            <input type="text" name="direccion" value="<?php echo $row['direccion']?>" > 
            <p>Actualizar contraseña:</p>
            <input type="password" name="contrasenya"> 
   

            <div>
                <input type="submit" name="enviar" value="enviar">
            </div>
            <?php
        }
        ?>
    </form>
</div>