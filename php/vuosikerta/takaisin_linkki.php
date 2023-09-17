<?php
if (!isset($_GET['id'])) {
  header("Location: kansikuva.php"); // Ohjaa k�ytt�j� toiselle sivulle
  exit(); // Lopeta t�m�n sivun suoritus
}
?>

<a  href="kansikuva.php"> &nbsp;<i class="bi bi-arrow-left"></i> Palaa etusivulle</a>
    <?php     
    session_start();
    if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    echo '<a class="add" href="login.php"> Kirjaudu sisään <i class="bi bi-box-arrow-in-right"></i> &nbsp;</a> ';
} else{

  echo  '<a  class="add" href="lisaa_vuosikerta.php?&sarja='.$_GET['id'].'">  Lisää vuosikerta <i class="bi bi-file-earmark-plus"></i> &nbsp;</a>';
}
?>