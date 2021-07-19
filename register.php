<?php 
    require_once "header.php";
    require_once "STAPI.php";
/*     require_once "body.php"; */
?>

<body>
    <section class="register-form">
        <h2>Enlistate a la FLota Estelar</h2>

            <form action="register.back.php" method="post">
            
                <label> Nombre completo:
                    <input type="text" name="fullName" placeholder="Nombre completo..." required>
                </label>
            
            <h3>Especie:</h3>
            <select name="species" id="species">
                <?php 
                for ( $i = 0; $i < count($species); $i++ ){
                echo "<option value= '" . $species[ $i ] . "'>" . $species[ $i ] . "</option>";
                }                
                ?>
                </select>

        
            <label>Fecha de nacimiento:
                <input type="date" name="date_of_birth" required>
            </label>
            
            <label>Email:
                <input type="email" name="email" placeholder="email@email.com" required>
            </label>

            <label>Contraseña:
                    <input type="password" name="password" placeholder="Escribí una contraseña" required>
            </label>
            <label>Repetir contraseña:
                    <input type="password" name="passwordRepeat" placeholder="Repetir contraseña" required>
            </label>

            <label for="acepto">Acepto términos y condiciones
                <input type="checkbox" name="accepts_terms" value="yes" required>
            </label>

            <button class="submit" type="submit" name="submit" >Registrarme</button>
            </form>
<?php 

if (isset($_GET["error"])) {
    if ($_GET["error"] =="emptyInputSignup"){
        echo "<p class='wrong'>Llená todos los campos.</p>";
    }

    if ($_GET["error"] =="invalidUserName") {
        echo "<p class='wrong'> Escribe correctamente tu nombre.</p>";
    }

    if ($_GET["error"] =="InvalidAge") {
        echo "<p class='wrong'> Tu fecha d enacimiento es incorrecta, o aún no tienes edad para registrarte.</p>";
    }

    if ($_GET["error"] =="invalidEmail") {
        echo "<p class='wrong'> Escribe correctamente tu email.</p>";
    }
    if ($_GET["error"] =="pwdMatch") {
        echo "<p class='wrong'> Las contraseñas no coinciden.</p>";
    }

    if ($_GET["error"] =="stmtfailed") {
        echo "<p class='wrong'>Algo salió mal. Intentalo de nuevo.</p>";
    }
    if ($_GET["error"] =="userNameTaken") {
        echo "<p class='wrong'>Nombre ya registrado.</p>";
    }
    if ($_GET["error"] =="none") {
        echo "<p class='wright'>¡Usuarie registrade!</p>";
    }
}
?>

</section>

</body>
