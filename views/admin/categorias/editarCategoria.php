<form action="index.php?controller=categoria&action=editarCategoria&id=<?php echo $_GET['id'] ?>" method="POST" class="formCategorias">
    <h2>Modificar Categoria</h2>
    <!--<p>Nombre:</p>!-->
    <input type="text" name="nombre" value= <?php echo $_GET['nombre']?> >
    <input type="submit" name="envio" value="Editar">
</form>
<div class="comeback">
    <a href="index.php?controller=categoria&action=mostrarCategorias">Volver</a>
</div>