<div id="paginaPrincipal">
    <div id='imagenPrecentacion'>
        <a href="https://firallibre.com/"><img src="pic/firaLlibre.jpg"></a>
    </div>
    <div id="BuscadorPaginaPrincipal">
        <p>Buscar libro</p>
        <nav>
        <form action="index.php?controller=libro&action=resultadoBusqueda" method="post">
            <input type="search" id="buscadorMenuPrincipalInput">
            <input class="buttom" type="submit" value="buscador">
        </form>
            <ul id="buscadorLibrosDesplegable">
                <script type="text/javascript"> 
                    var arrayLibros = <?php echo json_encode($todosLibros); ?>;
                    console.log(arrayLibros);
                    const buscarInput = document.getElementById("buscadorMenuPrincipalInput");
                    console.log(buscarInput);
                    var nav =document.getElementById("buscadorLibrosDesplegable");
                    document.getElementById("buscadorMenuPrincipalInput").addEventListener('keyup',(e)=>{
                        
                        if (document.getElementsByClassName('listaLibroBuscador')) {
                            var itemListaEliminar = document.querySelectorAll('[class=listaLibroBuscador]');
                                itemListaEliminar.forEach(function(valor, indice, array){
                                valor.remove();
                                console.log("es");
                            });
                            
                            console.log(itemListaEliminar);
                        }
                        arrayLibros.forEach( function(valor, indice, array) {
                            if(valor["titulo"].toUpperCase().startsWith(e.target.value.toUpperCase())){
                                var listaElemento =document.createElement("li");
                               
                                listaElemento.setAttribute("class","listaLibroBuscador");
                                frasetext = document.createTextNode(valor["titulo"]);
                                listaElemento.appendChild(frasetext);
                                nav.appendChild(listaElemento);
                                console.log(valor["titulo"]);
                            }
                        });
                    });
                </script>
            </ul>
        </nav>
    </div>
    <h3 class="tituloSeccionMenuPrincipal">Novedades</h3>
    <div id="paginaPrincipalNovedades" class="expocitoresMenuPrincipal">
            <?php
                foreach ($novedades as $info) {
                    echo "<div class='displayItem'><img src='".$info["foto"]."'><hr><p>".$info["titulo"]."</p><hr><p>Autor: ".$info["autor"]."</p><p>Editorial: ".$info["editorial"]."</p><p>Precio: ".$info["precioUni"]."$</p></div>";
                }
            ?>
        
    </div>
    <h3 class="tituloSeccionMenuPrincipal">Favoritos</h3>
    <div id="paginaPrincipalFavoritos" class="expocitoresMenuPrincipal">
        <?php
            if(isset($_SESSION["cliente"])){
                foreach ($favoritos as $info) {
                    echo "<div class='displayItem'><img src='".$info["foto"]."'><hr><p>".$info["titulo"]."</p><hr><p>Autor: ".$info["autor"]."</p><p>Editorial: ".$info["editorial"]."</p><p>Precio: ".$info["precioUni"]."$</p></div>";
                }
            }
            else{
                ?>
                <div id="noLogeadoPaginaPrincipalFavoritos">
                    <p>Para poder guardar favoritos tienes que estar registrado!</p>
                    <a href="index.php?controller=cliente&action=logearCliente">
                        <p>Ya tienes cuenta?</p>
                        <p>Inicia sesión</p>
                    </a>
                    <a href="index.php?controller=cliente&action=crearCliente">
                        <p>Date de alta!</p>
                        <p>Registrate</p>
                    </a>
                </div>
                <?php
            }
        ?>
    </div>
</div>