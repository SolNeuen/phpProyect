<?php 
    
    session_start();
    require_once "header.php";
    require_once "STAPI.php";
?>
<main>
    <?php 
    foreach ($Federation as $starShip) {
        echo "<article>";
        echo "<h2>" . $starShip["Nombre:"] . "</h2>";
        echo "<figure><img src='" . $starShip['Imagen:'] . "'></figure>";
        echo "<li class='article'> <strong>Tipo: </strong>" . $starShip['Tipo:'] . "</li>";
        echo "<li class='article'> <strong>Registro: </strong>" . $starShip['Registro:'] . "</li>";
        echo "<li class='article'> <strong>Estado:</strong>" . $starShip['Estado:' ] . "</li>";
        echo "</article>";
        }
    ?>
</main>

<?php 
  require_once "footer.php";
?>