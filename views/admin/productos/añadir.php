<div class="desc">
    <p><a href="index.php?controller=libro&action=mostrarLibros">Todos los libros</a></p>
</div>
<div class="divAñadirLibro">
    <h1>Añadir nuevo libro</h1>
            
    <form class="formAñadirLibro" action="index.php?controller=libro&action=añadir" method="post" enctype="multipart/form-data">
        <div>
            <p>ISBN</p>
            <input type="text" name="isbn" maxlength="13" required>
        </div>
        <div>
            <p>Título</p>
            <input type="text" name="titulo" maxlength="50" required>
        </div>
        <div>
            <p>Autor</p>
            <input type="text" name="autor" maxlength="60" required>
        </div>
        <div>
            <p>Editorial</p>
            <input type="text" name="editorial" maxlength="60" required>
        </div>
        <div>
            <p>Descripción</p>
            <input type="text" name="descri" maxlength="300" required>
        </div>
        
        <div>
            <p>Imagen</p>
            <input type="file" name="archivo" value="archivo" style="color:#4959ff" required>
        </div>

        <div>
            <p>Stock</p>
            <input class="st" type="number" max="999" name="stock" required>

        </div>
        <div>
            <p>Precio unitario</p>
            <input class="pu" type="number" max="999" name="preU" required>
        </div>
        <div>
            <p>Categoria</p>
            <select name="categ" id="categ" required>
                <option value="" selected>Selecciona una categoria</option>
                <?php
                    foreach($rows as $categoria){
                        echo "<option value='".$categoria['id']."'>".$categoria['nombre']."</option>";
                    }
                ?>
            </select>
        </div>
        <div>
            <p>Destacado</p>
            <input type="radio" name="dest" value="si" required>
            <label for="dest">Sí</label><br>
            <input type="radio" name="dest" value="no">
            <label for="dest">No</label><br>
        </div>
        <div></div>
        <div><input class="botonSubmit1" type="submit" value="Crear"></div>
    </form>
</div>