<div class="desc">
    <p><a href="index.php?controller=libro&action=infoLibro&isbn=<?php echo $isbn ?>">Detalles libro</a></p>
    <p><a href="index.php?controller=libro&action=mostrarLibros">Todos los libros</a></p>
</div>
<div class="divModificarLibro">
    <h1>Modificar imagen</h1>
    <form class="formModificarLibro" action="index.php?controller=libro&action=editarFoto" method="POST" enctype="multipart/form-data">  
        <div>
            <input type="file" name="archivo" style="color:#4959ff;margin-left:20px" required/><br>
            <input type="hidden" name="isbn" value="<?php echo $isbn ?>">
        </div>
        <div><input type="submit" name="Modificar" value="Modificar"/></div>
    </form>
</div>