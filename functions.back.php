<?php

// funciones REGISTER---------------------------------------------------------------------

//si dejó algún input vacío
function emptyInputSignup($name, $species, $date_of_birth, $email, $password, $passwordRepeat){
    $result;
    if (empty($name) || empty($species) || empty($date_of_birth) || empty($email)|| empty($password)|| empty($passwordRepeat)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
    }

//si el nombre es correcto
function invalidUserName($name){
    $result;
    if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
    }

//si el email es correcto
function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }else{
        $result = false;
    }

    return $result;
    }

//las contraseñas coinciden
function pwdMatch($password, $passwordRepeat){
    $result;
    if ($password !== $passwordRepeat) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
    }

    //si el user ya existe en la DB
function userNameTaken($connection, $name){
    $sql = "SELECT * FROM users WHERE userFullName = ?"; // el "?" se usa como placeholder para que el user no pueda inyectar código en la BD
    
    $stmt = mysqli_stmt_init($connection); //iniciamos la sentencia

    if (!mysqli_stmt_prepare($stmt, $sql)) { // si la sentencia preparada falla
        header("location: register.php?error=stmtfailed");
        exit();
    }

    //si no fallaron las sentencias:
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt); //ejecutar la conección

    $resultData = mysqli_stmt_get_result($stmt);

    //chequear si hay un resultado de esta sentencia
    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
    }


    //función CREAR USUARIE----------------------------------------------------------
function createUser($connection,$name, $species, $date_of_birth, $email, $password){
    $sql = " INSERT INTO users (userFullName, userSpecies, 	userBdt, 	userEmail, 	userpwd) VALUES (?,?,?,?,?);"; // el "?" se usa como placeholder para que el user no pueda inyectar código en la BD
    
    $stmt = mysqli_stmt_init($connection); //iniciamos la sentencia

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: register.php?error=stmtfailed");
        exit();
    }

    //antes de subirlo, hay que hashear el pwd
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    //si no fallaron las sentencias:
    mysqli_stmt_bind_param($stmt, "ssiss",$name, $species, $date_of_birth, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: register.php?error=none");
    exit();
}

// funciones LOG IN -----------------------------------

function emptyInputLogin($name, $password){
    $result;
    if (empty($name) || empty($password)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
    }

function loginUser($connection, $name, $password){
    $userNameExist = userNameTaken($connection, $name);
if ($userNameExist === false) {
    header("location: login.php?error=usuarieIncorrecto");
    exit();
}

$pswHassed = $userNameExist["userpwd"];
$checkPwd = password_verify($password, $pswHassed);

if ($checkPwd === false) {
    header("location: login.php?error=ConstraseñaIncorrecta");
    exit();
    }
        elseif ($checkPwd === true) {
            session_start();
            $_SESSION["userId"] = $userNameExist["userId"];
            $_SESSION["userFullName"] = $userNameExist["userFullName"];
            header("location: index.php");
            exit();
        }
    }

