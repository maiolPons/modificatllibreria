<title>Cliente</title>

<div id="container">
    <nav>
    	<a class="logoPic" href="index.php"><img src="/libreria/pic/book.png" alt=""></a>
      <div id="logo">
        <a href="index.php">LibreríaBDN</a>
      </div>
      <ul>
        <li class="element1"><a href="index.php">Home</a></li>
        <li class="element2"><a href="">Libros &nbsp;</a>
			<div class="dd">
				<div id="desplegable"></div>
					<ul>
						<?php
							foreach($categorias as $categoria){
								$id=$categoria['id'];
								$nombre=$categoria['nombre'];
								echo "<li><a href='index.php?controller=libro&action=infoCategorias&id=$id&nombre=$nombre'>".$categoria['nombre']."</li></a>";
							}
						?>
					</ul>
			</div>
        </li>

		<!---------------- Buscador ---------------->
		<form class="box" action="index.php?controller=libro&action=resultadoBusqueda" method="post">
			<div class="searcher">
				<input type="search" id="search"  name="buscadorMenuPrincipalInput" placeholder="  Search..." />
				<input class="lupa" alt="" src="pic/lupa.png" type="image" />
			</div>
		</form>
		<!-- ---------------------------------------- -->
		<li class="element5" title="Cesta"><a href="index.php?controller=pedido&action=verCarrito"><img src="/libreria/pic/compra.png" alt=""></a></li>
				
		<li class="usuario">
			<?php foreach($datosCliente as $datos){echo "<b class='nombreCliente'>".$datos['nombre']."</b>";}?>
			<a href=""><img src="/libreria/pic/perfil.png" alt="" class="perfil"></a>
			<div class="mm">
				<div id="desplegable"></div>
					<ul>
						<li><a href="index.php?controller=cliente&action=miPerfil">Mi perfil</a></li>
						<li><a href="index.php?controller=libro&action=favoritos">Mis favoritos</a></li>
						<li><a href="index.php?controller=pedido&action=misPedidos">Mis pedidos</a></li>
						<li><a href="index.php?controller=cliente&action=salir">Cerrar sesión</a></li>
					</ul>
			</div>
        </li>
      </ul>
    </nav>
</div>