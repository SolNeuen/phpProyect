<?php 
    
    session_start();

    require_once "header.php";
?>

<section>
<?php 
    if (isset($_SESSION["userId"])) {
         echo "<h1>¡Bienvenide " . $_SESSION["userFullName"] ."!</h1>";
    }
?>
</section>

<?php 
  require_once "main.php";
  require_once "footer.php";
?>


<script src="js/script.js"></script>