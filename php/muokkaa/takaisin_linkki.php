<?php
if (!isset($_GET['id']) || !isset($_GET['sarja']) ||  !isset($_GET['vuosikerta']) || !isset($_GET['vuosikerta_id'])) {
  header("Location: kansikuva.php"); // Ohjaa k�ytt�j� toiselle sivulle
  exit(); // Lopeta t�m�n sivun suoritus
}
?>

<?php
$id = $_GET["id"]; 
$sarja = $_GET["sarja"]; 
$vuosikerta = $_GET["vuosikerta"]; 
$vuosikerta_id = $_GET["vuosikerta_id"]; 
        echo  '<a id="back" href="tieto.php?id='.$id .'&sarja='.$sarja.'&vuosikerta='.$vuosikerta.'&vuosikerta_id='.$vuosikerta_id.' "> &nbsp;<i class="bi bi-arrow-left"></i> Palaa tieto -sivulle</a>';  
      ?>