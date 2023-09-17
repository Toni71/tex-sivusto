<?php

$sarja = $_GET["sarja"]; 
        echo  '<a id="back" href="vuosikerta.php?id='.$sarja .'"> &nbsp;<i class="bi bi-arrow-left"></i> Palaa vuosikerta -sivulle</a>';  
      ?>

<?php
if (!isset($_GET['sarja'])) {
  header("Location: kansikuva.php"); // Ohjaa k�ytt�j� toiselle sivulle
  exit(); // Lopeta t�m�n sivun suoritus
}
?>