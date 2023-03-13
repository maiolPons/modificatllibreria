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
<?php
foreach($rows as $row){
    $nombre = $row['nombre'];
}
echo "<h1 class='miPerfil'>Hola " . $nombre ."!</h1>";
?>
<div class="formPerfil">
    
        <div class="editProfile">
            <a href="index.php?controller=cliente&action=modificarPerfil">Editar mis datos</a>
        </div>

        <div>
            <p>EMAIL  </p>
            <p><?php echo $row['email']?></p>
        </div>

        <div>
            <p>NOMBRE </p>
            <p><?php echo $row['nombre']?></p>
        </div>
       
        <div>
            <p>APELLIDO </p>
            <p><?php echo $row['apellido']?></p>
        </div>

        <div>
            <p>DNI</p>
            <p><?php echo $row['dni']?></p>
        </div>

        <div>
            <p>DIRECCIÓN </p>
            <p><?php echo $row['direccion']?></p>
        </div>
</div>


