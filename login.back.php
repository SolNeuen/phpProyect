<?php

if (isset($_POST["submit"])) {
    $name = $_POST["fullName"];
    $password= $_POST["password"];

    //conectar con base de datos
    require_once "dbh.back.php";

    //error handler functions
    require_once "functions.back.php";

    if (emptyInputLogin($name, $password,) !== false) {
    header("location: login.php?error=emptyInputLogin");
    exit();
    }

    loginUser($connection, $name, $password);

} 

else{
    header("location: login.php");
    exit();
}