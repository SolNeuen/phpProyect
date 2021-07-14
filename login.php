<?php 
    require_once "header.php";
/*     require_once "body.php"; */
?>
<body>
    <section class="login-form">
    <h2>Iniciar Sesión</h2>

    <form action="login.back.php" method="post">
        <input type="text" name="fullName" placeholder="Nombre completo..." required>
		<input type="password" name="password" placeholder="Escribí tu contraseña" required>

	<button type="submit" name="submit" >Iniciar</button>
    </form>

    <?php 

if (isset($_GET["error"])) {
    if ($_GET["error"] =="emptyInputLogin"){
        echo "<p class='wrong'>Llená todos los campos.</p>";
    }

    if ($_GET["error"] =="usuarieIncorrecto") {
        echo "<p class='wrong'> Escribe correctamente tu nombre.</p>";
    }

    if ($_GET["error"] =="ConstraseñaIncorrecta") {
        echo "<p class='wrong'> La contraseña es incorrecta</p>";
    }

}
?>
</section>

</body>
