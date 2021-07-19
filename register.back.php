<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//me aseguro que el user entró al hacer click en submit
if (isset($_POST['submit'])) {
    echo "funciona! <br>";
    $name = $_POST["fullName"];
    $species = $_POST["species"];
    $date_of_birth = $_POST["date_of_birth"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];

    //conectar con base de datos
    require_once "dbh.back.php";

    //error handler functions
    require_once "functions.back.php";

    //si dejó algún input vacío
    if (emptyInputSignup($name, $species, $date_of_birth, $email, $password, $passwordRepeat) !== false) {
        header("location: register.php?error=emptyInputSignup");
        exit();
    }

    //si el nombre es correcto
    if (invalidUserName($name) !== false) {
        header("location: register.php?error=invalidUserName");
        exit();
    }

    //si la fecha de nacimiento es válida y correcta
    if (invalidAge($date_of_birth) !== false) {
        header("location: register.php?error=InvalidAge");
        exit();
    }

    //sielmail es correcto
    if (invalidEmail($email) !== false) {
        header("location: register.php?error=invalidEmail");
        exit();
    }

    //si el password y el passwordrepeat son iguales
    if (pwdMatch($password, $passwordRepeat) !== false) {
        header("location: register.php?error=pwdMatch");
        exit();
    }
    //si el user ya existe en la DB
    if (userNameTaken($connection, $name, $email) !== false) {
        header("location: register.php?error=userNameTaken");
        exit();
    }

    //función crear user
    createUser($connection, $name, $species, $date_of_birth, $email, $password);
}

//sino hizo click en submit, lo devuelve a la página de registro.
else {
    header("location: register.php");
    exit();
}
