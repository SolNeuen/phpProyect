<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,700;1,300;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>
<body>
<header>
    <nav>
        <ul>           
            <?php 
            
            if (isset($_SESSION["userId"])) {
                echo "<li><a href='profile.php'>Perfil</a></li>";
                echo "<li><a href='logout.php'>Cerrar Sesión</a></li>";
            }else{
                echo "<li><a href='register.php'>¡Enlistate!</a></li>";
                echo "<li><a href='login.php'>Iniciar Sesión</a></li>";
            }
            ?>
            <li><a href="starfleet.php">Flota Estelar</a></li>
            <li><a href="index.php">Inicio</a></li>
        </ul>
    </nav>
    <a href="index.php" class="logoImg"><img src="img/Starfleet_command_emblem.png" alt="Star Fleet Emblem"></a>
</header>

</body>
</html>

