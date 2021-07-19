<?php 
    
    session_start();
    require_once "header.php";
    require_once "STAPI.php";
?>
<main>
    <?php 
    foreach ($crewMembers as $crewPerson) {
        echo "<article>";
        echo "<h2>" . $crewPerson["Nombre:"] . "</h2>";
        echo "<figure><img src='" . $crewPerson['Imagen:'] . "'></figure>";
        echo "<li class='article'> <strong>Puesto: </strong>" . $crewPerson['Puesto:'] . "</li>";
        echo "<li class='article'> <strong>Habilidades: </strong>" . $crewPerson['Habilidades:'] . "</li>";
        echo "<li class='article'> <strong>Descripción: </strong>" . $crewPerson['Descripción:' ] . "</li>";
        echo "</article>";
        }
    ?>
</main>

<?php 
  require_once "footer.php";
?>
