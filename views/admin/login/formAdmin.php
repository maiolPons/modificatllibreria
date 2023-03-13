<link href="styles/styles.css" rel="stylesheet" type="text/css">
<div class="login-box">
    <h2>Adminstración</h2>
    <form action="index.php?controller=admin&action=logear" method="post">
        <div class="user-box">
            <input type="text" name="nom" required>
            <label>Nombre de usuario</label>
        </div>
        <div class="user-box">
            <input type="password" name="passwd" required>
            <label>Contraseña</label>
        </div>
        <div class="submit">
            <input type="submit" value="Iniciar sesión">
        </div>
    </form>
</div>
