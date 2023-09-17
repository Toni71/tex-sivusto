<?php
      session_start();
  $id = $_GET["id"]; 
  $vuosikerta = $_GET["vuosikerta_id"]; 
  $sarja = $_GET["sarja"]; 
  echo  '<a  id="back" href="vuosikerta.php?id='.$sarja.'"> &nbsp;<i class="bi bi-arrow-left"></i> Palaa vuosikertoihin</a>';
  if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    echo '<a class="add" href="login.php"> Kirjaudu sisään <i class="bi bi-box-arrow-in-right"></i> &nbsp;</a> ';
} else{
  echo  '<a  class="add" href="lisaa.php?id='.$id.'&sarja='.$sarja.'&vuosikerta_id='.$vuosikerta.'">  Lisää numero <i class="bi bi-file-earmark-plus"></i> &nbsp;</a>';
}
?>