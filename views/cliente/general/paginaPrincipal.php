<div id="paginaPrincipal">
    <div id='imagenPrecentacion'>
        <video>
            <source src="/libreria/pic/guard.mp4"  type="video/mp4"  autoplay muted/>
            <source src="/libreria/pic/guard.ogg" type="video/ogg" autoplay muted/>
            Your browser does not support the video tag.
        </video>
    </div>
    <div id="BuscadorPaginaPrincipal">
        <p>Buscar libro</p>
        <nav>
        <form action="resultadoBusqueda" method="post">
            <input type="search" id="buscadorMenuPrincipalInput" name="buscadorMenuPrincipalInput">
            <input class="buttom" type="submit" value="buscador">
        </form>
            <ul id="buscadorLibrosDesplegable">
                <script type="text/javascript"> 
                    var arrayLibros = <?php echo json_encode($todosLibros); ?>;
                    const buscarInput = document.getElementById("buscadorMenuPrincipalInput");
                    var nav =document.getElementById("buscadorLibrosDesplegable");
                    document.getElementById("buscadorMenuPrincipalInput").addEventListener('keyup',(e)=>{
                        
                        if (document.getElementsByClassName('listaLibroBuscador')) {
                            var itemListaEliminar = document.querySelectorAll('[class=listaLibroBuscador]');
                                itemListaEliminar.forEach(function(valor, indice, array){
                                valor.remove();
                            });
                        }
                        arrayLibros.forEach( function(valor, indice, array) {
                            if(valor["titulo"].toUpperCase().startsWith(e.target.value.toUpperCase())){
                                var listaElemento =document.createElement("li");
                                var enlace =document.createElement("a");
                                enlace.href="detalleLibro/"+valor["ISBN"];
                                listaElemento.setAttribute("class","listaLibroBuscador");
                                frasetext = document.createTextNode(valor["titulo"]);
                                enlace.appendChild(frasetext);
                                listaElemento.appendChild(enlace);
                                nav.appendChild(listaElemento);
                            }
                        });
                        if(document.getElementById("buscadorMenuPrincipalInput").value==""){
                            var itemListaEliminar = document.querySelectorAll('[class=listaLibroBuscador]');
                                itemListaEliminar.forEach(function(valor, indice, array){
                                valor.remove();
                            });
                        }
                    });
                </script>
            </ul>
        </nav>
    </div>
    <h3 class="tituloSeccionMenuPrincipal">Novedades</h3>
    <div id="paginaPrincipalNovedades" class="expocitoresMenuPrincipal">
            <?php
                foreach ($novedades as $info) {
                    echo "<a href='detalleLibro/".$info["ISBN"]."'><div class='displayItem'><img src='".$info["foto"]."'><hr><p>".$info["titulo"]."</p><hr><p>Autor: ".$info["autor"]."</p><p>Editorial: ".$info["editorial"]."</p><p>Precio: ".$info["precioUni"]."€</p></div></a>";
                }
            ?>
        
    </div>
    <h3 class="tituloSeccionMenuPrincipal">Favoritos</h3>
    <div id="paginaPrincipalFavoritos" class="expocitoresMenuPrincipal">
        <?php
            if(isset($_SESSION["cliente"])){
                foreach ($favoritos as $info) {
                    echo "<a href='detalleLibro/".$info["ISBN"]."'><div class='displayItem'><img src='".$info["foto"]."'><hr><p>".$info["titulo"]."</p><hr><p>Autor: ".$info["autor"]."</p><p>Editorial: ".$info["editorial"]."</p><p>Precio: ".$info["precioUni"]."€</p></div></a>";
                }
                echo "<a href='favoritos'><div class='displayItemMore'><img src='pic/iconMore.png'><p>Ver Todos<p></div></a>";
            } 
            else{
                ?>
                <div id="noLogeadoPaginaPrincipalFavoritos">
                    <p>Para poder guardar favoritos tienes que estar registrado!</p>
                    <a href="logearCliente">
                        <p>Ya tienes cuenta?</p>
                        <p>Inicia sesión</p>
                    </a>
                    <a href="crearCliente">
                        <p>Date de alta!</p>
                        <p>Registrate</p>
                    </a>
                </div>
                <?php
            }
        ?>
    </div>
</div>