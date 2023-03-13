<div class="formAltaUsu">
    <h1>Crear nueva cuenta</h1>
    <form class="loginAltaUsu" action="index.php?controller=cliente&action=crearCliente" method="POST">
        <input type="email" name="email" placeholder="E-mail*" required> 
        <input type="text" name="nombre" placeholder="Nombre*" required> 
        <input type="text" name="apellidos" placeholder="Apellidos*" required> 
        <input type="text" name="direccion" placeholder="Dirección*" required> 
        <input type="text" name="dni" placeholder="DNI*" pattern="[0-9]{8}[A-Za-z]{1}" minlength="9" maxlength="9" required> 
        <input type="password" name="passwd" placeholder="Contraseña*" required> 
        <p>Todos los campos son obligatorios*</p>
        <input id="altaUsu" type="submit" name="enviar" value="Crear cuenta"> 
    </form>
</div>