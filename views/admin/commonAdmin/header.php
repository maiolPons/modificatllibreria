<title>LibreriaBDN</title>
<div id="container">
    <nav>
      <a class="logoPic" href="/libreria/paginaPrincipal"><img src="/libreria/pic/book.png" alt=""></a>
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
        <form class="box" action="/libreria/resultadoBusqueda" method="post">
          <div class="searcher">
            <input type="search" id="search" name="buscadorMenuPrincipalInput" placeholder="  Search..." />
            <input class="lupa" alt="" src="pic/lupa.png" type="image" />
          </div>
        </form>
        <!-- ---------------------------------------- -->
        <li class="element5" title="Cesta"><a href="/libreria/verCarrito"><img src="/libreria/pic/compra.png" alt=""></a></li>
        <li class="element4"><a href="/libreria/logearCliente">Iniciar sesión</a></li>
      </ul>
    </nav>
</div>