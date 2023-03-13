<link href="styles/styles.css" rel="stylesheet" type="text/css">
<form action="index.php?controller=cliente&action=logearCliente" method="post">
    <div class="containerC">
        <div class="backbox">
            <div class="loginMsg">
                <div class="textcontent">
                    <p class="titleC">¿No tienes cuenta?
                    </br></br>C R E A L A  &nbsp&nbsp Y A !</p>
                    <a href="index.php?controller=cliente&action=crearCliente">Crear mi cuenta</a>
                </div>
            </div>
        </div>
        <!-- backbox -->

        <div class="frontbox">
            <div class="login">
                <!-- <h2>LOG IN</h2> -->
                <img src="pic/login.png" alt="">
                <div class="inputbox">
                    <input type="text" name="email" placeholder="  EMAIL*" required>
                    <input type="password" name="passwd" placeholder="  PASSWORD*" required>
                </div>
            </div>
            <div class="divbuttom">
                <input class="buttom" type="submit" value="Iniciar sesión">
            </div>
        </div>
        <!-- frontbox -->
    </div>
</form>
